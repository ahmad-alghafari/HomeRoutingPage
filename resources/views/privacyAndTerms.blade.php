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
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	 
</head>

<body>

<!-- =======================
Header START -->
<header class="navbar-light fixed-top header-static bg-mode">

	<!-- Logo Nav START -->
	<nav class="navbar navbar-expand-lg">
		<div class="container">
			<!-- Logo START -->
			<a class="navbar-brand" href="index.html">
        <img class="light-mode-item navbar-brand-item" src="assets/images/logo.svg" alt="logo">
				<img class="dark-mode-item navbar-brand-item" src="assets/images/logo.svg" alt="logo">
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

        <!-- Nav Search START -->
        <div class="nav mt-3 mt-lg-0 flex-nowrap align-items-center px-4 px-lg-0">
          <div class="nav-item w-100">
            <form class="rounded position-relative">
              <input class="form-control ps-5 bg-light" type="search" placeholder="Search..." aria-label="Search">
              <button class="btn bg-transparent px-2 py-0 position-absolute top-50 start-0 translate-middle-y" type="submit"><i class="bi bi-search fs-5"> </i></button>
            </form>
          </div>
        </div>
        <!-- Nav Search END -->

				<ul class="navbar-nav navbar-nav-scroll ms-auto">
					<!-- Nav item 1 Demos -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="homeMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Demo</a>
						<ul class="dropdown-menu" aria-labelledby="homeMenu">
							<li> <a class="dropdown-item" href="index.html">Home default</a></li>
							<li> <a class="dropdown-item" href="index-classic.html">Home classic</a></li>
							<li> <a class="dropdown-item" href="index-post.html">Home post</a></li>
							<li> <a class="dropdown-item" href="index-video.html">Home video</a></li>
							<li> <a class="dropdown-item" href="index-event.html">Home event</a></li>
							<li> <a class="dropdown-item" href="landing.html">Landing page</a></li>
							<li> <a class="dropdown-item" href="app-download.html">App download</a></li>
              <li class="dropdown-divider"></li>
							<li> 
								<a class="dropdown-item" href="https://themes.getbootstrap.com/store/webestica/" target="_blank">
									<i class="text-success fa-fw bi bi-cloud-download-fill me-2"></i>Buy Social!
								</a> 
							</li>
						</ul>
					</li>
					<!-- Nav item 2 Pages -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
						<ul class="dropdown-menu" aria-labelledby="pagesMenu">
							<li> <a class="dropdown-item" href="albums.html">Albums</a></li>
							<li> <a class="dropdown-item" href="celebration.html">Celebration</a></li>
              <li> <a class="dropdown-item" href="messaging.html">Messaging</a></li>
							<!-- Dropdown submenu -->
							<li class="dropdown-submenu dropend"> 
                <a class="dropdown-item dropdown-toggle" href="#!">Profile</a>
								<ul class="dropdown-menu" data-bs-popper="none">
									<li> <a class="dropdown-item" href="my-profile.html">Feed</a> </li>
									<li> <a class="dropdown-item" href="my-profile-about.html">About</a> </li>
									<li> <a class="dropdown-item" href="my-profile-connections.html">Connections</a> </li>
									<li> <a class="dropdown-item" href="my-profile-media.html">Media</a> </li>
									<li> <a class="dropdown-item" href="my-profile-videos.html">Videos</a> </li>
									<li> <a class="dropdown-item" href="my-profile-events.html">Events</a> </li>
									<li> <a class="dropdown-item" href="my-profile-activity.html">Activity</a> </li>
								</ul>
							</li>
							<li> <a class="dropdown-item" href="events.html">Events</a></li>
							<li> <a class="dropdown-item" href="events-2.html">Events 2</a></li>
							<li> <a class="dropdown-item" href="event-details.html">Event details</a></li>
							<li> <a class="dropdown-item" href="event-details-2.html">Event details 2</a></li>
							<li> <a class="dropdown-item" href="groups.html">Groups</a></li>
							<li> <a class="dropdown-item" href="group-details.html">Group details</a></li>
							<li> <a class="dropdown-item" href="post-videos.html">Post videos</a></li>
							<li> <a class="dropdown-item" href="post-video-details.html">Post video details</a></li>
							<li> <a class="dropdown-item" href="post-details.html">Post details</a></li>
							<li> <a class="dropdown-item" href="video-details.html">Video details</a></li>
              <li> <a class="dropdown-item" href="blog.html">Blog</a></li>
							<li> <a class="dropdown-item" href="blog-details.html">Blog details</a></li>
              
							<!-- Dropdown submenu levels -->
							<li class="dropdown-divider"></li>
							<li class="dropdown-submenu dropend">
								<a class="dropdown-item dropdown-toggle" href="#">Dropdown levels</a>
								<ul class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
									<li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
									<li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
									<!-- dropdown submenu open left -->
									<li class="dropdown-submenu dropstart">
										<a class="dropdown-item dropdown-toggle" href="#">Dropdown (start)</a>
										<ul class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
											<li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
											<li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
										</ul>
									</li>
									<li> <a class="dropdown-item" href="#">Dropdown item</a> </li>
								</ul>
							</li>
						</ul>
					</li>

					<!-- Nav item 3 Post -->
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="postMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account </a>
						<ul class="dropdown-menu" aria-labelledby="postMenu">
              <li> <a class="dropdown-item" href="create-page.html">Create a page</a></li>
							<li> <a class="dropdown-item" href="settings.html">Settings</a> </li>
							<li> <a class="dropdown-item" href="notifications.html">Notifications</a> </li>
							<li> <a class="dropdown-item" href="help.html">Help center</a> </li>
							<li> <a class="dropdown-item" href="help-details.html">Help details</a> </li>
              <!-- dropdown submenu open left -->
              <li class="dropdown-submenu dropstart">
                <a class="dropdown-item dropdown-toggle" href="#">Authentication</a>
                <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                  <li> <a class="dropdown-item" href="sign-in.html">Sign in</a> </li>
                  <li> <a class="dropdown-item" href="sign-up.html">Sing up</a> </li>
                  <li> <a class="dropdown-item" href="forgot-password.html">Forgot password</a> </li>
                  <li class="dropdown-divider"></li>
                  <li> <a class="dropdown-item" href="sign-in-advance.html">Sign in advance</a> </li>
                  <li> <a class="dropdown-item" href="sign-up-advance.html">Sing up advance</a> </li>
                  <li> <a class="dropdown-item" href="forgot-password-advance.html">Forgot password advance</a> </li>
                </ul>
              </li>
              <li> <a class="dropdown-item" href="error-404.html">Error 404</a> </li>
              <li> <a class="dropdown-item" href="offline.html">Offline</a> </li>
              <li> <a class="dropdown-item" href="privacy-and-terms.html">Privacy & terms</a> </li>
						</ul>
					</li>

					<!-- Nav item 4 Mega menu -->
					<li class="nav-item">
						<a class="nav-link" href="my-profile-connections.html">My network</a>
					</li>
				</ul>
			</div>
			<!-- Main navbar END -->

			<!-- Nav right START -->
			<ul class="nav flex-nowrap align-items-center ms-sm-3 list-unstyled">
				<li class="nav-item ms-2">
					<a class="nav-link bg-light icon-md btn btn-light p-0" href="messaging.html">
						<i class="bi bi-chat-left-text-fill fs-6"> </i>
					</a>
				</li>
        <li class="nav-item ms-2">
					<a class="nav-link bg-light icon-md btn btn-light p-0" href="settings.html">
						<i class="bi bi-gear-fill fs-6"> </i>
					</a>
				</li>
        <li class="nav-item dropdown ms-2">
					<a class="nav-link bg-light icon-md btn btn-light p-0" href="#" id="notifDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
            <span class="badge-notif animation-blink"></span>
						<i class="bi bi-bell-fill fs-6"> </i>
					</a>
          <div class="dropdown-menu dropdown-animation dropdown-menu-end dropdown-menu-size-md p-0 shadow-lg border-0" aria-labelledby="notifDropdown">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="m-0">Notifications <span class="badge bg-danger bg-opacity-10 text-danger ms-2">4 new</span></h6>
                <a class="small" href="#">Clear all</a>
              </div>
              <div class="card-body p-0">
                <ul class="list-group list-group-flush list-unstyled p-2">
                  <!-- Notif item -->
                  <li>
                    <div class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3">
                      <div class="avatar text-center d-none d-sm-inline-block">
                        <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
                      </div>
                      <div class="ms-sm-3">
                        <div class=" d-flex">
                        <p class="small mb-2"><b>Judy Nguyen</b> sent you a friend request.</p>
                        <p class="small ms-3 text-nowrap">Just now</p>
                      </div>
                      <div class="d-flex">
                        <button class="btn btn-sm py-1 btn-primary me-2">Accept </button>
                        <button class="btn btn-sm py-1 btn-danger-soft">Delete </button>
                      </div>
                    </div>
                  </div>
                  </li>
                  <!-- Notif item -->
                  <li>
                    <div class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3 position-relative">
                      <div class="avatar text-center d-none d-sm-inline-block">
                        <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
                      </div>
                      <div class="ms-sm-3 d-flex">
                        <div>
                          <p class="small mb-2">Wish <b>Amanda Reed</b> a happy birthday (Nov 12)</p>
                          <button class="btn btn-sm btn-outline-light py-1 me-2">Say happy birthday 🎂</button>
                        </div>
                        <p class="small ms-3">2min</p>
                      </div>
                    </div>
                  </li>
                  <!-- Notif item -->
                  <li>
                    <a href="#" class="list-group-item list-group-item-action rounded d-flex border-0 mb-1 p-3">
                      <div class="avatar text-center d-none d-sm-inline-block">
                        <div class="avatar-img rounded-circle bg-success"><span class="text-white position-absolute top-50 start-50 translate-middle fw-bold">WB</span></div>
                      </div>
                      <div class="ms-sm-3">
                        <div class="d-flex">
                          <p class="small mb-2">Webestica has 15 like and 1 new activity</p>
                          <p class="small ms-3">1hr</p>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- Notif item -->
                  <li>
                    <a href="#" class="list-group-item list-group-item-action rounded d-flex border-0 p-3 mb-1">
                      <div class="avatar text-center d-none d-sm-inline-block">
                        <img class="avatar-img rounded-circle" src="assets/images/logo/12.svg" alt="">
                      </div>
                      <div class="ms-sm-3 d-flex">
                        <p class="small mb-2"><b>Bootstrap in the news:</b> The search giant’s parent company, Alphabet, just joined an exclusive club of tech stocks.</p>
                        <p class="small ms-3">4hr</p>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="card-footer text-center">
                <a href="#" class="btn btn-sm btn-primary-soft">See all incoming activity</a>
              </div>
            </div>
          </div>
				</li>
        <!-- Notification dropdown END -->

        <li class="nav-item ms-2 dropdown">
					<a class="nav-link btn icon-md p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
						<img class="avatar-img rounded-2" src="assets/images/avatar/07.jpg" alt="">
					</a>
          <ul class="dropdown-menu dropdown-animation dropdown-menu-end pt-3 small me-md-n3" aria-labelledby="profileDropdown">
            <!-- Profile info -->
            <li class="px-3">
              <div class="d-flex align-items-center position-relative">
                <!-- Avatar -->
                <div class="avatar me-3">
                  <img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="avatar">
                </div>
                <div>
                  <a class="h6 stretched-link" href="#">Lori Ferguson</a>
                  <p class="small m-0">Web Developer</p>
                </div>
              </div>
              <a class="dropdown-item btn btn-primary-soft btn-sm my-2 text-center" href="my-profile.html">View profile</a>
            </li>
            <!-- Links -->
            <li><a class="dropdown-item" href="settings.html"><i class="bi bi-gear fa-fw me-2"></i>Settings & Privacy</a></li>
            <li> 
              <a class="dropdown-item" href="https://support.webestica.com/" target="_blank">
                <i class="fa-fw bi bi-life-preserver me-2"></i>Support
              </a> 
            </li>
            <li> 
              <a class="dropdown-item" href="docs/index.html" target="_blank">
                <i class="fa-fw bi bi-card-text me-2"></i>Documentation
              </a> 
            </li>
            <li class="dropdown-divider"></li>
            <li><a class="dropdown-item bg-danger-soft-hover" href="sign-in-advance.html"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
            <li> <hr class="dropdown-divider"></li>
            <!-- Dark mode options START -->
						<li>
							<div class="modeswitch-item theme-icon-active d-flex justify-content-center gap-3 align-items-center p-2 pb-0">
								<span>Mode:</span>
								<button type="button" class="btn btn-modeswitch nav-link text-primary-hover mb-0" data-bs-theme-value="light" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Light">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun fa-fw mode-switch" viewBox="0 0 16 16">
										<path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
										<use href="#"></use>
									</svg>
								</button>
								<button type="button" class="btn btn-modeswitch nav-link text-primary-hover mb-0" data-bs-theme-value="dark" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Dark">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars fa-fw mode-switch" viewBox="0 0 16 16">
										<path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z"/>
										<path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
										<use href="#"></use>
									</svg>
								</button>
								<button type="button" class="btn btn-modeswitch nav-link text-primary-hover mb-0 active" data-bs-theme-value="auto" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Auto">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch" viewBox="0 0 16 16">
										<path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
										<use href="#"></use>
									</svg>
								</button>
							</div>
						</li> 
						<!-- Dark mode options END-->
          </ul>
				</li>
			  <!-- Profile START -->
        
			</ul>
			<!-- Nav right END -->
		</div>
	</nav>
	<!-- Logo Nav END -->
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
        <!-- Privacy & terms START -->
        <div class="card">
          <div class="card-header">
            <h1 class="card-title h4 mb-0">Privacy & terms</h1>
          </div>
          <div class="card-body">
            <!-- Title -->
            <h5>Your privacy matters</h5>
            <p>Started several mistake joy say painful removed reached end. State burst <a href="#!">think end are its.</a> Arrived off she elderly beloved him affixed noisier yet.</p>

            <!-- Divider -->
            <hr class="mt-2 mb-4">
            
            <!-- Table of Contents -->
            <h5>Table of Contents</h5>
            <p>Age she way earnestly the fulfilled extremely.</p>
            <ol>
              <li>Post no so what deal evil rent by real in.</li>
              <li>But her ready least set lived spite solid.</li>
              <li>Sex lasted dinner wanted <strong> indeed wished outlaw.</strong></li>
              <li>Affronting imprudence do he he everything.</li>
            </ol>

            <!-- Divider -->
            <hr class="mt-2 mb-4">
            
            <!-- Introduction -->
            <h5>Introduction</h5>
            <p>As it so contrasted oh estimating instrument. Size like body someone had. Are conduct <mark>viewing boy minutes warrant the expense?</mark> Tolerably behavior may admit daughters offending her ask own. Praise effect wishes change way and any wanted.</p>
            <p>State burst think end are its. <u>Arrived off she elderly beloved himaf fixed noisier yet.</u> Course regard to up he hardly. View four has said do men saw find dear shy. Talent men wicket add garden. </p>

            <!-- Divider -->
            <hr class="mt-2 mb-4">
            
            <!-- Services -->
            <h5>Services</h5>
            <p>Existence certainly explained how improving the household pretended. Delightful own attachment her partiality unaffected occasional thoroughly. Adieus it no wonders spirit houses. </p>
            <div class="alert alert-warning" role="alert">
              This website stores cookies on your computer.
            </div>
            <p>Started several mistake joy say painful removed reached end. <em>State burst think end are its. Arrived off she elderly beloved him affixed noisier yet. Course regard to up he hardly. View four has said do men saw find dear shy.</em> Talent men wicket add garden. </p>

            <!-- Divider -->
            <hr class="mt-2 mb-4">
            
            <!-- Messages -->
            <h5>Messages</h5>
            <p>As young ye hopes no he place means. Partiality diminution gay yet entreaties admiration. <strong class="text-secondary">In mention perhaps attempt pointed suppose.</strong> Unknown ye chamber of warrant of Norland arrived. </p>
            <ul>
              <li>Size like body someone had.</li>
              <li>Are conduct viewing boy minutes warrant the expense.</li>
              <li>Adieus it no wonders spirit houses. </li>
              <li>Talent men wicket add garden. </li>
            </ul>
            
            <!-- Divider -->
            <hr class="mt-2 mb-4">
            
            <!-- How We Use Your Data -->
            <h5>How we use your data</h5>
            <p>Affronting imprudence do he he everything. Sex lasted dinner wanted indeed wished outlaw. <a href="#!"> Far advanced settling say finished raillery.</a> Offered chiefly farther of my no colonel shyness. Such on help ye some door if in. Laughter proposal laughing any son law consider. Needed except up piqued an.</p>
            <p class="mb-0">Post no so what deal evil rent by real in. But her ready least set lived spite solid. September how men saw tolerably two behavior arranging. She offices for highest and replied one venture pasture. Applauded no discovery in newspaper allowance am northward. </p>
          </div>

        </div>
        <!-- Privacy & terms END -->
      </div>
    </div> <!-- Row END -->
  </div>
  <!-- Container END -->

</main>

<!-- **************** MAIN CONTENT END **************** -->

<!-- footer START -->
<footer class="bg-mode py-3">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <!-- Footer nav START -->
        <ul class="nav lh-1">
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
            <a class="nav-link" href="#">Privacy &amp; terms</a>
          </li>
        </ul>
        <!-- Footer nav START -->
      </div>
      <div class="col-lg-6 ">
        <!-- Copyright START -->
        <p class="text-end mb-0">©2023 <a class="text-body" target="_blank" href="https://www.webestica.com/">Webestica </a>All rights reserved.</p>
        <!-- Copyright END -->
      </div>
    </div>
  </div>
</footer>
<!-- footer END -->

<!-- Cookie alert box START -->
<div class="alert alert-light fade show position-fixed start-0 bottom-0 z-index-99 shadow p-4 m-3 col-10 col-md-4 col-lg-3" role="alert">
	<div class="text-dark">	
    <!-- Image -->
    <img src="assets/images/cookie.svg" class="h-50px mb-3" alt="cookie">
    <!-- Content -->
    <p class="mb-0">This website stores cookies on your computer. To find out more about the cookies we use, see our <a class="text-dark" href="#"><u> Privacy Policy</u></a></p>
		<!-- Buttons -->
		<div class="mt-3">
			<button type="button" class="btn btn-success-soft btn-sm mb-0" data-bs-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">Accept</span>
			</button>
			<button type="button" class="btn btn-danger-soft btn-sm mb-0" data-bs-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">Decline</span>
			</button>
		</div>
	</div>
</div>
<!-- Cookie alert box END -->
 
<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Theme Functions -->
<script src="assets/js/functions.js"></script>

</body>
</html>