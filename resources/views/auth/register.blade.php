@extends('layouts.auth')

@section('title', 'Register')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Register</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="collumn">
                    <div class="form-group">
                        <label for="frist_name">Your Name</label>
                        <input id="frist_name"
                            type="text"
                            class="form-control"
                            name="name"
                            autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email"
                        type="email"
                        class="form-control"
                        name="email">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="collumn">
                    <div class="form-group">
                        <label for="password"
                            class="d-block">Password</label>
                        <input id="password"
                            type="password"
                            class="form-control pwstrength"
                            data-indicator="pwindicator"
                            name="password">
                        <div id="pwindicator"
                            class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password2"
                            class="d-block">Password Confirmation</label>
                        <input id="password2"
                            type="password"
                            class="form-control"
                            name="password_confirmation">
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox"
                            name="agree"
                            class="custom-control-input"
                            id="agree">
                        <label class="custom-control-label"
                            for="agree">I agree with the terms and conditions</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit"
                        class="btn btn-primary btn-lg btn-block">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/jquery.pwstrength/jquery.pwstrength.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/auth-register.js') }}"></script>
@endpush
