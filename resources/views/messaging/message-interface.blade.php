
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
  <link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/OverlayScrollbars-master/css/OverlayScrollbars.min.css')}}" />

	<!-- Theme CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('import/assets/css/style.css')}}">

  <style>
        /* Hide the default scrollbar */
    ::-webkit-scrollbar {
      display: none;
    }

    /* Style the container with overflow */
    #chatControl {
      overflow-y: auto;
      scrollbar-width: thin; /* For Firefox */
    }

    /* Style the scrollbar track */
    #chatControl::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Style the scrollbar thumb */
    #chatControl::-webkit-scrollbar-thumb {
      background: #888;
      border-radius: 5px;
    }

    /* Style the scrollbar thumb on hover */
    #chatControl::-webkit-scrollbar-thumb:hover {
      background: #555;
    }
  </style>

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
        <!-- Row start -->
        <div class="row gx-0">
            <!-- Sidebar START -->
            <div class="col-lg-4 col-xxl-3" id="chatTabs" role="tablist">
                <!-- Divider -->
                <div class="d-flex align-items-center mb-4 d-lg-none">
                    <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
                        <span class="h6 mb-0 fw-bold d-lg-none ms-2">Chats</span>
                    </button>
                </div>
                <!-- Advanced filter responsive toggler END -->
                <div class="card card-body border-end-0 border-bottom-0 rounded-bottom-0">
                    <div class=" d-flex justify-content-between align-items-center">
                        <h1 class="h5 mb-0">Active chats
{{--                            <span class="badge bg-success bg-opacity-10 text-success">6</span>--}}
                        </h1>
                        <!-- Chat new create message item START -->
{{--                        <div class="dropend position-relative">--}}
{{--                            <div class="nav">--}}
{{--                                <a class="icon-md rounded-circle btn btn-sm btn-primary-soft nav-link toast-btn" data-target="chatToast" href="#" > <i class="bi bi-pencil-square"></i> </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <!-- Chat new create message item END -->
                    </div>
                </div>
                <nav class="navbar navbar-light navbar-expand-lg mx-0">
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
                        <!-- Offcanvas header -->
                        <div class="offcanvas-header">
                            <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas"></button>
                        </div>
                        <!-- Offcanvas body -->
                        <div class="offcanvas-body p-0">
                            @livewire('messageing' , [Auth::user()])
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Sidebar START -->

            <!-- Chat conversation START -->
            <div class="col-lg-8 col-xxl-9">
                    <div class="card card-chat rounded-start-lg-0 border-start-lg-0">
                        <div class="card-body h-100">
                            <div class="tab-content py-0 mb-0 h-100" id="chatTabsContent">
                                <!-- Conversation item START -->
                                <div class="fade tab-pane show active h-100" id="chat-1" role="tabpanel" aria-labelledby="chat-1-tab">
                                    <!-- Top avatar and status START -->
                                    <div class="d-sm-flex justify-content-between align-items-center">
                                        <div class="d-flex mb-2 mb-sm-0">
                                            <div class="flex-shrink-0 avatar me-2">
                                                <img class="avatar-img rounded-circle" src="{{$user->photo != null ? asset($user->photo->path) : asset('import/assets/images/avatar/placeholder.jpg') }}" />
                                            </div>
                                            <div class="d-block flex-grow-1">
                                                <h6 class="mb-0 mt-1">{{$user->name}}</h6>
                                                <div
                                                    class="small text-secondary">
                                                    @if($user->status == 1)
                                                        <i class="fa-solid fa-circle text-success me-1"></i>Online
                                                    @else
                                                        <i class="fa-solid fa-circle text-secondary me-1"></i>Ofline
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <!-- Call button -->
                                            <!-- Card action START -->
                                            <div class="dropdown">
                                                <a class="icon-md rounded-circle btn btn-primary-soft me-2 px-2" href="#" id="chatcoversationDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></a>
                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatcoversationDropdown">
{{--                                                    <li><a class="dropdown-item" href="#"><i class="bi bi-mic-mute me-2 fw-icon"></i>Mute conversation</a></li>--}}
                                                    <li><a class="dropdown-item" href="{{route('home.users.show' , $user)}}"><i class="bi bi-person-check me-2 fw-icon"></i>View profile</a></li>
                                                    <li><button id="delete" class="dropdown-item"  type="button"><i class="bi bi-trash me-2 fw-icon"></i>Delete chat</button></li>
                                                </ul>
                                            </div>
                                            <!-- Card action END -->
                                        </div>
                                    </div>
                                    <!-- Top avatar and status END -->
                                    <hr>
                                    <!-- Chat conversation START -->
                                    <div class="chat-conversation-content " id="chatControl">
                                        @forelse($messages as $m)
                                            @if($m->from_id == Auth::user()->id)
                                                <div class="d-flex justify-content-end text-end mb-1">
                                                    <div class="w-100">
                                                        <div class="d-flex flex-column align-items-end">
                                                            <div class="bg-primary text-white p-2 px-3 rounded-2">
                                                                {{$m->body}}
                                                                <div class="d-flex my-2">
                                                                    {{-- <div class="small text-secondary">{{$m->created_at}}</div> --}}
                                                                    <div class="small text-secondary">{{ \Carbon\Carbon::parse($m->created_at)->format('h:i A') }}</div>
                                                                    <div class="small ms-2"><i class="fa-solid fa-check"></i></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="d-flex mb-1">
                                                    <div class="flex-shrink-0 avatar avatar-xs me-2">
                                                        <img class="avatar-img rounded-circle" src="{{$user->photo != null ? asset($user->photo->path) : asset('import/assets/images/avatar/placeholder.jpg') }}" />
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="w-100">
                                                            <div class="d-flex flex-column align-items-start">
                                                                <div class="bg-light text-secondary p-2 px-3 rounded-2">{{$m->body}}
                                                                    <div class="small my-2">{{ \Carbon\Carbon::parse($m->created_at)->format('h:i A') }}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @empty
                                        @endforelse
                                        <!-- Chat message left text-->
                                    </div>
                                    <!-- Chat conversation END -->
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <form class="d-sm-flex align-items-end">
                                <textarea id="message"  class="form-control mb-sm-0 mb-3" data-autoresize placeholder="Type a message..." rows="1"></textarea>
                                <button id="send" class="btn btn-sm btn-primary ms-2" type="button" ><i class="fa-solid fa-paper-plane fs-6"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- Chat conversation END -->
        </div>
    </div>
  <!-- Container END -->
</main>
<!-- **************** MAIN CONTENT END **************** -->
<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<script>
    function scrollChatToBottom() {
        var chatControl = $("#chatControl");
        chatControl.scrollTop(chatControl.prop("scrollHeight"));
    }

    scrollChatToBottom();

    function getCurrentTime() {
        const currentDate = new Date();
        let hours = currentDate.getHours();
        const meridiem = hours >= 12 ? 'PM' : 'AM'; // Determine AM or PM
        hours = hours % 12 || 12; // Convert 24-hour time to 12-hour time
        let minutes = currentDate.getMinutes();
        // Add leading zero if minutes is less than 10
        minutes = minutes < 10 ? '0' + minutes : minutes;
        const currentTimeString = hours + ':' + minutes + ' ' + meridiem;
        return currentTimeString;
    }


    $("#delete").click(function (){
        $.post("/home/chats/delete/{{$user->id}}",{},function (status , data){
            $("#chatControl").empty();
        });
    });

    $("#send").click(function () {
        $.post("/home/chats/{{$user->id}}", {
            message: $("#message").val(),
        }, function (data, status) {
            let messageToSend =
                '<div class="d-flex justify-content-end text-end mb-1">' +
                '<div class="w-100">' +
                '<div class="d-flex flex-column align-items-end">' +
                '<div class="bg-primary text-white p-2 px-3 rounded-2">' +
                $("#message").val() +
                '<div class="d-flex my-2">' +
                '<div class="small text-secondary">' +
                getCurrentTime() +
                '</div><div class="small ms-2"><i class="fa-solid fa-check"></i></div></div></div></div></div>';
            $("#chatControl").append(messageToSend);
            scrollChatToBottom();
            $("#message").val('');
        });
    });

    Pusher.logToConsole = true;
    var pusher = new Pusher('2d71b511dc2458847016', {
        cluster: 'ap2'
    });

    var channel = pusher.subscribe('chat{{Auth::user()->id}}');
    channel.bind('chatMessage', function(data) {
        let message =
            '<div class="d-flex mb-1"><div class="flex-shrink-0 avatar avatar-xs me-2">'+
            '<img class="avatar-img rounded-circle"'+
            'src="{{asset('import/assets/images/avatar/placeholder.jpg')}}">'+
            '</div><div class="w-100"><div class="d-flex flex-column align-items-start"><div class="bg-light text-secondary p-2 px-3 rounded-2">'+
            data.message +
            '<div class="small my-2">'+
            getCurrentTime() +
            '</div></div></div></div></div>';
        $("#chatControl").append(message);
        scrollChatToBottom();
    });
</script>
<script src="{{asset('import/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

<!-- Vendors -->
<script src="{{asset('import/assets/vendor/OverlayScrollbars-master/js/OverlayScrollbars.min.js')}}"></script>

<!-- Theme Functions -->
<script src="{{asset('import/assets/js/functions.js')}}"></script>

<livewire:scripts />
</body>
</html>
