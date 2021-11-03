
<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    @include('layouts.head')
</head>
<body>
    <div class="wrapper">
        <div id="pre-loader">
            <img src="{{ asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>
        @include('layouts.nav')
        @include('layouts.sidebar')
        <div class="content-wrapper">
           @yield('content')

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    @include('layouts.script')
</body>
</html>
