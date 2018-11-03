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
    <header class="row">
        <div class="col">
            @include('myaccount.partials.nav')
        </div>
    </header>
</div>
<div class="container">
    @include('admin.partials.message')
</div>
<div class="container">

