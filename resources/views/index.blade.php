<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/
    css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/assets/css/site.min.css">
</head>
<body>
@include('layout.header')
<div class="wrapper"> 
    <div class="row">
        <div class="col col5-24">
            <div class="col-inner">
                @include('layout.sidebar')
            </div>
        </div>
        <div class="col col14-24">
            <div class="col-inner">
                @yield('content')
            </div>
        </div>
        <div class="col col5-24">
            <div class="col-inner">
                @yield('sidebar_right')
            </div>
        </div>
    </div>
</div>
@include('layout.footer')
</body>
</html>