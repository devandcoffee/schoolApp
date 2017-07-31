<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'School App') }}</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>
<div id="app">
    @yield('body')
</div>

<script src="/js/app.js"></script>
<script src="{{ asset("js/admin.js") }}"></script>
<script>
    @if(Session::has('success'))
        new Noty({
            type: 'success',
            layout: 'topRight',
            timeout: 2000,
            text: '{{ Session::get('success') }}'
        }).show();
    @endif
</script>
</body>
</html>