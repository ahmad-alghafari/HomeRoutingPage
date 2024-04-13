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
                            <h1 class="h4 card-title mb-0">Create a page</h1>
                        </div>
                        <!-- Title END -->


                        <!-- Create a page form START -->
                        <div class="card-body">
                            <form class="row g-3">
                                <!-- Page information -->
                                <div class="col-12">
                                    <label class="form-label">Page name</label>
                                    <input type="text" class="form-control" placeholder="Page name (Required)"
                                        name="name" required>
                                    <small>Name that describes what the page is about.</small>
                                </div>

                                <div class="col-sm-6 col-lg-4">
                                    <label class="form-label">Country </label>
                                    <select class="form-select js-choice" data-search-enabled="true" name="country">
                                        <option value="PV">Comedy</option>
                                        <option value="PB">Technology</option>
                                        <option value="PV">Education</option>
                                        <option value="PV">Entertainment</option>
                                        <option value="PV">Hotel</option>
                                        <option value="PV">Travel</option>
                                    </select>
                                </div>
                                <!-- Email -->
                                <div class="col-sm-6 col-lg-4">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control" placeholder="Email (Required)">
                                </div>

<!-- Country -->
<div class="col-sm-6 col-lg-4">
    <label class="form-label">Country</label>
    <input type="text" class="form-control" placeholder="Email (Required)" name="Country">
</div>

                                <!-- Category -->
                                <div class="col-sm-6 col-lg-4">
                                    <label class="form-label">Category (required)</label>
                                    <select class="form-select js-choice" data-search-enabled="true">
                                        <option value="PV">Comedy</option>
                                        <option value="PB">Technology</option>
                                        <option value="PV">Education</option>
                                        <option value="PV">Entertainment</option>
                                        <option value="PV">Hotel</option>
                                        <option value="PV">Travel</option>
                                    </select>
                                </div>

                                <!-- Website URL -->
                                <div class="col-sm-6">
                                    <label class="form-label">Website URL</label>
                                    <input type="text" class="form-control" placeholder="https://www.webestica.com">
                                </div>
                                <!-- Phone number -->
                                <div class="col-lg-6">
                                    <label class="form-label">Phone number</label>
                                    <input type="text" class="form-control" placeholder="Phone number (Required)">
                                </div>
                                <!-- Page information -->
                                <div class="col-12">
                                    <label class="form-label">About page</label>
                                    <textarea class="form-control" rows="3" placeholder="Description (Required)"></textarea>
                                    <small>Character limit: 300</small>
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
                                            placeholder="https://www.facebook.com">
                                    </div>
                                </div>
                                <!-- Twitter -->
                                <div class="col-sm-6">
                                    <label class="form-label">Twitter</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0"> <i
                                                class="bi bi-twitter text-twitter"></i> </span>
                                        <input type="text" class="form-control"
                                            placeholder="https://www.twitter.com">
                                    </div>
                                </div>
                                <!-- Instagram -->
                                <div class="col-sm-6">
                                    <label class="form-label">Instagram</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0"> <i
                                                class="bi bi-instagram text-instagram"></i> </span>
                                        <input type="text" class="form-control"
                                            placeholder="https://www.instagram.com">
                                    </div>
                                </div>
                                <!-- Pinterest -->
                                <div class="col-sm-6">
                                    <label class="form-label">Pinterest</label>
                                    <div class="input-group">
                                        <span class="input-group-text border-0"> <i
                                                class="bi bi-pinterest text-pinterest"></i> </span>
                                        <input type="text" class="form-control"
                                            placeholder="https://www.pinterest.com">
                                    </div>
                                </div>
                                <!-- Button  -->
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-primary mb-0">Create a page</button>
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
