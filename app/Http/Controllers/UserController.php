<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index' );
    }

    public function fetch(Request $request)
    {
        $columns = [
            0 => 'users.id',
            1 => 'users.name',
            2 => 'users.username',
            3 => 'users.email',
            4 => 'roles.name', // Role name from joined table
            5 => 'users.status',
        ];

        $query = User::query()
            ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->select([
                'users.*',
                'roles.name as role_name'
            ]);

        $totalData = $query->count();
        $totalFiltered = $totalData;

        // Search handling
        if ($request->has('search.value') && !empty($request->input('search.value'))) {
            $search = $request->input('search.value');
            $query->where(function ($q) use ($search, $columns) {
                $q->where('users.name', 'LIKE', "%{$search}%")
                    ->orWhere('users.username', 'LIKE', "%{$search}%")
                    ->orWhere('users.email', 'LIKE', "%{$search}%")
                    ->orWhere('roles.name', 'LIKE', "%{$search}%")
                    ->orWhere('users.status', 'LIKE', "%{$search}%");
            });

            $totalFiltered = $query->count();
        }

        // Order handling
        if ($request->has('order.0.column')) {
            $orderColumn = $columns[$request->input('order.0.column')];
            $orderDirection = $request->input('order.0.dir');
            $query->orderBy($orderColumn, $orderDirection);
        }

        // Pagination
        $limit = $request->input('length');
        $start = $request->input('start');
        $users = $query->offset($start)
                    ->limit($limit)
                    ->get();

        $data = [];
        $sr_no = $start + 1;

        foreach ($users as $user) {
            $row = [
                $sr_no++,
                view('user.table-cols', ["user" => $user, "col" => "name"])->render(),
                view('user.table-cols', ["user" => $user, "col" => "username"])->render(),
                view('user.table-cols', ["user" => $user, "col" => "email"])->render(),
                view('user.table-cols', ["user" => $user, "col" => "role"])->render(),
                view('user.table-cols', ["user" => $user, "col" => "status"])->render(),
                view('user.table-cols', ["user" => $user, "col" => "actions"])->render(),
            ];
            $data[] = $row;
        }

        return response()->json([
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
        ]);
    }
    public function create()
    {
        $roles = Role::where('id', '!=', 1)->get();
        return view('user.create', get_defined_vars());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required|string',
            'role' => 'required|exists:roles,name',
            'status' => 'required|in:active,inactive'
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone_number' => $request->phone_number,
                'status' => $request->status
            ]);

            // Assign role using Spatie
            $user->assignRole($request->role);

            return redirect()->route('users.index')->with('success', 'User created successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error creating user: ' . $e->getMessage());
        }
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::where('id', '!=', 1)->get();
        return view('user.edit', get_defined_vars());
    }

    public function update(Request $request, $id)
    {
            $user = User::findOrFail($id);
            $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,'.$user->id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'phone_number' => 'required|string',
            'role' => 'required|exists:roles,name',
            'status' => 'required|in:active,inactive',
            'password' => 'nullable|min:8|confirmed'
        ]);

        try {
            $updateData = $request->except('password_confirmation', 'role');

            if ($request['password'] !== null) {
                $updateData['password'] = Hash::make($request->password);
            }else{
                $updateData['password'] = $user->password;
            }

            $user->update($updateData);

            // Sync roles using Spatie
            $user->syncRoles([$request->role]);

            return redirect()->route('users.index')->with('success', 'User updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error updating user: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json(['success' => true, 'message' => 'User Deleted Successfully']);
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
