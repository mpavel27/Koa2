<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kingdom of Ash - Metin2</title>
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro-v4-shims.min.css" media="all">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro-v4-font-face.min.css" media="all">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/latest/css/pro.min.css" media="all">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/mobile.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap/css/bootstrap.min.css">
    <script src="/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @toastr_css
    <style>
        .toast {
            width: 350px;
            max-width: 100%;
            font-size: 14px !important;
            pointer-events: auto;
            background-clip: padding-box;
            border: unset !important;
            box-shadow: 0 0 20px 0px #0000001f !important;
            border-radius: 6px !important;
        }
    </style>
</head>
<body>
<div class="right-navbar" id="mobile_navbar">
    <button class="toggle-navbar" id="toggle_navbar_collapse"><i class="fas fa-times"></i></button>
    <img class="mb-4" src="/assets/images/koa_logo_transparent.png" height="100">
    <ul class="list-unstyled m-0 text-center">
        <li>
            <a class="navbar-text text-decoration-none" href="{{ route('app.home') }}">HOME</a>
        </li>
        @if(!Auth::user())
            <li>
                <button type="button" class="navbar-text text-decoration-none border-0" data-bs-toggle="modal" data-bs-target="#registerModal">RANKING</button>
            </li>
        @endif
        <li>
            <a class="navbar-text text-decoration-none" href="#">DOWNLOAD</a>
        </li>
        <li>
            <a class="navbar-text text-decoration-none" href="#">RANKING</a>
        </li>
        <li>
            <a class="navbar-text text-decoration-none" href="#">FORUM</a>
        </li>
        <li>
            <a class="navbar-text text-decoration-none" href="#">SUPPORT</a>
        </li>
        <li>
            @if(Auth::user())
                <a href="{{ route('app.user') }}" class="btn btn-koa me-2">{{ Auth::user()->login }}</a>
            @else
                <button type="button" class="btn btn-koa me-2" data-bs-toggle="modal" data-bs-target="#loginModal">LOGIN</button>
            @endif
        </li>
    </ul>
</div>
<nav class="navbar navbar-expand-lg navbar-dark p-0 navbar-background fixed-top">
    <div class="container">
        <a class="koa-logo" href="{{ route('app.home') }}"></a>
        <button class="toggle-navbar" id="toggle_navbar"><i class="fas fa-arrow-alt-left"></i></button>
        <div class="collapse navbar-collapse m-5 nav-links" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item @if(Auth::user()) mx-4 @endif">
                    <a class="nav-link active" aria-current="page" href="{{ route('app.home') }}">HOME</a>
                </li>
                @if(!Auth::user())
                    <li class="nav-item mx-4">
                        <button type="button" class="nav-link border-0" data-bs-toggle="modal" data-bs-target="#registerModal">REGISTER</button>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="#">DOWNLOAD</a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link" href="#">RANKING</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">FORUM</a>
                </li>
                <li class="nav-item mx-4">
                    <a class="nav-link" href="#">SUPPORT</a>
                </li>
            </ul>
            <div class="d-flex">
                @if(Auth::user())
                    <a href="{{ route('app.user') }}" class="btn btn-koa me-2">{{ Auth::user()->login }}</a>
                @else
                    <button type="button" class="btn btn-koa me-2" data-bs-toggle="modal" data-bs-target="#loginModal">LOGIN</button>
                @endif
            </div>
        </div>
    </div>
</nav>
<header class="render">
    <div class="container">
        <div class="header row">
            <div class="col-md-6 d-flex justify-content-center">
                <div class="d-flex flex-column text-center">
                    {{--                    <h1 class="welcome">WELCOME</h1>--}}
                    {{--                    <h1 class="adventurer">ADVENTURER</h1>--}}
                    {{--                    <p class="mt-5" style="color: #e3dea0;">Join your adventure, select one of four unique classes. Choose between three old<br>kingdoms:<br>Jinno - Kingdom of the Old Black OX, Shinsoo - Kingdom of the Red Serpent<br>and Chunjo - Kingdom of the Old Golden Fire Serpent.</p>--}}
                    {{--                    <p style="color: #e3dea0;">Fight for your freedom, your adventures awaits for you now.</p>--}}
                    <div class="ch-zone mb-3">
                        <a class="download-btn" href="#">
                            <img src="/assets/images/koa-download-btn.png" alt="Download">
                        </a>

                        <img class="ch-bg" src="/assets/images/koa-ch.png">
                        <div class="ch-1">
                            <p class="ch">CH2</p>
                            @if($ch2)
                                <p class="online">ON</p>
                            @else
                                <p class="offline">OFF</p>
                            @endif
                        </div>
                        <div class="ch-2">
                            <p class="ch">CH3</p>
                            @if($ch3)
                                <p class="online">ON</p>
                            @else
                                <p class="offline">OFF</p>
                            @endif
                        </div>
                        <div class="ch-3">
                            <p class="ch">CH1</p>
                            @if($ch1)
                                <p class="online">ON</p>
                            @else
                                <p class="offline">OFF</p>
                            @endif
                        </div>
                        <div class="ch-4">
                            <p class="ch">CH5</p>
                            <p class="offline">OFF</p>
                        </div>
                        <div class="ch-5">
                            <p class="ch">CH6</p>
                            <p class="offline">OFF</p>
                        </div>
                        <div class="ch-6">
                            <p class="ch">CH4</p>
                            @if($ch4)
                                <p class="online">ON</p>
                            @else
                                <p class="offline">OFF</p>
                            @endif
                        </div>
                    </div>
                    @if(!Auth::user())
                        <p class="m-0" style="color: #e3dea0;">Not Registered yet?</p>
                        <a type="button" class="m-0 text-white text-decoration-none" data-bs-toggle="modal" data-bs-target="#registerModal">Create a new Account</a>
                    @else
                        <p class="m-0" style="color: #e3dea0;">Welcome back,</p>
                        <p class="m-0 text-white text-decoration-none">{{ Auth::user()->login }} ( <a href="{{ route('app.logout') }}" class="text-danger m-0">Logout</a> )</p>
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <p class="text-white m-0"><img src="{{ asset('assets/images/md.png') }}"> Monede dragon: {{ Auth::user()->coins }}</p>
                            <p class="text-white m-0"><img src="{{ asset('assets/images/jd.png') }}"> Tokens: {{ Auth::user()->jcoins }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
@yield('main-container')
<footer class="koa-footer">
    <div class="container">
        <div class="py-4">
            <div class="d-flex justify-content-between align-items-center">
                <img src="/assets/images/koa_logo.png" height="80">
                <div class="footer-navs">
                    <ul class="list-unstyled d-flex gap-4 m-0">
                        <li><a class="navbar-text text-decoration-none" href="{{ route('app.home') }}">HOME</a></li>
                        @if(!Auth::user())
                            <li><button type="button" class="navbar-text text-decoration-none border-0 p-0" data-bs-toggle="modal" data-bs-target="#registerModal">REGISTER</button></li>
                        @endif
                        <li><a class="navbar-text text-decoration-none" href="#">DOWNLOAD</a></li>
                        <li><a class="navbar-text text-decoration-none" href="#">RANKING</a></li>
                        <li><a class="navbar-text text-decoration-none" href="#">FORUM</a></li>
                        <li><a class="navbar-text text-decoration-none" href="#">SUPPORT</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

@if(!Auth::user())
    <!-- Modals -->

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-4 position-relative">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center">
                        <h4 class="m-0" style="color: #d5cb76;">User Panel</h4>
                        <p class="text-white"><span style="color: #a45f5f;">Not registered yet?</span> Sign up</p>
                        <form method="POST" action="/login/validate" class="px-5">
                            @csrf
                            <input type="text" name="login" class="custom-input w-100 mb-3" placeholder="Username" autocomplete="off">
                            <input type="password" name="password" class="custom-input w-100 mb-3" placeholder="Password" autocomplete="off">
                            <p style="color: #a45f5f;">I have forgot my password<br><span class='text-white'>Recover my account</span></p>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-koa mb-3">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login Modal -->

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-4 position-relative">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center">
                        <p class="text-white m-0">Not registered yet?</p>
                        <h6 class="mb-3 fw-bold" style="color: #d5cb76;">REGISTER A NEW ACCOUNT</h6>
                        <p class="text-white"><span style="color: #a45f5f;">I already have an account</span>, Sign in</p>
                        <form method="POST" action="/register/validate" class="px-5">
                            @csrf
                            <input type="text" name="login" class="custom-input w-100 mb-3" placeholder="Username..." autocomplete="off" required>
                            <input type="email" name="email" class="custom-input w-100 mb-3" placeholder="E-mail Address..." autocomplete="off" required>
                            <div class="d-flex align-items-center mb-3 position-relative">
                                <input type="password" name="password" class="custom-input w-100" placeholder="Password..." autocomplete="off" required>
                                <i type="button" class="fas fa-info-circle ms-3 position-absolute info-password" data-bs-toggle="tooltip" data-bs-placement="top" title="The password must contains minimum eight characters, at least one uppercase letter, one lowercase letter and one number"></i>
                            </div>
                            <input type="password" name="password_confirmation" class="custom-input w-100 mb-3" placeholder="Repeat Password..." autocomplete="off" required>
                            <input type="text" name="social_id" class="custom-input w-100 mb-3" placeholder="Delete code..." pattern=".{0,7}" maxlength="7" autocomplete="off" required>
                            <p style="color: #552c2c;">By creating a new account you accept Terms of Services and
                                Privacy Policy.</p>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-koa mb-3">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Register Modal -->

    <!-- End Modals -->
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/assets/js/scripts.js"></script>
@toastr_js
@toastr_render
</body>
</html>
