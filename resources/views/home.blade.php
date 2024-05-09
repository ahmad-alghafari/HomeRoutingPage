<!DOCTYPE html>
<html lang="en">
	<head>
	<title>TAGH - Home Page</title>

	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="TAGH.com">
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
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/OverlayScrollbars-master/css/OverlayScrollbars.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/tiny-slider/dist/tiny-slider.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/choices.js/public/assets/styles/choices.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/glightbox-master/dist/css/glightbox.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/dropzone/dist/dropzone.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/flatpickr/dist/flatpickr.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/plyr/plyr.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/zuck.js/dist/zuck.min.css')}}">

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/css/style.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script src="{{asset('import/assets/vendor/glightbox-master/dist/js/glightbox.min.js')}}" defer></script>
	<script src="{{asset('import/assets/vendor/glightbox-master/dist/js/glightbox.js')}}" defer></script>
	<livewire:styles />
</head>
<body>
{{--<div class="preloader">--}}
{{--    <div class="preloader-item">--}}
{{--        <div class="spinner-grow text-primary"></div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- =======================
Header START nav-->
<header class="navbar-light fixed-top header-static bg-mode">

	<!-- Logo Nav START -->
	@include('layouts.nav')
	<!-- Logo Nav END -->

</header>
<!-- =======================
Header END -->

<!-- **************** MAIN CONTENT START **************** -->
<main id="main">

	<!-- Container START -->
	<div class="container">
		<div class="row g-4">

			<!-- Sidenav START -->
            @include('users.leftSideNav')
			<!-- Sidenav END -->


			<!-- Main content START -->
            <!--warning --- don't delete or change the id of the under div : id="posts-container"-->
			<div class="col-md-8 col-lg-6 vstack gap-4" id="posts-container">
                <!--place of posting start-->
                @include('layouts.place-posting')
				<!-- posting place end -->

                @include('posts.load')
            </div>
			<!-- Main content END -->

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

<!-- **************** MAIN CONTENT END **************** -->

<!-- Main Chat START -->
<div class="d-none d-lg-block">
	<!-- Button -->
	<a class="icon-md btn btn-primary position-fixed end-0 bottom-0 me-5 mb-5" data-bs-toggle="offcanvas" href="#offcanvasChat" role="button" aria-controls="offcanvasChat">
		<i class="bi bi-chat-left-text-fill"></i>
	</a>
	<!-- Chat sidebar START -->
	<div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasChat">
		<!-- Offcanvas header -->
		<div class="offcanvas-header d-flex justify-content-between">
			<h5 class="offcanvas-title">Messaging</h5>
			<div class="d-flex">
				<!-- New chat box open button -->


				<!-- Close  -->
				<a href="#" class="btn btn-secondary-soft-hover py-1 px-2" data-bs-dismiss="offcanvas" aria-label="Close">
					<i class="fa-solid fa-xmark"></i>
				</a>

			</div>
		</div>
		<!-- Offcanvas body START -->
		<div class="offcanvas-body pt-0 custom-scrollbar">

			<ul class="list-unstyled">

                @foreach(Auth::user()->follow->take(20) as $follow)
                    <!-- Contact item -->
                    <li class="mt-3 hstack gap-3 align-items-center position-relative">
                        <!-- Avatar -->
                        <div class="avatar {{$follow->mind->status == 1 ? 'status-online':'status-offline'}}">
                            <img class="avatar-img rounded-circle" src="{{$follow->mind->photo != null ? asset($follow->mind->photo->path) : asset('import/assets/images/avatar/placeholder.jpg')}}" alt="">
                        </div>
                        <!-- Info -->
                        <div class="overflow-hidden">
                            <a class="h6 mb-0 stretched-link" href="{{route('home.chats.user' , $follow->mind->name)}}">{{$follow->mind->name}}</a>
                            <div class="small text-secondary text-truncate">{{$follow->mind->email}}</div>
                        </div>
                        <!-- Chat time -->
                        <div class="small ms-auto text-nowrap"> {{\Carbon\Carbon::parse($follow->mind->last_login_at)->diffForHumans()}} </div>
                    </li>
                @endforeach

			</ul>
		</div>
		<!-- Offcanvas body END -->
	</div>
	<!-- Chat sidebar END -->
</div>
 <!-- Main Chat END -->

<!-- Cookie alert box START -->
{{--{{$message}}--}}
@if(session()->has('message'))
<div class="alert alert-light fade show position-fixed start-0 bottom-0 z-index-99 shadow p-4 m-3 col-10 col-md-4 col-lg-3" role="alert" id="message-container">
    <div class="text-dark">
        <p class="mb-0">Your Post Was Published Successfully!</p>
        <!-- Buttons -->
        <div class="mt-3">
            <button type="button" class="btn btn-success-soft btn-sm mb-0" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">Done</span>
            </button>
        </div>
    </div>
</div>
<script>
    // Get the message container
    var messageContainer = document.getElementById('message-container');
    setTimeout(function() {
        messageContainer.style.display = 'none';
    }, 5000);

</script>
@endif

</main>


{{--<div class="alert alert-light fade show position-fixed start-0 bottom-0 z-index-99 shadow p-4 m-3 col-10 col-md-4 col-lg-3" role="alert" id="message-container">--}}
{{--    <div class="text-dark">--}}
{{--        <div class="avatar avatar-lg">--}}
{{--            <img src="{{asset('import/assets/images/avatar/placeholder.jpg')}}" class="avatar-img rounded-circle" alt="avatar">--}}
{{--        </div>--}}
{{--        <a class="nav-link" style="display: inline-block ; margin-left: 10px ; padding-bottom: 10px" href="{{route('home.users.usershow' , Auth::user()->id)}}">ahmadalgahfari</a>--}}
{{--        <hr>--}}
{{--        <p class="mb-0" style="display: inline-block; margin-left: 10px">Your lished Successfully!</p>--}}
{{--        <!-- Buttons -->--}}
{{--        <div class="mt-3">--}}
{{--            <button type="button" class="btn btn-success-soft btn-sm mb-0" data-bs-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">Done</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<script>--}}
{{--    // Get the message container--}}
{{--    var messageContainer = document.getElementById('message-container');--}}
{{--    setTimeout(function() {--}}
{{--        messageContainer.style.display = 'none';--}}
{{--    }, 100000);--}}

{{--</script>--}}

<!-- Cookie alert box END -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    $(document).ready(function () {
        let nextPageUrl = '{{ $posts->nextPageUrl() }}';
        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
                if (nextPageUrl) {
                    loadMorePosts();
                }
            }
        });
        function loadMorePosts() {
            $.ajax({
                url: nextPageUrl,
                type: 'get',
                beforeSend: function () {
                    nextPageUrl = '';
                },
                success: function (data) {
                    nextPageUrl = data.nextPageUrl;
                    $("#posts-container").append(data.view);
                },
                error: function (xhr, status, error) {
                    console.error("Error loading more posts:", error);
                }
            });
        }
    });

    function timeAgo(timestamp) {
        const currentDate = new Date();
        const date = new Date(timestamp);

        const seconds = Math.floor((currentDate - date) / 1000);
        const minutes = Math.floor(seconds / 60);
        const hours = Math.floor(minutes / 60);
        const days = Math.floor(hours / 24);

        if (days > 0) {
            return `${days} day${days > 1 ? 's' : ''} ago`;
        } else if (hours > 0) {
            return `${hours} hour${hours > 1 ? 's' : ''} ago`;
        } else if (minutes > 0) {
            return `${minutes} minute${minutes > 1 ? 's' : ''} ago`;
        } else {
            return `${seconds} second${seconds > 1 ? 's' : ''} ago`;
        }
    }

    Pusher.logToConsole = true;
    var pusher = new Pusher('2d71b511dc2458847016', {
        cluster: 'ap2'
    });

    var postsChannel = pusher.subscribe('postNotify{{Auth::user()->id}}');
    postsChannel.bind('Notifications', function(data) {

        const notificationsDiv = document.getElementById("notificaionsAreia");
        const count = notificationsDiv.childElementCount;

        if(count < 5 ){
            var user_photo = data.user_photo ;
            var path = user_photo === 'null-null' ? 'http://127.0.0.1:8000/import/assets/images/avatar/placeholder.jpg' : 'http://127.0.0.1:8000/'+user_photo ;
            let notify =
                '<div class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3">'
                + '<div class="avatar text-center d-none d-sm-inline-block">'
                + '<a href="http://127.0.0.1:8000/home/posts/showpost/'
                + data.id
                + '" style="color: #fff">'
                + '<img class="avatar-img rounded-circle" src="'
                + path
                + '">'
                +'</a></div><div class="ms-sm-3"><div class=" d-flex">'
                +'<a href="http://127.0.0.1:8000/home/posts/showpost/'
                + data.id
                +'" style="color: #fff">'
                +'<p class="small mb-2"><b>'
                +data.user
                +'</b>'
                +' has published a post.'
                +'</p></a><p class="small ms-3 text-nowrap">'
                +timeAgo(data.time)
                +'</p></div></div></div>'
            ;
            $("#notificaionsAreia").append(notify);
        }

        var notifyNumber = $("#notificationsNumbers").text().trim();
        var integerNotifyNumber = parseInt(notifyNumber);
        integerNotifyNumber++;
        console.log(integerNotifyNumber);
        $("#notificationsNumbers").text(integerNotifyNumber);
    });

    var likesChannel = pusher.subscribe('likeNotify{{Auth::user()->id}}');
    likesChannel.bind('Notifications', function(data) {

        const notificationsDiv = document.getElementById("notificaionsAreia");
        const count = notificationsDiv.childElementCount;

        console.log("count" + count);
        if(count < 5 ){
            var user_photo = data.user_photo ;
            var path = user_photo === 'null-null' ? 'http://127.0.0.1:8000/import/assets/images/avatar/placeholder.jpg' : 'http://127.0.0.1:8000/'+user_photo ;
            let notify =
                '<div class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3">'
                + '<div class="avatar text-center d-none d-sm-inline-block">'
                + '<a href="http://127.0.0.1:8000/home/posts/showpost/'
                + data.id
                + '" style="color: #fff">'
                + '<img class="avatar-img rounded-circle" src="'
                + path
                + '">'
                +'</a></div><div class="ms-sm-3"><div class=" d-flex">'
                +'<a href="http://127.0.0.1:8000/home/posts/showpost/'
                + data.id
                +'" style="color: #fff">'
                +'<p class="small mb-2"><b>'
                +data.user
                +'</b>'
                +' Liked Your Post. '
                +'</p></a><p class="small ms-3 text-nowrap">'
                +timeAgo(data.time)
                +'</p></div></div></div>'
            ;
            $("#notificaionsAreia").append(notify);
        }

        var notifyNumber = $("#notificationsNumbers").text().trim();
        var integerNotifyNumber = parseInt(notifyNumber);
        integerNotifyNumber++;
        $("#notificationsNumbers").text(integerNotifyNumber);

        $("#notifyCircle").append('<span class="badge-notif animation-blink"></span>');
    });

    var messageChannel = pusher.subscribe('chat{{Auth::user()->id}}');
    messageChannel.bind('chatMessage', function(data) {
        var message = data.message.substring(0, 25) + "...";
        var user_photo = data.user_photo ;
        var photoPath = user_photo === 'null-null' ? 'http://127.0.0.1:8000/import/assets/images/avatar/placeholder.jpg' : 'http://127.0.0.1:8000/'+user_photo ;
        var chatPath = 'http://127.0.0.1:8000/home/chats/' + data.senderName ;
        var userPath = 'http://127.0.0.1:8000/home/users/show/'+data.senderId ;
        var element =
            '<div class="alert alert-light fade show position-fixed start-0 bottom-0 z-index-99 shadow p-4 m-3 col-10 col-md-4 col-lg-3" role="alert" id="message-coming"> '
            + '<div class="text-dark">'
            +'<div class="avatar avatar-lg"><img src=" ' + photoPath +'" class="avatar-img rounded-circle" alt="avatar"></div>'
            +'<a class="nav-link" style="display: inline-block ; margin-left: 10px ; padding-bottom: 10px" href="'
            + userPath
            +'">'
            + data.senderName
            +'</a><hr><p class="mb-0" style="display: inline-block; margin-left: 10px" >'
            + message
            +'</p><div class="mt-3">'
            +'<a href="" type="button" class="btn btn-danger-soft btn-sm mb-0" data-bs-dismiss="alert" aria-label="Close">'
            +'<span aria-hidden="true">Close</span></a>'
            +'<a href="'+ chatPath +'"  class="btn btn-success-soft btn-sm mb-0" >'
            +'<span aria-hidden="true">See</span></a></div></div></div>'
            +'<script>var messageContainer = document.getElementById("message-coming");'
            +'setTimeout(function() {messageContainer.style.display = "none";}, 10000); ' + "<\/script>" ;
        $("#main").append(element);
    });
</script>
<script src="{{asset('import/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}" defer></script>
<script src="{{asset('import/assets/vendor/tiny-slider/dist/tiny-slider.js')}}" defer></script>
<script src="{{asset('import/assets/vendor/OverlayScrollbars-master/js/OverlayScrollbars.min.js')}}" defer></script>
<script src="{{asset('import/assets/vendor/choices.js/public/assets/scripts/choices.min.js')}}" defer></script>

<script src="{{asset('import/assets/vendor/flatpickr/dist/flatpickr.min.js')}}" defer></script>
<script src="{{asset('import/assets/vendor/plyr/plyr.js')}}" defer></script>
<script src="{{asset('import/assets/vendor/dropzone/dist/min/dropzone.min.js')}}" defer></script>
<script src="{{asset('import/assets/vendor/zuck.js/dist/zuck.min.js')}}" defer></script>
<script src="{{asset('import/assets/js/zuck-stories.js')}}" defer></script>

<!-- Theme Functions -->
<script src="{{asset('import/assets/js/functions.js')}}" defer></script>
<livewire:scripts />
</body>
</html>
