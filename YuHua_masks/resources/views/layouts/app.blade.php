<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>App Name - @yield('title')</title>
</head>

<body>
    @section('sidebar')
        This is the master sidebar.
    @show
    <div class="container">
        @yield('content')
    </div>
    <form action="post" method="GET">
        @csrf
        @method('PUT')
        <input type="text" placeholder="請輸入姓名" name="name">
        <input type="submit">
    </form>
</body>
</html>