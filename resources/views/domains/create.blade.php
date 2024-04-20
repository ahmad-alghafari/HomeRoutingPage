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
    <link rel="stylesheet" type="text/css"
        href="{{ asset('import/assets/vendor/choices.js/public/assets/styles/choices.min.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('import/assets/css/style.css') }}">

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
                    <!-- Create a page START -->
                    <div class="card">
                        <!-- Title START -->
                        <div class="card-header border-0 pb-0">
                            <h1 class="h4 card-title mb-0">Create A Page</h1>
                        </div>
                        <!-- Title END -->


                        <!-- Create a page form START -->
                        <div class="card-body">
                            <form class="row g-3" enctype="multipart/form-data" method="POST"
                                action="{{ route('domains.store') }}">
                                @csrf
                                @method('POST')
                                <!-- Page information -->
                                <div class="col-12">
                                    <label class="form-label">Page name</label>
                                    <input type="text" class="form-control" placeholder="Page Name (Unique) "
                                        name="name" required maxlength="24" minlength="8"
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <span class="feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <small>Name that describes what the page is about , character limit: 4</small>
                                </div>

                                <!-- Country -->
                                <div class="col-sm-6 col-lg-4">
                                    <label class="form-label">Country</label>
                                    <input type="text" class="form-control" placeholder="Country SY,UAE,KSA,EGY,USA"
                                        name="country" required minlength="2" maxlength="4"
                                        value="{{ old('country') }}">
                                    @error('country')
                                        <span class="feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <small>Character limit: 4</small>
                                </div>

                                <!-- Category -->
                                <div class="col-sm-6 col-lg-4">
                                    <label class="form-label">Language </label>
                                    <select class="form-select js-choice" data-search-enabled="true" required
                                        name="language">
                                        <option value="arabic" selected>Arabic</option>
                                        <option value="english">English</option>
                                        <option value="french">French</option>
                                        <option value="spanish">Spanish</option>
                                        <option value="hindi">Hindi</option>
                                        <option value="latin">Latin</option>
                                        <option value="chinese">Chinese</option>
                                        <option value="armenian">Armenian</option>
                                        <option value="russian">Russian</option>
                                    </select>
                                    @error('language')
                                        <span class="feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Type -->
                                <div class="col-sm-6 col-lg-4">
                                    <label class="form-label">Type </label>
                                    <select class="form-select js-choice" data-search-enabled="true" name="type"
                                        required>
                                        <option value="sport">Sport</option>
                                        <option value="food">Food</option>
                                        <option value="education">Education</option>
                                        <option value="policy">Policy</option>
                                        <option value="medicine">Medicine</option>
                                        <option value="general" selected>General</option>
                                    </select>
                                    @error('type')
                                        <span class="feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Domain -->
                                <div class="col-sm-6 col-lg-4">
                                    <label class="form-label">Domain </label>
                                    <select class="form-select js-choice" data-search-enabled="true" name="domain"
                                        required>
                                        <option value="com" selected>com</option>
                                        <option value="net">net</option>
                                        <option value="org">org</option>
                                        <option value="edu">edu</option>
                                        <option value="gov">gov</option>
                                        <option value="mil">mil</option>
                                        <option value="int">int</option>
                                    </select>
                                    @error('domain')
                                        <span class="feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Website URL -->
                                <div class="col-sm-6">
                                    <label class="form-label">Website URL</label>
                                    <input type="text" class="form-control" placeholder="https://www.tagh.com"
                                        required name="url" value="{{ old('url') }}">
                                    @error('url')
                                        <span class="feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <!-- Icon -->
                                <div class="col-lg-6">
                                    <label class="form-label">Icon</label>
                                    <input type="file" class="form-control" name="icon" required
                                        accept="image/*">
                                    @error('icon')
                                        <span class="feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Page description -->
                                <div class="col-12">
                                    <label class="form-label">Page Description</label>
                                    <textarea class="form-control" rows="3" placeholder="Description " name="description" required
                                        maxlength="300" minlength="60">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <small>Character limit:300 , minimum:60</small>
                                </div>

                                <!-- Divider -->
                                <hr>

                                <h1 class="h5 card-title mb-0">Constraint Choice </h1>

                                <div class="col-12">

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="c1"
                                            name="racism" value="true">
                                        <label class="form-check-label" for="c1">
                                            <h1 class="h5 card-title mb-0">Racism</h1>
                                            Speaking racist about a specific thing or race and speaking about it and
                                            treating it as if it is normal.
                                        </label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="c2"
                                            name="truculence" value="true">
                                        <label class="form-check-label" for="c2">
                                            <h1 class="h5 card-title mb-0">Truculence</h1>
                                            Circulating words, pictures, and videos showing violence and showing the
                                            true picture of violence that is not normally visible to everyone who does
                                            not want to see it.
                                        </label>
                                    </div>



                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="c3"
                                            name="politics" value="true">
                                        <label class="form-check-label" for="c3">
                                            <h1 class="h5 card-title mb-0">Politics</h1>
                                            Talking about politics that supports or opposes different points of view
                                            about what is going on, about the general situation of countries, wars, etc.
                                        </label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="c4"
                                            name="pornography" value="true">
                                        <label class="form-check-label" for="c4">
                                            <h1 class="h5 card-title mb-0">Pornography</h1>
                                            Publishing scandalous and obscene images that are inappropriate for all ages
                                            and all religions, which offends public taste and educational custom.
                                        </label>
                                    </div>

                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="c5"
                                            name="religions" value="true">
                                        <label class="form-check-label" for="c5">
                                            <h1 class="h5 card-title mb-0">Religions And Sects</h1>
                                            Insulting and insulting religions, speaking about them with mockery and
                                            sarcasm, or claiming to create a new religion or sect.
                                        </label>
                                    </div>

                                </div>



                                <!-- Divider -->
                                <hr>

                                <!-- Social Links START -->
                                <div class="col-12">
                                    <h5 class="card-title mb-0">Social Links</h5>
                                </div>


                                <!-- Facebook -->
                                <div class="col-sm-6">
                                    <label class="form-label">Facebook</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0"> <i
                                                class="bi bi-facebook text-facebook"></i> </span>
                                        <input type="text" class="form-control"
                                            placeholder="https://www.facebook.com" name="social_facebook"
                                            value="{{ old('social_facebook') }}">
                                        @error('social_facebook')
                                            <span class="feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- x -->
                                <div class="col-sm-6">
                                    <label class="form-label">X</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0"> <i class="bi bi-x text-x"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="https://www.x.com"
                                            name="social_x" value="{{ old('social_x') }}">
                                        @error('social_x')
                                            <span class="feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Instagram -->
                                <div class="col-sm-6">
                                    <label class="form-label">Instagram</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0"> <i
                                                class="bi bi-instagram text-instagram"></i> </span>
                                        <input type="text" class="form-control"
                                            placeholder="https://www.instagram.com" name="social_instagram"
                                            value="{{ old('social_instagram') }}">
                                        @error('social_instagram')
                                            <span class="feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- YouTube -->
                                <div class="col-sm-6">
                                    <label class="form-label">YouTube</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0"> <i
                                                class="bi bi-youtube text-youtube"></i> </span>
                                        <input type="text" class="form-control"
                                            placeholder="https://www.youtube.com" name="social_youtube"
                                            value="{{ old('social_youtube') }}">
                                        @error('social_youtube')
                                            <span class="feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>



                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <!-- Button  -->
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary mb-0">Create A Page</button>
                                </div>
                            </form>
                        </div>
                        <!-- Create a page form END -->
                    </div>
                    <!-- Create a page END -->
                </div>

            </div> <!-- Row END -->
        </div>
        <!-- Container END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->

    <!-- =======================
JS libraries, plugins and custom scripts -->

    <!-- Bootstrap JS -->
    <script src="{{ asset('import/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Vendors -->
    <script src="{{ asset('import/assets/vendor/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    <!-- Theme Functions -->
    <script src="{{ asset('import/assets/js/functions.js') }}"></script>

</body>

</html>
