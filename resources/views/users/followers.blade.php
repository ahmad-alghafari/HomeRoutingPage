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
            if(el != 'undefined' && el != null) {
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
    <link rel="shortcut icon" href="{{asset('import/assets/images/favicon.ico')}}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/css/style.css')}}">
    <livewire:styles />

</head>

<body>

<!-- =======================
Header START -->
<header class="navbar-light fixed-top header-static bg-mode">

    <!-- Logo Nav START -->
    @include('layouts.nav')
    <!-- Logo Nav END -->
</header>
<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main>

    <!-- Container START -->
    <div class="container">
        <div class="row g-4">

            <!-- Sidenav START -->
            @include('users.leftSideNav')
            <!-- Sidenav END -->

            <!-- Main content START -->
            <div class="col-md-8 col-lg-6 vstack gap-4">
                @livewire('following' , [$user_id , $page])
{{--                <livewire:following :id="$user_id" />--}}
            </div>

            <!-- Right sidebar START -->
            <div class="col-lg-3">
                <div class="row g-4">
                    <!-- Card follow START -->
                    <div class="col-sm-6 col-lg-12">
                        <div class="card">
                            <!-- Card header START -->
                            <div class="card-header pb-0 border-0">
                                <h5 class="card-title mb-0">Who to follow</h5>
                            </div>
                            <!-- Card header END -->
                            <!-- Card body START -->
                            @livewire('who-to-follow')
                            <!-- Card body END -->
                        </div>
                    </div>
                    <!-- Card follow START -->

                    <!-- Card News START -->
                    <div class="col-sm-6 col-lg-12">
                        <div class="card">
                            <!-- Card header START -->
                            <div class="card-header pb-0 border-0">
                                <h5 class="card-title mb-0">Today’s news</h5>
                            </div>
                            <!-- Card header END -->
                            <!-- Card body START -->
                            <div class="card-body">
                                <!-- News item -->
                                <div class="mb-3">
                                    <h6 class="mb-0"><a href="blog-details.html">Ten questions you should answer truthfully</a></h6>
                                    <small>2hr</small>
                                </div>
                                <!-- News item -->
                                <div class="mb-3">
                                    <h6 class="mb-0"><a href="blog-details.html">Five unbelievable facts about money</a></h6>
                                    <small>3hr</small>
                                </div>
                                <!-- News item -->
                                <div class="mb-3">
                                    <h6 class="mb-0"><a href="blog-details.html">Best Pinterest Boards for learning about business</a></h6>
                                    <small>4hr</small>
                                </div>
                                <!-- News item -->
                                <div class="mb-3">
                                    <h6 class="mb-0"><a href="blog-details.html">Skills that you can learn from business</a></h6>
                                    <small>6hr</small>
                                </div>
                                <!-- Load more comments -->
                                <a href="#!" role="button" class="btn btn-link btn-link-loader btn-sm text-secondary d-flex align-items-center" data-bs-toggle="button" aria-pressed="true">
                                    <div class="spinner-dots me-2">
                                        <span class="spinner-dot"></span>
                                        <span class="spinner-dot"></span>
                                        <span class="spinner-dot"></span>
                                    </div>
                                    View all latest news
                                </a>
                            </div>
                            <!-- Card body END -->
                        </div>
                    </div>
                    <!-- Card News END -->
                </div>
            </div>
            <!-- Right sidebar END -->

        </div> <!-- Row END -->
    </div>
    <!-- Container END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="{{asset("import/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>

<!-- Theme Functions -->
<script src="{{asset("import/assets/js/functions.js")}}"></script>

<livewire:scripts />

</body>
</html>
