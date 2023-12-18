<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.gstatic.com/" rel="preconnect">
    <link href="{{ asset('assets/admin/img/icons/icon-48x48.png') }}" rel="shortcut icon" />

    <title>{{ config('app.name') }}</title>

    <link href="{{ asset('assets/admin/css/light.css') }}" rel="stylesheet">
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
    <main class="d-flex w-100 h-100">
        <div class="d-flex flex-column container">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 d-table h-100 mx-auto">
                    @yield('auth-section')
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('assets/admin/js/app.js') }}"></script>
    <script src="{{ asset('assets/admin/js/axios.min.js') }}"></script>

    <script>
        // notification
        function notify(msz, typ) {
            let message = msz;
            let type = typ;
            let duration = 2400;
            let ripple = 1;
            let dismissible = 1;
            let positionX = 'right';
            let positionY = 'top';

            window.notyf.open({
                type,
                message,
                duration,
                ripple,
                dismissible,
                position: {
                    x: positionX,
                    y: positionY
                }
            });
        }
    </script>
    @stack('auth-script')
</body>

</html>
