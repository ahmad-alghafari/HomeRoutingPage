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
	<link rel="stylesheet" type="text/css" href="{{asset("import/assets/vendor/glightbox-master/dist/css/glightbox.min.css")}}">
	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset("import/assets/css/style.css")}}">

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
                <li><a class="dropdown-item" href=""> <i class="bi bi-check-lg fa-fw pe-2"></i>Clear All</a></li>
              </ul>
            </div>
            <!-- Notification action END -->
          </div>
          <div class="card-body p-2">
            <ul class="list-unstyled">
              <!-- Notif item start-->
              <li>
                  <div class="unreadNotifications" id="notificaionsAreia">
                      @foreach(auth()->user()->unreadNotifications as $notification)

                          @php
                              $curr_user =\App\Models\User::find($notification->data['user_id']);
                          @endphp

                          @if($notification->type == 'App\Notifications\PostNotify')
                      <div class="rounded badge-unread d-sm-flex border-0 mb-1 p-3 position-relative">
                          <!-- Avatar -->
                          <div class="avatar text-center">
                              <a href="{{ route('home.posts.showpost' , $notification->data['id'] )}}" >
                                  <img class="avatar-img rounded-circle" src="{{$curr_user->photo ? asset($curr_user->photo->path) : asset('import/assets/images/avatar/placeholder.jpg')}}" alt="">
                              </a>
                          </div>
                          <!-- Info -->
                          <div class="mx-sm-3 my-2 my-sm-0">
                              <a  href="{{ route('home.posts.showpost' , $notification->data['id']) }}" >
                                  <p class="small mb-2"><b>{{ $notification->data['user'] }}<br></b> {{ $notification->data['title'] }}</p>
                              </a>
                          </div>
                          <!-- Action -->
                          <div class="d-flex ms-auto">
                              <p class="small me-5 text-nowrap">{{ $notification->created_at->diffForHumans() }}</p>
                              <!-- Notification action START -->
                              <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">

                                  <!-- Card share action dropdown menu -->

                              </div>
                              <!-- Notification action END -->
                          </div>
                      </div>
                          @elseif($notification->type == 'App\Notifications\CommentNotify')
                              <div class="rounded badge-unread d-sm-flex border-0 mb-1 p-3 position-relative">
                                  <!-- Avatar -->
                                  <div class="avatar text-center">
                                      <a href="{{ route('home.posts.showpost' , $notification->data['post_id'] )}}" >
                                          <img class="avatar-img rounded-circle" src="{{$curr_user->photo ? asset($curr_user->photo->path) : asset('import/assets/images/avatar/placeholder.jpg')}}" alt="">
                                      </a>
                                  </div>
                                  <!-- Info -->
                                  <div class="mx-sm-3 my-2 my-sm-0">
                                      <a  href="{{ route('home.posts.showpost' , $notification->data['post_id']) }}" >
                                          <p class="small mb-2"><b>{{ $notification->data['user'] }}<br></b> {{ $notification->data['title'] }}</p>
                                      </a>
                                  </div>
                                  <!-- Action -->
                                  <div class="d-flex ms-auto">
                                      <p class="small me-5 text-nowrap">{{ $notification->created_at->diffForHumans() }}</p>
                                      <!-- Notification action START -->
                                      <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">

                                          <!-- Card share action dropdown menu -->

                                      </div>
                                      <!-- Notification action END -->
                                  </div>
                              </div>
                          @elseif($notification->type == 'App\Notifications\LikeNotify')
                              <div class="rounded badge-unread d-sm-flex border-0 mb-1 p-3 position-relative">
                                  <!-- Avatar -->
                                  <div class="avatar text-center">
                                      <a href="{{ route('home.posts.showpost' , $notification->data['post_id'] )}}" >
                                          <img class="avatar-img rounded-circle" src="{{$curr_user->photo ? asset($curr_user->photo->path) : asset('import/assets/images/avatar/placeholder.jpg')}}" alt="">
                                      </a>
                                  </div>
                                  <!-- Info -->
                                  <div class="mx-sm-3 my-2 my-sm-0">
                                      <a  href="{{ route('home.posts.showpost' , $notification->data['post_id']) }}" >
                                          <p class="small mb-2"><b>{{ $notification->data['user'] }}<br></b> {{ $notification->data['title'] }}</p>
                                      </a>
                                  </div>
                                  <!-- Action -->
                                  <div class="d-flex ms-auto">
                                      <p class="small me-5 text-nowrap">{{ $notification->created_at->diffForHumans() }}</p>
                                      <!-- Notification action START -->
                                      <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">

                                          <!-- Card share action dropdown menu -->

                                      </div>
                                      <!-- Notification action END -->
                                  </div>
                              </div>
                          @elseif($notification->type == 'App\Notifications\FollowNotify')
                              <div class="rounded badge-unread d-sm-flex border-0 mb-1 p-3 position-relative">
                                  <!-- Avatar -->
                                  <div class="avatar text-center">
                                      <a href="{{ route('home.users.usershow'  , $notification->data['user_id'] )}}" >
                                          <img class="avatar-img rounded-circle" src="{{$curr_user->photo ? asset($curr_user->photo->path) : asset('import/assets/images/avatar/placeholder.jpg')}}" alt="">
                                      </a>
                                  </div>
                                  <!-- Info -->
                                  <div class="mx-sm-3 my-2 my-sm-0">
                                      <a  href="{{ route('home.users.usershow'  , $notification->data['user_id']) }}" >
                                          <p class="small mb-2"><b>{{ $notification->data['follower_name'] }}<br></b> {{ $notification->data['title'] }}</p>
                                      </a>
                                  </div>
                                  <!-- Action -->
                                  <div class="d-flex ms-auto">
                                      <p class="small me-5 text-nowrap">{{ $notification->created_at->diffForHumans() }}</p>
                                      <!-- Notification action START -->
                                      <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">

                                          <!-- Card share action dropdown menu -->

                                      </div>
                                      <!-- Notification action END -->
                                  </div>
                              </div>
                          @elseif($notification->type == 'App\Notifications\CommentLikeNotify')
                              <div class="rounded badge-unread d-sm-flex border-0 mb-1 p-3 position-relative">
                                  <!-- Avatar -->
                                  <div class="avatar text-center">
                                      <a href="" >
                                          <img class="avatar-img rounded-circle" src="{{$curr_user->photo ? asset($curr_user->photo->path) : asset('import/assets/images/avatar/placeholder.jpg')}}" alt="">
                                      </a>
                                  </div>
                                  <!-- Info -->
                                  <div class="mx-sm-3 my-2 my-sm-0">
                                      <a  href="{{ route('home.posts.showpost' , $notification->data['post']) }}" >
                                          <p class="small mb-2"><b>{{ $notification->data['user'] }}<br></b> {{ $notification->data['title'] }}</p>
                                      </a>
                                  </div>
                                  <!-- Action -->
                                  <div class="d-flex ms-auto">
                                      <p class="small me-5 text-nowrap">{{ $notification->created_at->diffForHumans() }}</p>
                                      <!-- Notification action START -->
                                      <div class="dropdown position-absolute end-0 top-0 mt-3 me-3">

                                          <!-- Card share action dropdown menu -->

                                      </div>
                                      <!-- Notification action END -->
                                  </div>
                              </div>
                          @endif
                      @endforeach
                  </div>
              </li>
              <!-- Notif item end-->
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var clearButton = document.getElementById("clearingNotificaions");
                        var notificationsDiv = document.getElementById("notificaionsAreia");

                        clearButton.addEventListener("click", function() {
                            notificationsDiv.innerHTML = ""; // Clearing the content of the div
                        });
                    });
                </script>

            </ul>
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
<script src="{{asset("import/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>

<!-- Theme Functions -->
<script src="{{asset("import/assets/js/functions.js")}}"></script>

</body>
</html>
