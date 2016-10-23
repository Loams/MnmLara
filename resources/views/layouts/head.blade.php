<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@if(isset($page)){{ $page['name'] }} @else MnM's Project @endif</title>
<meta name="description" content="@if(isset($page)){{ $page['description'] }} @else MnM's Project @endif">
<!-- Bootstrap -->
<link href="{{ url('/') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link href="{{ url('/') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- NProgress -->
<link href="{{ url('/') }}/vendors/nprogress/nprogress.css" rel="stylesheet">
<!-- iCheck -->
<link href="{{ url('/') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
<!-- bootstrap-progressbar -->
<link href="{{ url('/') }}/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
<!-- JQVMap -->
<link href="{{ url('/') }}/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet">

<!-- Custom Theme Style -->
<link href="{{ url('/') }}/build/css/custom.css" rel="stylesheet">

@yield('css')
