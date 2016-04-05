<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/
    css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/assets/css/site.min.css">

    <script type="text/javascript" async src="/assets/js/libs/modernizr-2.8.3.min.js"></script>
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

<script src="https://code.jquery.com/jquery-2.2.2.min.js" integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.0-rc.1/jquery-ui.min.js" integrity="sha256-mFypf4R+nyQVTrc8dBd0DKddGB5AedThU73sLmLWdc0=" crossorigin="anonymous"></script>
@yield('scripts')

<script src="/assets/js/site.js" type="text/javascript"></script>

</body>
</html>