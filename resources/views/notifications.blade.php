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
	<link rel="stylesheet" type="text/css" href="assets/vendor/glightbox-master/dist/css/glightbox.min.css">
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
        <!-- Card START -->
        <div class="card">
          <div class="card-header py-3 border-0 d-flex align-items-center justify-content-between">
            <h1 class="h5 mb-0">Notifications</h1>
            <!-- Notification action START -->
            <div class="dropdown">
              <a href="#" class="text-secondary btn btn-secondary-soft-hover py-1 px-2" id="cardNotiAction" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-three-dots"></i>
              </a>
              <!-- Card share action dropdown menu -->
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction">
                <li><a class="dropdown-item" href="#"> <i class="bi bi-check-lg fa-fw pe-2"></i>Mark all read</a></li>
                <li><a class="dropdown-item" href="#"> <i class="bi bi-bell-slash fa-fw pe-2"></i>Push notifications </a></li>
                <li><a class="dropdown-item" href="#"> <i class="bi bi-bell fa-fw pe-2"></i>Email notifications </a></li>
              </ul>
            </div>
            <!-- Notification action END -->
          </div>
          <div class="card-body p-2">
            <ul class="list-unstyled">
              <!-- Notif item -->
              <li>
                <div class="rounded badge-unread d-sm-flex border-0 mb-1 p-3 position-relative">
                  <!-- Avatar -->
                  <div class="avatar text-center">
                    <img class="avatar-img rounded-circle" src="assets/images/avatar/01.jpg" alt="">
                  </div>
                  <!-- Info -->
                  <div class="mx-sm-3 my-2 my-sm-0">
                    <p class="small mb-2"><b>Judy Nguyen</b> sent you a friend request.</p>
                  <!-- Button -->
                  <div class="d-flex">
                    <button class="btn btn-sm py-1 btn-primary me-2">Accept </button>
                    <button class="btn btn-sm py-1 btn-danger-soft">Delete </button>
                  </div>
                </div>
                <!-- Action -->
                <div class="d-flex ms-auto">
                  <p class="small me-5 text-nowrap">Just now</p>
                  <!-- Notification action START -->
                  <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">
                    <a href="#" class="z-index-1 text-secondary btn position-relative py-0 px-2" id="cardNotiAction1" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi bi-three-dots"></i>
                    </a>
                    <!-- Card share action dropdown menu -->
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction1">
                      <li><a class="dropdown-item" href="#"> <i class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                      <li><a class="dropdown-item" href="#"> <i class="bi bi-bell-slash fa-fw pe-2"></i>Turn off </a></li>
                      <li><a class="dropdown-item" href="#"> <i class="bi bi-volume-mute fa-fw fs-5 pe-2"></i>Mute Judy Nguyen </a></li>
                    </ul>
                  </div>
                  <!-- Notification action END -->
                  </div>
                </div>
              </li>
              <!-- Notif item -->
              <li>
                <div class="rounded badge-unread d-sm-flex border-0 mb-1 p-3 position-relative">
                   <!-- Avatar -->
                  <div class="avatar text-center">
                    <img class="avatar-img rounded-circle" src="assets/images/avatar/02.jpg" alt="">
                  </div>
                  <!-- Info -->
                  <div class="mx-sm-3 my-2 my-sm-0">
                    <p class="small mb-2">Wish <b>Amanda Reed</b> a happy birthday (Nov 12)</p>
                    <button class="btn btn-sm btn-outline-light py-1 me-2">Say happy birthday 🎂</button>
                  </div>
                  <!-- Action -->
                  <div class="d-flex ms-auto">
                    <p class="small me-5 text-nowrap">Just now</p>
                    <!-- Notification action START -->
                    <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">
                      <a href="#" class="z-index-1 text-secondary btn position-relative py-0 px-2" id="cardNotiAction2" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                      </a>
                      <!-- Card share action dropdown menu -->
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction2">
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bell-slash fa-fw pe-2"></i>Turn off </a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-volume-mute fa-fw fs-5 pe-2"></i>Mute Judy Nguyen </a></li>
                      </ul>
                    </div>
                    <!-- Notification action END -->
                  </div>
                </div>
              </li>
              <!-- Notif item -->
              <li>
                <div class="rounded badge-unread d-sm-flex border-0 mb-1 p-3 position-relative">
                   <!-- Avatar -->
                  <div class="avatar text-center">
                    <div class="avatar-img rounded-circle bg-success"><span class="text-white position-absolute top-50 start-50 translate-middle fw-bold">WB</span></div>
                  </div>
                  <!-- Info -->
                  <div class="mx-sm-3 my-2 my-sm-0">
                    <a class="small text-body stretched-link" href="#!"> Webestica has 15 like and 1 new activity</a>
                  </div>
                  <!-- Action -->
                  <div class="d-flex ms-auto">
                    <p class="small me-5 text-nowrap">2 min</p>
                    <!-- Notification action START -->
                    <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">
                      <a href="#" class="z-index-1 text-secondary btn position-relative py-0 px-2" id="cardNotiAction3" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                      </a>
                      <!-- Card share action dropdown menu -->
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction3">
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bell-slash fa-fw pe-2"></i>Turn off </a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-volume-mute fa-fw fs-5 pe-2"></i>Mute Judy Nguyen </a></li>
                      </ul>
                    </div>
                    <!-- Notification action END -->
                  </div>
                </div>
              </li>
              <!-- Notif item -->
              <!-- Notif item -->
              <li>
                <div class="rounded badge-unread d-sm-flex border-0 mb-1 p-3 position-relative">
                   <!-- Avatar -->
                  <div class="avatar text-center">
                    <div class="avatar-img rounded-circle bg-success"><span class="text-white position-absolute top-50 start-50 translate-middle fw-bold">WB</span></div>
                  </div>
                  <!-- Info -->
                  <div class="mx-sm-3 my-2 my-sm-0">
                    <a class="stretched-link small text-body" href="#!"><b>Bootstrap in the news:</b> The search giant’s parent company, Alphabet, just joined an exclusive club of tech stocks.</a>
                  </div>
                  <!-- Action -->
                  <div class="d-flex ms-auto">
                    <p class="small me-5 text-nowrap">8min</p>
                    <!-- Notification action START -->
                    <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">
                      <a href="#" class="z-index-1 text-secondary btn position-relative py-0 px-2" id="cardNotiAction5" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                      </a>
                      <!-- Card share action dropdown menu -->
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction5">
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bell-slash fa-fw pe-2"></i>Turn off </a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-volume-mute fa-fw fs-5 pe-2"></i>Mute Judy Nguyen </a></li>
                      </ul>
                    </div>
                    <!-- Notification action END -->
                  </div>
                </div>
              </li>
              <!-- Notif item -->
              <li>
                <div class="rounded badge-unread d-sm-flex border-0 mb-1 p-3 position-relative">
                   <!-- Avatar -->
                  <div class="avatar text-center">
                    <img class="avatar-img rounded-circle" src="assets/images/avatar/03.jpg" alt="">
                  </div>
                  <!-- Info -->
                  <div class="mx-sm-3 my-2 my-sm-0">
                    <p class="small mb-0"><b>You have a Connection!</b> </p>
                    <p class="small"> <a href="@!"> @Samuel Bishop</a> joined project Blogzine blog theme</p>
                  </div>
                  <!-- Action -->
                  <div class="d-flex ms-auto">
                    <p class="small me-5 text-nowrap">20min</p>
                    <!-- Notification action START -->
                    <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">
                      <a href="#" class="z-index-1 text-secondary btn position-relative py-0 px-2" id="cardNotiAction6" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                      </a>
                      <!-- Card share action dropdown menu -->
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction6">
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bell-slash fa-fw pe-2"></i>Turn off </a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-volume-mute fa-fw fs-5 pe-2"></i>Mute Judy Nguyen </a></li>
                      </ul>
                    </div>
                    <!-- Notification action END -->
                    </div>
                </div>
              </li>
              <!-- Notif item -->
              <li>
                <div class="rounded d-sm-flex border-0 mb-1 p-3 position-relative">
                   <!-- Avatar -->
                  <div class="avatar text-center">
                    <img class="avatar-img rounded-circle" src="assets/images/avatar/04.jpg" alt="">
                  </div>
                  <!-- Info -->
                  <div class="mx-sm-3 my-2 my-sm-0">
                      <a href="#!" class="stretched-link small mb-0 text-secondary"><b>You have a Payout!</b> </a>
                      <p class="small mb-0">Webestica LLC has sent you $1205 USD</p>
                  </div>
                  <!-- Action -->
                  <div class="d-flex ms-auto">
                    <p class="small me-5 text-nowrap">3hrs</p>
                    <!-- Notification action START -->
                    <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">
                      <a href="#" class="z-index-1 text-secondary btn position-relative py-0 px-2" id="cardNotiAction7" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                      </a>
                      <!-- Card share action dropdown menu -->
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction7">
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bell-slash fa-fw pe-2"></i>Turn off </a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-volume-mute fa-fw fs-5 pe-2"></i>Mute Judy Nguyen </a></li>
                      </ul>
                    </div>
                    <!-- Notification action END -->
                    </div>
                </div>
              </li>
              <!-- Notif item -->
              <li>
                <div class="rounded d-sm-flex border-0 mb-1 p-3 position-relative">
                   <!-- Avatar -->
                  <div class="avatar text-center">
                    <img class="avatar-img rounded-circle" src="assets/images/logo/08.svg" alt="">
                  </div>
                  <!-- Info -->
                  <div class="mx-sm-3 my-2 my-sm-0">
                    <p class="small mb-0"><b>Order cancelled: #23685</b> </p>
                    <p class="small mb-0">Order #23685 belonging to Amanda Reed has been cancelled</p>
                    <a class="btn btn-link btn-sm" href="#!"> <u> Review order </u></a>
                  </div>
                  <!-- Action -->
                  <div class="d-flex ms-auto">
                    <p class="small me-5 text-nowrap">5hrs</p>
                    <!-- Notification action START -->
                    <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">
                      <a href="#" class="z-index-1 text-secondary btn position-relative py-0 px-2" id="cardNotiAction8" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                      </a>
                      <!-- Card share action dropdown menu -->
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction8">
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bell-slash fa-fw pe-2"></i>Turn off </a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-volume-mute fa-fw fs-5 pe-2"></i>Mute Judy Nguyen </a></li>
                      </ul>
                    </div>
                    <!-- Notification action END -->
                  </div>
                </div>
              </li>
              <!-- Notif item -->
              <li>
                <div class="rounded d-sm-flex border-0 mb-1 p-3 position-relative">
                   <!-- Avatar -->
                  <div class="avatar text-center">
                    <img class="avatar-img rounded-circle" src="assets/images/avatar/07.jpg" alt="">
                  </div>
                  <!-- Info -->
                  <div class="mx-sm-3 my-2 my-sm-0">
                    <p class="small m-0">Congratulate <b>Joan Wallace</b> for graduating from <b>Microverse university</b></p>
                    <p class="small mb-0">Order #23685 belonging to Amanda Reed has been cancelled</p>
                    <a class="btn btn-link btn-sm" href="#!"> <u> Say congrats </u></a>
                  </div>
                  <!-- Action -->
                  <div class="d-flex ms-auto">
                    <p class="small me-5 text-nowrap">5hrs</p>
                    <!-- Notification action START -->
                    <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">
                      <a href="#" class="z-index-1 text-secondary btn position-relative py-0 px-2" id="cardNotiAction9" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                      </a>
                      <!-- Card share action dropdown menu -->
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="cardNotiAction9">
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-trash fa-fw pe-2"></i>Delete</a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-bell-slash fa-fw pe-2"></i>Turn off </a></li>
                        <li><a class="dropdown-item" href="#"> <i class="bi bi-volume-mute fa-fw fs-5 pe-2"></i>Mute Judy Nguyen </a></li>
                      </ul>
                    </div>
                    <!-- Notification action END -->
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="card-footer border-0 py-3 text-center position-relative d-grid pt-0">
            <!-- Load more button START -->
            <a href="#!" role="button" class="btn btn-loader btn-primary-soft" data-bs-toggle="button" aria-pressed="true">
              <span class="load-text"> Load more notifications </span>
              <div class="load-icon">
                <div class="spinner-grow spinner-grow-sm" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div>
              </div>
            </a>
            <!-- Load more button END -->
          </div>
        </div>
        <!-- Card END -->
      </div>
    </div> <!-- Row END -->
  </div>
  <!-- Container END -->

</main>

<!-- **************** MAIN CONTENT END **************** -->
 
<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- Theme Functions -->
<script src="assets/js/functions.js"></script>

</body>
</html>