<!DOCTYPE html>
<html lang="en">
<head>
    <title>javascript</title>
</head>
<body>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;60
0;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstr
ap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js
/latest/toastr.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/
4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style1.css">
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-primary mb-3">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<a class="navbar-brand" href="#"><font color="black">RPL</font></a>
<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
<li class="nav-item active">
<a class="nav-link" href="{{url('/home')}}"><font color="black">HOME</font> <span class="sr-only"></span></a>
</li>
<li class="nav-item">
<a class="nav-link"  href="{{url('/')}}"><font color="black"></font>
</a>
</li>  
<li class="nav-item">
<a class="nav-link"  href="{{url('/spesifikasi')}}"><font color="black">SPESIFIKASI</font>
</a>
</li> 
<li class="nav-item">
<a class="nav-link"  href="{{url('/')}}"><font color="black"></font>
</a>
</li>
<li class="nav-item">
<a class="nav-link"  href="{{url('/transaksi')}}"><font color="black">TRANSAKSI</font>
</a>
</li>  
<li class="nav-item">
<a class="nav-link"  href="{{url('/foto')}}"><font color="black">Foto</font>
</a>
<li class="nav-item">
<a class="nav-link"  href="{{url('/user')}}"><font color="black">USER</font>
</a>
</li>      
          
     
                                                 

<li class="nav-item">
<a class="nav-link disabled" href="#" tabindex="-
1" aria-disabled="true"><font color="black">Disabled</font></a>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<font color="black"> Dropdown link</font>
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
<a class="dropdown-item" href="#">register</a>
<li class="nav-item">
 <a href="{{ route('logout') }}" class="nav-link">
 <font color="black">logout</font></a>
</li>

<a class="dropdown-item" href="{{ url('changepassword') }}">Ganti Password</a>
<a class="dropdown-item" href="#"></a>
</div>
</li>
</ul>
<form class="form-inline my-2 my-lg-0">
<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
<button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
</form>
</div>
</nav>
</header>
    <div class="container">
        <header>
            <!-- bagian judul -->
            <h3>@yield('judul_halaman')</h3>
            <!-- bagian isi -->
            @yield('konten')
            @include('sweetalert::alert')
            <br>
        </header>
        <footer>
            <p>www.com</p>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/
umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery
.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/
bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toas
tr.min.js"></script>
<script src="js/scripku.js"></script>
</body>
</html>