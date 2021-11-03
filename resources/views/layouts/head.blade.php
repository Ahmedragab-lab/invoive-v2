<!-- Favicon -->
<title>@yield('title')</title>
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

<!-- Font -->
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

<!-- css -->
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" /> --}}

@yield('css')
<!--- Style css -->
@if (App::getLocale() == 'en')
    <link href="{{ asset('assets/css/ltr.css') }}" rel="stylesheet">
@else
    <link href="{{ asset('assets/css/rtl.css') }}" rel="stylesheet">
@endif
