<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template"/>
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template"/>
    <meta name="author" content="potenzaglobalsolutions.com"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>{{ __('main_trans.Main_title') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}"/>

    <!-- Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- CSS -->
    <link href="{{ URL::asset('assets/css/rtl.css') }}" rel="stylesheet">

  <!-- Custom Styles -->
    <style>
        .language-switcher {
            position: absolute;
            top: 10px;
            right: 20px;
            background-color: #f8f9fa;
            border-radius: 5px;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .language-switcher a {
            margin: 0 5px;
           
            text-decoration: none;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        .language-switcher a:hover {
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="wrapper">

     <!-- Language Switcher -->
     <div class="language-switcher text-right">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <a hreflang="{{ $localeCode }}" 
               href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" 
               class="btn btn-secondary">
               {{ $properties['native'] }}
            </a>
        @endforeach
    </div>

    <!-- Pre-loader -->
    <div id="pre-loader">
        <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="Pre-loader">
    </div>

    <!-- Login Section -->
    <section class="height-100vh d-flex align-items-center page-section-ptb login"
             style="background-image: url('{{ asset('assets/images/sativa.png') }}');">
        <div class="container">
            <div class="row justify-content-center no-gutters vertical-align">
                <div class="col-lg-4 col-md-6 login-fancy-bg bg"
                     style="background-image: url('{{ asset('assets/images/login-inner-bg.jpg') }}');">
                    <div class="login-fancy">
                        <h2 class="text-white mb-20">Hello world!</h2>
                        <p class="mb-20 text-white">Create tailor-cut websites with the exclusive multi-purpose
                            responsive template along with powerful features.</p>
                        <ul class="list-unstyled pos-bot pb-30">
                            <li class="list-inline-item"><a class="text-white" href="#">Terms of Use</a></li>
                            <li class="list-inline-item"><a class="text-white" href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 bg-white">

                    @if (session()->has('Add'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('Add') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="login-fancy pb-40 clearfix">
                        @if($type == 'student')
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">  {{ __('dashboard.Login_Student') }}</h3>
                        @elseif($type == 'parent')
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30"> {{ __('dashboard.Guardian') }}</h3>
                        @elseif($type == 'teacher')
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">  {{ __('dashboard.Login_Teacher') }}</h3>
                        @else
                            <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">  {{ __('dashboard.Login_Admin') }}</h3>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="section-field mb-20">
                                <label class="mb-10" for="email"> {{ __('Teacher_trans.Email') }} *</label>
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <input type="hidden" value="{{ $type }}" name="type">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="section-field mb-20">
                                <label class="mb-10" for="password"> {{ __('Teacher_trans.Password') }} *</label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="section-field">
                                <div class="remember-checkbox mb-30">
                                    <input type="checkbox" class="form-control" name="remember" id="remember"/>
                                    <label for="remember">{{ __('Teacher_trans.Remind_me') }}</label>
                                    <a href="#" class="float-right">   {{ __('Teacher_trans.Forgot_your_password') }}</a>
                                </div>
                            </div>
                            <button class="button"><span>{{ __('Teacher_trans.Login') }}</span><i class="fa fa-check"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Login Section -->

</div>

<!-- jQuery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- Plugins jQuery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- Plugin Path -->
<script>
    var plugin_path = 'js/';
</script>
<!-- Custom Scripts -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>

<!-- Additional Scripts -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<script src="{{ URL::asset('assets/js/sweetalert2.js') }}"></script>
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>

@yield('js')

</body>
</html>
