<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>

@include('layaout.head')
<title>
    @yield("title")
</title>
</head>
<body class="flex">
@include('layaout.dashbord')
<div class="content-body">
    <div class="container">
        @yield('content')
    </div>
</div>

@include('layaout.footer')
@yield('footer')
</body>
</html>
