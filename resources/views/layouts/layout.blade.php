<!DOCTYPE HTML>
<html lang="en">
<head>
	@include('layouts.head')
</head>
<body @if (!Auth::guest())class="nav-md" @endif >
<div class="container body">
      <div class="main_container">
        

            @include('layouts.sidemenu.sidemenu')

          

			@include('layouts.navbar.navbar')

			@yield('content')
        	@include('layouts.footer')
      </div>
    </div>
@include('layouts.script')
</body>
</html>