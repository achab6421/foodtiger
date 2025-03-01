<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Foodpandapoorv')</title>

    <!-- 引入 jQuery（必須放在其他 JS 之前）-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Vite 資源引入（統一管理 app.css 和 app.js） -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    @include('layouts.navbar')

    <div class="container">
        @yield('content')
    </div>

    @stack('scripts')

    <!-- SweetAlert2 顯示訊息 -->
    <script>
        @if(session('success_msg'))
            const successMsg = @json(session('success_msg'));
            Swal.fire({
                icon: 'success',
                title: successMsg.title,
                text: successMsg.text
            });
        @elseif (session('error_msg'))
            const errorMsg = @json(session('error_msg'));
            Swal.fire({
                icon: 'error',
                title: errorMsg.title,
                text: errorMsg.text
            });
        @endif
    </script>

</body>

</html>
