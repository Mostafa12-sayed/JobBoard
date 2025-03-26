@php

    $info =webinfo();

@endphp
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> @yield('title',"Job Board")</title>
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{$info ? asset($info->favicon) : ''}}">
    

    @include('Website.layouts.css')
    @yield('css')

</head>

<body>
  @include('Website.layouts.header')


  @yield('content')

  @include('Website.layouts.footer')
  @include('Website.layouts.scripts')


</body>
</html>
