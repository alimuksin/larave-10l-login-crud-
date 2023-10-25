<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 10 </title>
</head>
<body>

@guest
@else
    
    <a class="nav-link" href="{{ route('siswa.index') }}">Data siswa</a>
    <a class="nav-link" href="{{ route('jurusan.index') }}">Data jurusan</a>
    
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>
@endguest

    <div class="container">
        @yield('content')
    </div>

</body>
</html>

