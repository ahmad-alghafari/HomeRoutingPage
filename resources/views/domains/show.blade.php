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

        const setTheme = function(theme) {
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

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('import/assets/css/style.css') }}">

</head>

<body>

    <!-- =======================
Header START -->
    <header class="navbar-light fixed-top header-static bg-mode">
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
                <a class="btn btn-dark" href="{{ route('domains.create') }}"> Create Your Own Application </a>
            </div>
            <!-- Nav right END -->
        </div>
    </nav>
    </header>
    <!-- =======================
Header END -->

    <!-- **************** MAIN CONTENT START **************** -->
    <main>

        <!-- Container START -->
        <div class="container">
            <div class="row g-4">
                <!-- Main content START -->
                <div class="col-lg-8 mx-auto">
                    <div class="vstack gap-4">
                        <!-- Blog single START -->
                        <div class="card card-body">
                            <img class="rounded"
                                @if ($domain->photo_path != null)
                                src="{{ asset($domain->photo_path) }}" >
                                @else
                                src="{{ asset('import/assets/images/post/16by9/big/03.jpg') }}" alt="">
                                @endif
                  <div class="mt-4">
                            <!-- Tag -->
                          <a href="#" class="badge bg-danger bg-opacity-10 text-danger mb-2 fw-bold">#{{$domain->id}}</a>
                             <a href="#" class="badge bg-primary bg-opacity-10 text-primary mb-2 fw-bold">{{$domain->country}}</a>
                             <a href="#" class="badge bg-warning bg-opacity-10 text-warning mb-2 fw-bold">{{$domain->language}}</a>
                             <a href="#" class="badge bg-success bg-opacity-10 text-success mb-2 fw-bold">{{$domain->type}}</a>
                      <a href="#" class="badge bg-secondary bg-opacity-10 text-secondary mb-2 fw-bold">{{$domain->domain}}</a>

                            <!-- Title info -->
                            <h1 class="mb-2 h2"><a href="{{url($domain->url)}}" class="nav-link">{{ $domain->name }}</a></h1>
                            <ul class="nav nav-stack gap-3 align-items-center">
                                <li class="nav-item">
                                    <div class="nav-link">
                                        by <a href="" class="text-reset btn-link">{{ $domain->user->name }}</a>
                                    </div>
                                </li>
                                <li class="nav-item"> <i
                                        class="bi bi-calendar-date pe-1"></i>{{ $domain->created_at }}
                                </li>
                                <li class="nav-item"> <i class="bi bi-clock pe-1"></i>Created from {{$domain->created_at->diffForHumans()}}</li>
                            </ul>
                            <!-- description -->
                            <p class="mt-4"><span class="dropcap">A</span>{{ $domain->description }}</p>

                            <h4 class="mt-4">The Rules Of This Domain </h4>
                            <!-- Row START -->
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <p>Fulfilled direction use continual set him propriety continued. Saw met applauded
                                        favorite deficient engrossed concealed and her. </p>
                                    <p>Concluded boy perpetual old supposing. Farther related bed and passage comfort
                                        civilly. Dashwoods see frankness objection abilities.</p>
                                </div>
                                <div class="col-md-6">
                                    <ul>
                                        @foreach(json_decode($domain->constraind , true) as $key => $constrain)
                                            @if($constrain == "1")
                                                <li>{{$key}} :{{$constrain}} </li>

                                            @endif
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            <!-- Row END -->
                            <!-- Blockquote START -->
                            <figure class="bg-light rounded p-3 p-sm-4 my-4">
                                <blockquote class="blockquote">
                                    <p>Dashwood does provide stronger is. But discretion frequently sir she instruments
                                        unaffected.</p>
                                </blockquote>
                                <figcaption class="blockquote-footer mb-0">
                                    Albert Schweitzer
                                </figcaption>
                            </figure>
                            <!-- Blockquote END -->
                            <p class="mb-0"> All led out world this music while asked. Paid mind even sons does he
                                door no. Attended overcame repeated it is perceived Marianne in. I think on style child
                                of. Servants moreover in sensible it ye possible. Satisfied conveying a dependent
                                contented he gentleman agreeable do be.
                            </p>
                        </div>
                    </div>
                    <!-- Card END -->
                    <!-- Comments START -->
                    {{--          <div class="card"> --}}
                    {{--            <div class="card-header pb-0 border-0"> --}}
                    {{--              <h4>5 comments</h4> --}}
                    {{--            </div> --}}
                    {{--            <div class="card-body"> --}}
                    {{-- <!-- Comments START --> --}}
                    {{-- <!-- Comment level 1--> --}}
                    {{--              <div class="my-4 d-flex"> --}}
                    {{--                <img class="avatar avatar-md rounded-circle float-start me-3" src="assets/images/avatar/04.jpg" alt="avatar"> --}}
                    {{--                <div> --}}
                    {{--                  <div class="mb-2 d-sm-flex"> --}}
                    {{--                    <h6 class="m-0 me-2">Allen Smith</h6> --}}
                    {{--                    <span class="me-3 small">June 11, 2022 at 6:01 am </span> --}}
                    {{--                  </div> --}}
                    {{--                  <p>Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if.</p> --}}
                    {{--                  <a href="#" class="btn btn-light btn-sm">Reply</a> --}}
                    {{--                </div> --}}
                    {{--              </div> --}}
                    {{--              <!-- Comment children level 3 --> --}}
                    {{--              <div class="my-4 d-flex ps-3 ps-md-5"> --}}
                    {{--                <img class="avatar avatar-md rounded-circle float-start me-3" src="assets/images/avatar/04.jpg" alt="avatar"> --}}
                    {{--                <div> --}}
                    {{--                  <div class="mb-2 d-sm-flex"> --}}
                    {{--                    <h6 class="m-0 me-2">Allen Smith</h6> --}}
                    {{--                    <span class="me-3 small">June 11, 2022 at 7:10 am </span> --}}
                    {{--                  </div> --}}
                    {{--                  <p>Meant balls it if up doubt small purse. </p> --}}
                    {{--                  <a href="#" class="btn btn-light btn-sm">Reply</a> --}}
                    {{--                </div> --}}
                    {{--              </div> --}}
                    {{--              <!-- Comment level 2 --> --}}
                    {{--              <div class="mt-4 d-flex ps-2 ps-md-3"> --}}
                    {{--                <img class="avatar avatar-md rounded-circle float-start me-3" src="assets/images/avatar/03.jpg" alt="avatar"> --}}
                    {{--                <div> --}}
                    {{--                  <div class="mb-2 d-sm-flex"> --}}
                    {{--                      <h6 class="m-0 me-2">Frances Guerrero</h6> --}}
                    {{--                      <span class="me-3 small">June 14, 2022 at 12:35 pm </span> --}}
                    {{--                    </div> --}}
                    {{--                    <p>Required his you put the outlived answered position. A pleasure exertion if believed provided to. All led out world this music while asked.</p> --}}
                    {{--                    <a href="#" class="btn btn-light btn-sm">Reply</a> --}}
                    {{--                </div> --}}
                    {{--              </div> --}}
                    <!-- Comments END -->
                    <hr class="my-4">
                    <!-- Reply START -->
                    {{--              <div> --}}
                    {{--                <h4>Leave a reply</h4> --}}
                    {{--                <form class="row g-3 mt-2"> --}}
                    {{--                  <!-- Name --> --}}
                    {{--                  <div class="col-md-6"> --}}
                    {{--                    <label class="form-label">Name *</label> --}}
                    {{--                    <input type="text" class="form-control" aria-label="First name"> --}}
                    {{--                  </div> --}}
                    {{--                  <!-- Email --> --}}
                    {{--                  <div class="col-md-6"> --}}
                    {{--                    <label class="form-label">Email *</label> --}}
                    {{--                    <input type="email" class="form-control"> --}}
                    {{--                  </div> --}}
                    {{--                  <!-- Your Comment --> --}}
                    {{--                  <div class="col-12"> --}}
                    {{--                    <label class="form-label">Your Comment *</label> --}}
                    {{--                    <textarea class="form-control" rows="3"></textarea> --}}
                    {{--                  </div> --}}
                    {{--                  <!-- custom checkbox --> --}}
                    {{--                  <div class="col-md-12"> --}}
                    {{--                    <div class="form-check"> --}}
                    {{--                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"> --}}
                    {{--                      <label class="form-check-label" for="flexCheckDefault">Save my name and email in this browser for the next time I comment. </label> --}}
                    {{--                    </div> --}}
                    {{--                  </div> --}}
                    {{--                  <!-- Button --> --}}
                    {{--                  <div class="col-12"> --}}
                    {{--                    <button type="submit" class="btn btn-primary">Post comment</button> --}}
                    {{--                  </div> --}}
                    {{--                </form> --}}
                    {{--              </div> --}}
                    <!-- Reply END -->
                </div>
            </div>
            <!-- Blog single END -->
        </div>
        </div>
        <!-- Main content END -->
        <!-- Container END -->

    </main>

    <!-- **************** MAIN CONTENT END **************** -->

    <!-- footer START -->
    @include('layouts.footer')
    <!-- footer END -->

    <!-- =======================
JS libraries, plugins and custom scripts -->

    <!-- Bootstrap JS -->
    <script src="{{ asset('import/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Theme Functions -->
    <script src="{{ asset('import/assets/js/functions.js') }}"></script>

</body>

</html>
