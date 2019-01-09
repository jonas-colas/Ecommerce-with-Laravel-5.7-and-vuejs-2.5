<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="">
    <title>Ela - Bootstrap Admin Dashboard Template</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    <!-- Custom CSS -->

    <link href="{!! asset('css/adminpanel/lib/calendar2/semantic.ui.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/adminpanel/lib/calendar2/pignose.calendar.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/adminpanel/lib/owl.carousel.min.css') !!}" rel="stylesheet" />
    <link href="{!! asset('css/adminpanel/lib/owl.theme.default.min.css') !!}" rel="stylesheet" />
    <link href="{!! asset('css/adminpanel/helper.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/adminpanel/styleadmin.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>


<body class="fix-header fix-sidebar">

@yield('main_content')

@include('adminpanel.includes.footer')
