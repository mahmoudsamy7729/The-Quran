<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    
</head>
<body data-theme="dark">
    
    @yield('content')

    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/all.js')}}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    @yield('script-func')
    @yield('ajax')
    <script>
        var body = document.getElementsByTagName("BODY")[0];
        var sidebar = document.getElementById("sidebar");
        function openNav()
        {
            sidebar.style.right = "0";
        }
        function closeNav()
        {
            sidebar.style.right = "-25rem";
        }
        function dark()
        {
            body.setAttribute('data-theme', 'dark');
        }
        function light()
        {
            body.setAttribute('data-theme', 'light');
        }
        
    </script>

</body>
</html>