<html lang="pl">
<head>
    <meta charset="utf-8">

    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="author" content="Krzysztof Jabłoński">

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>

<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-white">
            <div class="nav-container p-5">
                @include('admin.partials.nav')
            </div>
        </div>
        <div class="col-md-10 bg-light text-dark pt-5">
            @include('admin.partials.message')

