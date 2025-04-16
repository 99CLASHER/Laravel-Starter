<?php

if (!function_exists('send_response')) {
    function send_response($message = '', $data = [], $status = 200, $title = 'Success')
    {
        return response()->json([
            'status' => 'success',
            'title' => $title,
            'message' => $message,
            'data' => $data
        ], $status);
    }
}

if (!function_exists('send_error')) {
    function send_error($message = '', $status = 400, $title = 'Error', $errors = [])
    {
        return response()->json([
            'status' => 'error',
            'title' => $title,
            'message' => $message,
            'errors' => $errors
        ], $status);
    }
}


if (!function_exists('slugify')) {
    function slugify($string)
    {
        return strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', trim($string)));
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date, $format = 'Y-m-d H:i:s')
    {
        return \Carbon\Carbon::parse($date)->format($format);
    }
}
