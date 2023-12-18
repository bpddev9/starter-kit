@extends('layouts.auth')
@section('auth-section')
    <div class="d-table-cell align-middle">

        <div class="mt-4 text-center">
            <h1 class="h2">{{config('app.name')}} Admin Panel</h1>
            <p class="lead">
                Sign in to your account to continue
            </p>
            <p class="text-success fw-bold text-center" id="success-message"></p>
            <p class="text-danger fw-bold text-center" id="error-message"></p>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="m-sm-3">
                    <form id="loginForm">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input class="form-control form-control-lg" name="email" type="email" placeholder="Enter your email" />
                            <small class="text-danger" id="email_error"></small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input class="form-control form-control-lg" name="password" type="password" placeholder="Enter your password" />
                            <small class="text-danger" id="password_error"></small>
                        </div>

                        <div>
                            <div class="form-check align-items-center">
                                <input class="form-check-input" id="customControlInline" name="remember" type="checkbox">
                                <label class="form-check-label text-small" for="customControlInline">Remember me</label>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-lg mt-3" type="submit">Sign in</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('auth-script')
        <script>
            var loginForm = document.querySelector('#loginForm');

            var email_input = document.querySelector('[name="email"]');
            var password_input = document.querySelector('[name="password"]');
            var remember_input = document.querySelector('[name="remember"]');

            var email_error = document.querySelector('#email_error');
            var password_error = document.querySelector('#password_error');

            var csrf_token = document.querySelector('[name="csrf_token"]');

            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();

                axios.post('{{ route('login.post') }}', {
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': csrf_token.content,
                        },
                        email: email_input.value,
                        password: password_input.value,
                        remember: remember_input.checked
                    })
                    .then(function(res) {
                        console.log(res);
                        email_error.style.display = 'none';
                        password_error.style.display = 'none';

                        if (res.data.status === 'success') {
                            notify(res.data.message, res.data.status);

                            setTimeout(() => {
                                window.location.replace('{{ route('admin.dashboard') }}')
                            }, 2000);
                        }

                        if (res.data.status === 'error') {
                            notify(res.data.message, res.data.status);
                        }
                    })
                    .catch(function(err) {
                        console.log(err);
                        if (err.response.data.errors) {
                            err.response.data.errors.email == undefined ? email_error.style.display = 'none' : email_error.style.display =
                                'block';
                            err.response.data.errors.password == undefined ? password_error.style.display = 'none' : password_error.style
                                .display =
                                'block';

                            email_error.innerText = err.response.data.errors.email;
                            password_error.innerText = err.response.data.errors.password;
                        }

                    })
            });
        </script>
    @endpush
@endsection
