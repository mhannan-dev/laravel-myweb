<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="{{URL('frontend/css/styles.css')}}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('assets/ckeditor/ckeditor.js')}}" type="text/javascript"></script>


</head>
<body class="sb-nav-fixed">

@include('backend.partials.navbar')

<div id="layoutSidenav">
<div id="layoutSidenav_nav">
@include('backend.partials.sidebar')
</div>
<div id="layoutSidenav_content">

@yield('content')
@include('backend.partials.footer')
