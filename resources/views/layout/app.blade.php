<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Capple - Website bán đồ ăn, trái cây, rau củ trực tuyến</title>


    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <script src="{{ asset('assets/js/ButtonGroupHandler.js') }}"></script>
    <script src="{{ asset('assets/admin/js/cancelConfirmation.js') }}"></script>
    <script src="{{ asset('assets/admin/js/deleteConfirmation.js') }}"></script>
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

</head>

@include('layout.header')


@yield('content')

@include('layout.footer')
