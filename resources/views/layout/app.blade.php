<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM @yield('title')</title>
    @include('layout.styles')

    <script>
        var BASE_URL = '{{ url("/") }}';
    </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('layout.header')
        @indulce('layout.sidebar')

        <!-- Content wrapper -->
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>    

    @include('layout.footer')
    @yield('scripts')
</body>
</html>