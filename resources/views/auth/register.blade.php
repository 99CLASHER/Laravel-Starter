@extends('auth.app')
@section('content')
    <section class="row flexbox-container">
        <div class="col-xl-8 col-11 d-flex justify-content-center">
            <div class="card bg-authentication rounded-0 mb-0">
                <div class="row m-0">
                    <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                        <img src="../../../app-assets/images/pages/login.png" alt="branding logo">
                    </div>
                    <div class="col-lg-6 col-12 p-0">
                        <div class="card rounded-0 mb-0 px-2">
                            <div class="card-header pb-1">
                                <div class="card-title">
                                    <h4 class="mb-0">Register</h4>
                                </div>
                            </div>
                            <p class="px-2">Welcome, please register to your account.</p>
                            <div class="card-content">
                                <div class="card-body pt-1">
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label for="name">Business Name</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Business Name" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="place_id">Place ID</label>
                                                <input type="text" class="form-control" id="place_id" name="place_id" placeholder="Place ID">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control" id="city" name="city" placeholder="City">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="state">State</label>
                                                <input type="text" class="form-control" id="state" name="state" placeholder="State">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="zip">Zip</label>
                                                <input type="text" class="form-control" id="zip" name="zip" placeholder="Zip">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="country">Country</label>
                                                <input type="text" class="form-control" id="country" name="country" placeholder="Country">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-inline w-100">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
