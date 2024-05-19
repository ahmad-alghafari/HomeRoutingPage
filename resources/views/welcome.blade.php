<!DOCTYPE html>
<html lang="en">

<head>
    <title>Social - Network, Community and Event Theme</title>

    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Webestica.com">
    <meta name="description" content="Bootstrap 5 based Social Media Network and Community Theme">

    <!-- Dark mode -->
    <script>
        const storedTheme = localStorage.getItem('theme')

        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme
            }
            return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
        }

        const setTheme = function (theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())

        window.addEventListener('DOMContentLoaded', () => {
            var el = document.querySelector('.theme-icon-active');
            if (el != 'undefined' && el != null) {
                const showActiveTheme = theme => {
                    const activeThemeIcon = document.querySelector('.theme-icon-active use')
                    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                    const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

                    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                        element.classList.remove('active')
                    })

                    btnToActive.classList.add('active')
                    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
                }

                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                    if (storedTheme !== 'light' || storedTheme !== 'dark') {
                        setTheme(getPreferredTheme())
                    }
                })

                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            localStorage.setItem('theme', theme)
                            setTheme(theme)
                            showActiveTheme(theme)
                        })
                    })

            }
        })
    </script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('import/assets/images/favicon.ico') }}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('import/assets/vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('import/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('import/assets/vendor/plyr/plyr.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('import/assets/css/style.css') }}">

</head>

<body>

<!-- =======================
Header START -->

<header class="navbar-light header-static bg-transparent">
    <!-- Navbar START -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo START -->
            <a class="navbar-brand" href="{{ route('home.posts.index') }}">
                <img class="light-mode-item navbar-brand-item" src="{{ asset('import/assets/images/logo.svg') }}"
                     alt="logo">
                <img class="dark-mode-item navbar-brand-item" src="{{ asset('import/assets/images/logo.svg') }}"
                     alt="logo">
            </a>
            <!-- Logo END -->

            <!-- Responsive navbar toggler -->
            <button class="navbar-toggler ms-auto icon-md btn btn-light p-0" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-animation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
            </button>

            <!-- Main navbar START -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav navbar-nav-scroll me-auto">
                    <!-- Nav item -->
                    <li class="nav-item">
                        @guest
                            <a class="nav-link" href="{{ route('login') }}">Log In</a>
                        @endguest
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        @guest
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">Sign In</a>
                            @endif
                        @endguest
                    </li>
                </ul>
            </div>
            <!-- Main navbar END -->
            <main></main>
            <!-- Nav right START -->
            <div class="ms-3 ms-lg-auto">


                <a class="btn btn-dark" href="{{ route('domains.create') }}"> Create Your Own System </a>
            </div>
            <!-- Nav right END -->
        </div>
    </nav>
    <!-- Navbar END -->
</header>

<!-- =======================
Header END -->

<main>

    <!-- **************** MAIN CONTENT START **************** -->

    <!-- Main banner START -->
    <section class="pt-5 pb-0 position-relative">

        <!-- Container START -->
        <div class="container">
            <!-- Row START -->
            <div class="row text-center position-relative z-index-1">
                <div class="col-lg-7 mx-auto">
                    <!-- Heading -->
                    <h1 class="display-3">TAGH</h1>
                    <p class="lead">Download the best decentralized social networking application and enjoy
                        conversations and posts between friends. </p>
                    <div class="d-sm-flex justify-content-center">
                        <!-- button -->
                        <a class="btn btn-primary" href="{{ route('domains.index') }}">Lets Start</a>
                        <div class="mt-2 mt-sm-0 ms-sm-3">
                            <!-- Rating START -->
                            <div class="hstack justify-content-center justify-content-sm-start gap-1">
                                <div><i class="fa-solid fa-star text-warning"></i></div>
                                <div><i class="fa-solid fa-star text-warning"></i></div>
                                <div><i class="fa-solid fa-star text-warning"></i></div>
                                <div><i class="fa-solid fa-star text-warning"></i></div>
                                <div><i class="fa-solid fa-star-half-stroke text-warning"></i></div>
                            </div>
                            <!-- Rating END -->
                            <i>"I can't believe it's free!"</i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row END -->

            <!-- Row START -->
            <div class="row g-0 align-items-center mt-2 position-relative z-index-1">
                <div class="col-lg-4">
                    <!-- iphone-x mockup START -->
                    <div class="iphone-x iphone-x-small"
                         style="background: url({{ asset('import/assets/images/mockup/iphone.PNG') }}); background-size: 100%;">
                        <i></i>
                        <b></b>
                    </div>
                    <!-- iphone-x mockup END -->
                </div>
                <div class="col-lg-8">
                    <!-- Mac desk START -->
                    <div class="mac_container ">

                        <div class="mac_scaler">
                            <div class="mac_holder">
                                <div class="mac_screen">
                                    <div class="mac_camera"></div>
                                    <div class="mac_screen_content"
                                         style="background:url({{ asset('import/assets/images/mockup/desktop.PNG') }}); background-size: 100%;">
                                    </div>
                                </div>
                                <div class="mac_bottom">
                                    <div class="mac_bottom_top_half">
                                        <div class="mac_thumb_space"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Mac desk START -->
                </div>
            </div>
            <!-- Row END -->
        </div>
        <!-- Container END -->

        <!-- Svg decoration START -->
        <div class="position-absolute top-0 end-0 mt-5 pt-5">
            <img class="h-300px blur-9 mt-5 pt-5" src="{{ asset('import/assets/images/elements/07.svg') }}">
        </div>
        <div class="position-absolute top-0 start-0 mt-n5 pt-n5">
            <img class="h-300px blur-9" src="{{ asset('import/assets/images/elements/01.svg') }}">
        </div>
        <div class="position-absolute top-50 start-50 translate-middle">
            <img class="h-300px blur-9" src="{{ asset('import/assets/images/elements/04.svg') }}">
        </div>
        <!-- Svg decoration END -->

    </section>
    <!-- Main banner END -->

    <!-- Messaging feature START -->
    <section class="py-4 py-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Title -->
                <div class="col-lg-12 text-center mb-4">
                    <h2 class="h1">More than messaging</h2>
                    <p>Express besides it present if at an opinion visitor. </p>
                </div>
            </div>
            <!-- Row START -->
            <div class="row g-4 g-lg-5">
                <!-- Feature START -->
                <div class="col-md-4 text-center">
                    <img class="h-100px mb-4" src="{{ asset('import/assets/images/elements/04.svg') }}">
                    <h4>Images and Videos</h4>
                    <p class="mb-0">Browse a lot of videos and topics that benefit you and are based on what you prefer
                        and think.</p>
                </div>
                <!-- Feature END -->

                <!-- Feature START -->
                <div class="col-md-4 text-center">
                    <img class="h-100px mb-4" src="{{ asset('import/assets/images/elements/07.svg') }}">
                    <h4>Auto save contacts</h4>
                    <p class="mb-0">Talk to friends directly and communicate with many of them at the same time.</p>
                </div>
                <!-- Feature END -->

                <!-- Feature START -->
                <div class="col-md-4 text-center">
                    <img class="h-100px mb-4" src="{{ asset('import/assets/images/elements/09.svg') }}">
                    <h4>Real Time Notifications</h4>
                    <p class="mb-0">Keep an eye out for message notifications, post notifications, comments, likes and
                        sharing of your posts. </p>
                </div>
                <!-- Feature END -->
            </div>
            <!-- Row START -->
        </div>
    </section>
    <!-- Messaging feature END -->

    <!-- features START -->
    <section class="py-4 py-sm-5">
        <div class="container">
            <div class="row g-4 g-lg-5 align-items-center">
                <!-- Title -->
                <div class="col-lg-4">
                    <h2 class="h1">Take a look at our big set of features</h2>
                    <p class="mb-4">Express besides it present if at an opinion visitor. </p>
                    <a class="btn btn-dark" href="#">Create Your Own System</a>
                </div>
                <!-- Feature item START -->
                <div class="col-lg-8">
                    <div class="card card-body bg-mode shadow-none border-0 p-4 p-sm-5 pb-sm-0 overflow-hidden">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <!-- Info -->
                                <img class="h-50px" src="{{ asset('import/assets/images/elements/05.svg') }}"
                                     alt="">
                                <h4 class="mt-4">Built-in digital wallet</h4>
                                <p class="mb-0">Yet uncommonly his ten who diminution astonished. Demesne new
                                    manners savings staying had. Under folly balls.</p>
                            </div>
                            <div class="col-md-6 text-end">
                                <!-- image -->
                                <!-- iphone-x mockup START -->
                                <div class="iphone-x iphone-x-small iphone-x-half mb-n5 mt-0"
                                     style="background: url({{ asset('import/assets/images/mockup/call.PNG') }}); background-size: 100%;">
                                    <i></i>
                                    <b></b>
                                </div>
                                <!-- iphone-x mockup END -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Feature item END -->

                <!-- Feature item START -->
                <div class="col-md-4">
                    <div class="card card-body bg-mode shadow-none border-0 p-4 p-lg-5">
                        <!-- Image -->
                        <div>
                            <img class="h-50px" src="{{ asset('import/assets/images/elements/03.svg') }}">
                        </div>
                        <!-- Info -->
                        <h4 class="mt-4">Safer communities</h4>
                        <p class="mb-0">Departure defective arranging rapturous did believe him all had supported
                            simple set nature.</p>
                    </div>
                </div>
                <!-- Feature item START -->

                <div class="col-md-4">
                    <div class="card card-body bg-mode shadow-none border-0 p-4 p-lg-5">
                        <!-- Image -->
                        <div>
                            <img class="h-50px" src="{{ asset('import/assets/images/elements/09.svg') }}">
                        </div>
                        <!-- Info -->
                        <h4 class="mt-4">Genuine users</h4>
                        <p class="mb-0">Satisfied conveying a dependent contented he gentleman agreeable do be
                            warrant removed.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-body bg-mode shadow-none border-0 p-4 p-lg-5">
                        <!-- Image -->
                        <div>
                            <img class="h-50px" src="{{ asset('import/assets/images/elements/06.svg') }}"
                                 alt="">
                        </div>
                        <!-- Info -->
                        <h4 class="mt-4">Stronger communities</h4>
                        <p class="mb-0">Meant balls it if up doubt small purse. Required his you put the outlived
                            answered position.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- features END -->

    <!-- Get Discovered START -->
    <section class="py-4 py-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 ms-auto">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-5 col-lg-5 position-relative">
                            <!-- Image -->
                            <img class="rounded-circle"
                                 src="{{ asset('import/assets/images/post/4by3/01.jpg') }}">
                            <!-- Chat START -->
                            <div class="position-absolute top-50 start-0 translate-middle d-none d-lg-block">
                                <!-- Chat item -->
                                <div
                                    class="bg-mode border p-3 rounded-3 rounded-start-top-0 d-flex align-items-center mb-3">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-xs me-3">
                                        <a href="#!"> <img class="avatar-img rounded-circle"
                                                           src="{{ asset('import/assets/images/avatar/12.jpg') }}"> </a>
                                    </div>
                                    <!-- Comment box  -->
                                    <div class="d-flex">
                                        <h6 class="mb-0 ">Happy birthday </h6>
                                        <span class="ms-2">🎂</span>
                                    </div>
                                </div>

                                <!-- Chat item -->
                                <div
                                    class="bg-mode border p-3 rounded-3 rounded-start-top-0 d-flex align-items-center mb-3">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-xs me-3">
                                        <a href="#!"> <img class="avatar-img rounded-circle"
                                                           src="{{ asset('import/assets/images/avatar/10.jpg') }}"> </a>
                                    </div>
                                    <!-- Comment box  -->
                                    <div class="d-flex">
                                        <h6 class="mb-0 ">New connection request </h6>
                                        <span class="ms-2">🤘</span>
                                    </div>
                                </div>

                                <!-- Chat item -->
                                <div
                                    class="bg-mode border p-3 rounded-3 rounded-start-top-0 d-flex align-items-center mb-3">
                                    <!-- Avatar -->
                                    <div class="avatar avatar-xs me-3">
                                        <a href="#!"> <img class="avatar-img rounded-circle"
                                                           src="{{ asset('import/assets/images/avatar/09.jpg') }}"> </a>
                                    </div>
                                    <!-- Comment box  -->
                                    <div class="d-flex">
                                        <h6 class="mb-0 ">Congratulations </h6>
                                        <span class="ms-2">🎂</span>
                                    </div>
                                </div>
                            </div>
                            <!-- Chat END -->
                        </div>
                        <div class="col-md-6">
                            <div class="ms-4">
                                <!-- Info -->
                                <h2 class="h1">Let's start</h2>
                                <p class="lead mb-4">You can enjoy our social networking site directly without joining
                                    one of the separate domains or creating your own domain. Let us!</p>
                                <a class="btn btn-primary" href="{{route("home.posts.index")}}"> Let's start </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Get Discovered START -->

    <!-- Video call START -->
    <section class="py-4 py-sm-5 position-relative">
        <!-- Svg decoration START -->
        <div class="position-absolute top-0 start-0 mt-n5 pt-n5">
            <img class="h-300px blur-9" src="{{ asset('import/assets/images/elements/06.svg') }}"
                 alt="">
        </div>
        <!-- Svg decoration END -->

        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="row g-4 align-items-center position-relative z-index-1">
                        <div class="col-md-6">
                            <div class="me-4">
                                <!-- TItle -->
                                <h2 class="h1 mb-4"> Soon -Video Call-</h2>

                                <!-- Meet creators -->
                                <div class="mb-3 d-flex align-items-start">
                                    <img class="h-40px" src="{{ asset('import/assets/images/elements/04.svg') }}"
                                         alt="">
                                    <div class="ms-4">
                                        <h5 class="mt-2">Meet creators</h5>
                                        <p class="mb-0">In no impression assistance contrasted Manners she
                                            wishing justice hastily.</p>
                                    </div>
                                </div>

                                <!-- Support artists   -->
                                <div class="mb-3 d-flex align-items-start">
                                    <img class="h-40px" src="{{ asset('import/assets/images/elements/10.svg') }}"
                                         alt="">
                                    <div class="ms-4">
                                        <h5 class="mt-2">Support artists</h5>
                                        <p class="mb-0">Handsome met debating sir dwelling age material. As style
                                            lived he worse dried. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-5 position-relative">
                            <!-- Image -->
                            <img class="rounded-circle"
                                 src="{{ asset('import/assets/images/post/4by3/02.jpg') }}" alt="">

                            <div class="position-absolute top-50 start-100 translate-middle d-none d-lg-block">
                                <!-- Video screen -->
                                <!-- Video action -->
                                <div class="position-absolute top-0 end-0 m-3 z-index-1">
                                    <div class="avatar avatar-lg">
                                        <a href="#!"><img
                                                class="avatar-img rounded border border-white border-1"
                                                src="{{ asset('import/assets/images/post/1by1/07.jpg') }}"
                                                alt=""></a>
                                    </div>
                                </div>

                                <!-- Video action -->
                                <div class="position-absolute bottom-0 start-50 translate-middle-x z-index-1">
                                    <button class="btn btn-white icon-md rounded-circle mb-3"><i
                                            class="bi bi-mic-mute"></i></button>
                                    <button class="btn btn-danger icon-md rounded-circle mb-3"><i
                                            class="bi bi-x-lg"></i></button>
                                </div>

                                <!-- HTML video START -->
                                <div class="player-wrapper plyr__controls-none rounded-3">
                                    <video class="player-html" crossorigin="anonymous" autoplay loop
                                           muted="" controls>
                                        <source src="{{ asset('import/assets/images/videos/video-call.mp4') }}"
                                                type="video/mp4">
                                    </video>
                                </div>
                                <!-- HTML video END -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Video call START -->

    <!-- Action box START -->
    {{--        <section class="py-4 py-sm-5">--}}
    {{--            <div class="container">--}}
    {{--                <div class="card card-body bg-light shadow-none border-0 p-4 p-sm-5 text-center">--}}
    {{--                    <div class="col-lg-8 mx-auto">--}}
    {{--                        <!-- Title -->--}}
    {{--                        <h2 class="h1">People prefer to message</h2>--}}
    {{--                        <p class="lead mb-4">Frequently sufficient to be unaffected. The furnished she concluded--}}
    {{--                            depending procuring concealed. </p>--}}
    {{--                        <div class="d-flex justify-content-center">--}}
    {{--                            <a href="app-download.html"><img class="h-40px"--}}
    {{--                                    src="{{ asset('import/assets/images/app-store.svg') }}" alt="app-store"></a>--}}
    {{--                            <a href="app-download.html"><img class="h-40px ms-1 ms-sm-2"--}}
    {{--                                    src="{{ asset('import/assets/images/google-play.svg') }}" alt="google-play"></a>--}}
    {{--                        </div>--}}
    {{--                        <!-- Box List -->--}}
    {{--                        <ul class="nav nav-divider justify-content-center mt-4">--}}
    {{--                            <li class="nav-item"> Easy set-up </li>--}}
    {{--                            <li class="nav-item"> Free Forever </li>--}}
    {{--                            <li class="nav-item"> Secure </li>--}}
    {{--                        </ul>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </section>--}}
    <!-- Action box END -->

    <!-- Main content END -->
</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- Footer START -->
@include('layouts.longFooter')
<!-- Footer END -->

<!-- QR-code START -->
{{--    <div class="position-fixed bottom-0 end-0 m-5 text-center d-none d-xxl-block">--}}
{{--        <h6 class="mt-3">Scan here <br> to download</h6>--}}
{{--        <!-- SVG START -->--}}
{{--        <svg class="h-80px" width="59" height="126" viewBox="0 0 59 126" fill="none"--}}
{{--            xmlns="http://www.w3.org/2000/svg">--}}
{{--            <path--}}
{{--                d="M38.2 56.6C38.5 56.2 38.8 56 38.9 55.7C45.1 45.5 50.4 34.9 53.5 23.2C54.9 17.9 55.5 12.5 55.8 7.09999C55.9 5.69999 56.1 4.19999 56.3 2.79999C56.4 2.29999 56.6 1.69999 56.9 1.29999C57.1 1.09999 57.6 0.899987 57.9 0.999987C58.2 1.09999 58.4 1.59999 58.4 1.89999C58 15.2 55.8 28.2 50 40.3C47 46.5 43.9 52.6 40.2 58.4C39.8 59 39.3 59.9 39.4 60.5C40.7 68.3 39.4 75.9 37.1 83.2C33.6 94.5 29.6 105.6 25.8 116.8C25.6 117.5 25.3 118.3 25.4 119.3C31.6 114.5 37.7 109.6 44 104.7C44.8 105.8 44.6 106.6 44.1 107.4C43.5 108.3 42.9 109.3 42.1 110.1C37.6 114.4 33.1 118.7 28.5 122.9C27.5 123.8 26.3 124.5 25.1 125.1C22.7 126.2 20.8 125.1 20.4 122.5C19.7 117.4 19.1 112.4 18.6 107.3C18.4 105.8 19 104.9 20.1 104.7C21.1 104.6 22 105.3 22.3 106.8C22.8 109.4 23.1 112 23.6 114.9C23.9 114.4 24.1 114.2 24.2 113.9C27.6 102.6 31.1 91.3 34.3 79.9C35.3 76.5 35.6 72.8 36.1 69.3C36.3 67.9 36.1 66.4 36.1 64.6C35.4 65.2 34.9 65.7 34.5 66.1C31.5 69.5 28.1 72.6 24.2 75C20.7 77.1 17 78.4 12.8 78.3C11.4 78.2 9.89998 78.1 8.49998 77.7C2.29998 76 -1.00002 70.4 0.399976 63.9C1.99998 55.8 10.1 45.9 21.8 46C28.4 46 33.4 49.1 37 54.6C37.4 55.2 37.8 55.9 38.2 56.6ZM12.7 75.5C16.5 75.4 19.7 74.4 22.6 72.6C27.3 69.9 31.1 66.1 34.5 62C35.3 61.1 35.3 60.2 35 59.1C33.2 53.4 27.2 49.2 21.3 49.4C13.3 49.7 5.09998 56.5 3.39998 64.4C2.19998 69.7 4.79998 73.8 9.99998 75.1C11 75.3 12.1 75.4 12.7 75.5Z"--}}
{{--                class="fill-secondary" />--}}
{{--        </svg>--}}
{{--        <!-- SVG END -->--}}
{{--        <!-- image -->--}}
{{--        <div class="mt-3">--}}
{{--            <img class="w-100px" src="{{ asset('import/assets/images/qr-code.png') }}" alt="">--}}
{{--        </div>--}}
{{--    </div>--}}

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="{{ asset('import/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

<!-- Vendors -->
<script src="{{ asset('import/assets/vendor/plyr/plyr.js') }}"></script>

<!-- Theme Functions -->
<script src="{{ asset('import/assets/js/functions.js') }}"></script>

</body>

</html>
