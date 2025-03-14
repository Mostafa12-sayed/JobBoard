@php
    
    $info =webinfo();

@endphp
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Job Board</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('assets/dashboard/css/sweetalert2.min.css')}}" />
    <script src="{{ asset('assets/dashboard/js/sweetalert2.js') }}"></script>
    <!-- <link rel="manifest" href="site.webmanifest"> -->

<!-- Tagify JS -->
    <link rel="shortcut icon" type="image/x-icon" href="{{$info ? asset($info->favicon) : ''}}">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @include('Website.layouts.css')
    
</head>

<body>



  @include('Website.layouts.header')


  @yield('content')


  @include('Website.layouts.footer')
  @include('Website.layouts.scripts')

</body>

</html>