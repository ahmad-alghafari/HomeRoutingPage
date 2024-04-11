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
	<link rel="shortcut icon" href="{{asset("import/assets/images/favicon.ico")}}">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset("import/assets/vendor/font-awesome/css/all.min.css")}}">
	<link rel="stylesheet" type="text/css" href="{{asset("import/assets/vendor/bootstrap-icons/bootstrap-icons.css")}}">

  <!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset("import/assets/css/style.css")}}">
	 
</head>

<body>

<!-- =======================
Header START -->
<header class="navbar-light fixed-top header-static bg-mode">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
          <!-- Logo START -->
          <a class="navbar-brand" href="{{route("home.posts.index")}}">
            <img class="light-mode-item navbar-brand-item" src="{{asset("import/assets/images/logo.svg")}}" alt="logo">
                    <img class="dark-mode-item navbar-brand-item" src="{{asset("import/assets/images/logo.svg")}}" alt="logo">		
          </a>
          <!-- Logo END -->
  
          <!-- Responsive navbar toggler -->
              <button class="navbar-toggler ms-auto icon-md btn btn-light p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
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
                      <a class="nav-link" href="{{route('login')}}">Log In</a>
                  @endguest
              </li>
              <!-- Nav item -->
              <li class="nav-item">
                @guest
                    @if (Route::has('register'))
                        <a  class="nav-link" href="{{ route('register') }}">Sign In</a>
                    @endif
                @endguest
              </li>
            </ul>
          </div>
          <!-- Main navbar END -->
  
          <!-- Nav right START -->
          <div class="ms-3 ms-lg-auto">
            <a class="btn btn-dark" href="app-download.html"> Download app </a>
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
      <div class="col-lg-8">
        <div class="bg-mode p-4">
          <h1 class="h4 mb-4">Latest And Most Famos Domains</h1>

          @foreach ($domains as $domain)
            
            <!-- Blog item START -->
            <div class="card bg-transparent border-0">
              <div class="row g-3">
                <div class="col-4">
                  <!-- Blog image -->
                  <img class="rounded" src="{{asset("import/assets/images/post/4by3/03.jpg")}}" alt="">
                </div>
                <div class="col-8">
                  <!-- Blog caption -->
                  <a href="#" class="badge bg-danger bg-opacity-10 text-danger mb-2 fw-bold">#{{$domain->id}}</a>
                  <a href="#" class="badge bg-danger bg-opacity-10 text-danger mb-2 fw-bold">Syria</a>
                  <a href="#" class="badge bg-danger bg-opacity-10 text-danger mb-2 fw-bold">{{$domain->language}}</a>
                  <a href="#" class="badge bg-danger bg-opacity-10 text-danger mb-2 fw-bold">{{$domain->Type}}</a>

                  <h5><a href="blog-details.html" class="btn-link stretched-link text-reset fw-bold">{{$domain->name}}</a></h5>
                  <div class="d-none d-sm-inline-block">
                    <p class="mb-2">{{$domain->description}}</p>
                    <!-- BLog date -->
                    <a class="small text-secondary" href="#!"> <i class="bi bi-calendar-date pe-1"></i> {{$domain->created_at->format('M d, Y')}}</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Blog item END -->
            <hr class="my-4">
          @endforeach
          
          <!-- Pagination -->
          <div class="mt-4">
            {{$domains->links('vendor.pagination.custom')}}
          </div>
        </div>
      </div>
      <!-- Main content END -->

      <!-- Right sidebar START -->
      <div class="col-lg-4">
        <div class="row g-4">
          <!-- Card News START -->
          <div class="col-sm-6 col-lg-12">
            <div class="card">
              <!-- Card header START -->
              <div class="card-header pb-0 border-0">
                <h5 class="card-title mb-0">Recent post</h5>
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
              </div>
              <!-- Card body END -->
            </div>
          </div>
          <!-- Card News END -->
      </div> <!-- Row END -->
    </div>
  </div>
  <!-- Container END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

<!-- footer START -->
<footer class="bg-mode py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <!-- Footer nav START -->
        <ul class="nav justify-content-center justify-content-md-start lh-1">
          <li class="nav-item">
            <a class="nav-link" href="my-profile-about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" target="_blank" href="https://support.webestica.com/login">Support </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" target="_blank" href="docs/index.html">Docs </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="privacy-and-terms.html">Privacy & terms</a>
          </li>
        </ul>
        <!-- Footer nav START -->
      </div>
      <div class="col-md-6">
        <!-- Copyright START -->
        <p class="text-center text-md-end mb-0">©2023 <a class="text-body" target="_blank" href="https://www.webestica.com"> Webestica </a>All rights reserved.</p>
        <!-- Copyright END -->
      </div>
    </div>
  </div>
</footer>
<!-- footer END -->
 
<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="{{asset("import/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>

<!-- Theme Functions -->
<script src="{{asset("import/assets/js/functions.js")}}"></script>
 
</body>
</html>