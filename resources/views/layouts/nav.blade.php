<nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo START -->
        <a class="navbar-brand" href={{route('home.posts.index')}}>
            <img class="light-mode-item navbar-brand-item" src="{{asset('import/assets/images/logo.svg')}}" alt="logo">
            <img class="dark-mode-item navbar-brand-item" src="{{asset('import/assets/images/logo.svg')}}" alt="logo">
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
                    <a href="{{route('home.search')}}">
                        <form class="rounded position-relative">
                            <input class="form-control ps-5 bg-light" type="search" placeholder="Search..." aria-label="Search">
                            <button class="btn bg-transparent px-2 py-0 position-absolute top-50 start-0 translate-middle-y" type="submit"><i class="bi bi-search fs-5"> </i></button>
                        </form>
                    </a>

                </div>
            </div>
        </div>
        <!-- Main navbar END -->

        <!-- Nav right START -->
        <ul class="nav flex-nowrap align-items-center ms-sm-3 list-unstyled">
            @if(Auth::user()->role == 2)
            <li class="nav-item ms-2">
                <a class="nav-link bg-light icon-md btn btn-light p-0" href="{{route('admin.dashboard')}}">
                    <i class="bi bi-house-gear-fill fs-6"> </i>
                </a>
            </li>
            @endif

            <li class="nav-item ms-2">
                <a class="nav-link bg-light icon-md btn btn-light p-0" href="{{route('home.chats')}}">
                    <i class="bi bi-chat-left-text-fill fs-6"> </i>
                </a>
            </li>
            <li class="nav-item ms-2">
                <a class="nav-link bg-light icon-md btn btn-light p-0" href="{{route('home.users.settings' , Auth::user()->id)}}">
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
                        @livewire('clear-notifi')
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush list-unstyled p-2">
                                <!-- Notif item -->
                                <li>
                                    <div class="unreadNotifications" id="notificaionsAreia">
                                        @foreach(auth()->user()->unreadNotifications as $notification)

                                            @php
                                                $curr_user =\App\Models\User::find($notification->data['user_id']);
                                            @endphp

                                            @if($notification->type == 'App\Notifications\PostNotify')
                                                <div class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3">
                                                    <div class="avatar text-center d-none d-sm-inline-block">
                                                        <a href="{{ route('home.posts.showpost' , $notification->data['id'] )}}" style="color: #fff">
                                                            <img class="avatar-img rounded-circle" src="{{$curr_user->photo ? asset($curr_user->photo->path) : asset('import/assets/images/avatar/placeholder.jpg')}}" alt=" ">
                                                        </a>
                                                    </div>
                                                    <div class="ms-sm-3">
                                                        <div class=" d-flex">
                                                            <a href="{{ route('home.posts.showpost' , $notification->data['id']) }}" style="color: #fff">
                                                                <p class="small mb-2">
                                                                    <b>{{ $notification->data['user'] }}</b> {{ $notification->data['title'] }}
                                                                </p>
                                                            </a>
                                                            <p class="small ms-3 text-nowrap">{{ $notification->created_at->diffForHumans() }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($notification->type == 'App\Notifications\CommentNotify')

                                                <div class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3">
                                                    <div class="avatar text-center d-none d-sm-inline-block">
                                                        <a href="{{ route('home.posts.showpost' , $notification->data['post_id'] )}}" style="color: #fff">
                                                            <img class="avatar-img rounded-circle" src="{{$curr_user->photo ? asset($curr_user->photo->path) : asset('import/assets/images/avatar/placeholder.jpg')}}" alt=" ">


                                                        </a>
                                                    </div>
                                                    <div class="ms-sm-3">
                                                        <div class=" d-flex">
                                                            <a href="{{ route('home.posts.showpost', $notification->data['post_id']) }}" style="color: #fff">
                                                                <p class="small mb-2">
                                                                    <b>{{ $notification->data['user'] }}</b> {{ $notification->data['title'] }}
                                                                </p>
                                                            </a>
                                                            <p class="small ms-3 text-nowrap">{{ $notification->created_at->diffForHumans() }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($notification->type == 'App\Notifications\LikeNotify')
                                                <div class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3">
                                                    <div class="avatar text-center d-none d-sm-inline-block">
                                                        <a href="{{ route('home.posts.showpost' , $notification->data['post_id']) }}" style="color: #fff">
                                                            <img class="avatar-img rounded-circle" src="{{$curr_user->photo ? asset($curr_user->photo->path) : asset('import/assets/images/avatar/placeholder.jpg')}}" alt=" ">
                                                        </a>
                                                    </div>
                                                    <div class="ms-sm-3">
                                                        <div class=" d-flex">
                                                            <a href="{{ route('home.posts.showpost' ,  $notification->data['post_id'] )}}" style="color: #fff">
                                                                <p class="small mb-2"><b>{{ $notification->data['user'] }}</b> {{ $notification->data['title'] }}</p></a>
                                                            <p class="small ms-3 text-nowrap">{{ $notification->created_at->diffForHumans() }}</p>

                                                        </div>

                                                    </div>
                                                </div>
                                            @elseif($notification->type == 'App\Notifications\FollowNotify')
                                                <div class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3">
                                                    <div class="avatar text-center d-none d-sm-inline-block">
                                                        <a href="{{ route('home.users.usershow' , $notification->data['user_id'] )}}" style="color: #fff">
                                                            <img class="avatar-img rounded-circle" src="{{$curr_user->photo ? asset($curr_user->photo->path) : asset('import/assets/images/avatar/placeholder.jpg')}}" alt=" ">

                                                        </a>
                                                    </div>
                                                    <div class="ms-sm-3">
                                                        <div class=" d-flex">
                                                            <a href="{{ route('home.users.usershow' , $notification->data['user_id'] ) }}" style="color: #fff">
                                                                <p class="small mb-2"><b>{{ $notification->data['follower_name'] }}</b> {{ $notification->data['title'] }}</p></a>
                                                            <p class="small ms-3 text-nowrap">{{ $notification->created_at->diffForHumans() }}</p>

                                                        </div>

                                                    </div>
                                                </div>
                                            @elseif($notification->type == 'App\Notifications\CommentLikeNotify')
                                                <div class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3">
                                                    <div class="avatar text-center d-none d-sm-inline-block">
                                                        <a href="{{ route('home.posts.showpost' , $notification->data['post']) }}" style="color: #fff">
                                                            <img class="avatar-img rounded-circle" src="{{$curr_user->photo ? asset($curr_user->photo->path) : asset('import/assets/images/avatar/placeholder.jpg')}}" alt=" ">
                                                        </a>
                                                    </div>
                                                    <div class="ms-sm-3">
                                                        <div class=" d-flex">
                                                            <a href="{{ route('home.posts.showpost' , $notification->data['post']) }}" style="color: #fff">
                                                                <p class="small mb-2"><b>{{ $notification->data['user'] }}</b> {{ $notification->data['title'] }}</p></a>
                                                            <p class="small ms-3 text-nowrap">{{ $notification->created_at->diffForHumans() }}</p>

                                                        </div>

                                                    </div>
                                                </div>
                                            @elseif($notification->type == 'App\Notifications\FailedpostingNotify')
                                                <div class="list-group-item list-group-item-action rounded badge-unread d-flex border-0 mb-1 p-3">
{{--                                                    <div class="avatar text-center d-none d-sm-inline-block">--}}
{{--                                                        <a href="{{ route('home.posts.showpost' , $notification->data['post']) }}" style="color: #fff">--}}
{{--                                                            <img class="avatar-img rounded-circle" src="{{$curr_user->photo ? asset($curr_user->photo->path) : asset('import/assets/images/avatar/placeholder.jpg')}}" alt=" ">--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
                                                    <div class="ms-sm-3">
                                                        <div class=" d-flex">
{{--                                                            <a href="{{ route('home.posts.showpost' , $notification->data['post']) }}" style="color: #fff">--}}
                                                                <p class="small mb-2"><b class="h6">Error Message : </b> {{ $notification->data['title'] }}</p>
                                                            <p class="small ms-3 text-nowrap">{{ $notification->created_at->diffForHumans() }}</p>

                                                        </div>

                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                var clearButton = document.getElementById("clearingNotificaions");
                                var notificationsDiv = document.getElementById("notificaionsAreia");

                                clearButton.addEventListener("click", function() {
                                    notificationsDiv.innerHTML = ""; // Clearing the content of the div
                                });
                            });
                        </script>
                        <div class="card-footer text-center">
                            <a href="{{route('home.notificaions')}}" class="btn btn-sm btn-primary-soft">See all incoming activity</a>
                        </div>
                    </div>
                </div>
            </li>
            <!-- Notification dropdown END -->

            <li class="nav-item ms-2 dropdown">
                <a class="nav-link btn icon-md p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="avatar-img rounded-2" alt="" src="{{Auth::user()->photo ? asset(Auth::user()->photo->path) : asset('import/assets/images/avatar/placeholder.jpg') }}" >
                </a>
                <ul class="dropdown-menu dropdown-animation dropdown-menu-end pt-3 small me-md-n3" aria-labelledby="profileDropdown">
                    <!-- Profile info -->
                    <li class="px-3">
                        <div class="d-flex align-items-center position-relative">
                            <!-- Avatar -->
                            <div class="avatar me-3">
                                <a href="#">
                                    <img class="avatar-img rounded-2" alt="" src="{{Auth::user()->photo ? asset(Auth::user()->photo->path) : asset('import/assets/images/avatar/placeholder.jpg') }}" >
                                </a>
                            </div>
                            <div>
                                <a class="h6 stretched-link" href="#">{{Auth::user()->name}}</a>
                                <p class="small m-0">Web Developer</p>
                            </div>
                        </div>
                        <a class="dropdown-item btn btn-primary-soft btn-sm my-2 text-center" href={{route('home.users.show',Auth::user())}}>View profile</a>
                    </li>
                    <!-- Links -->
                    <li><a class="dropdown-item" href="{{route('home.users.settings' , Auth::user()->id)}}"><i class="bi bi-gear fa-fw me-2"></i>Settings & Privacy</a></li>
                    {{-- <li>
                        <a class="dropdown-item" href="https://support.webestica.com/" target="_blank">
                            <i class="fa-fw bi bi-life-preserver me-2"></i>Support
                        </a>
                    </li> --}}
                    {{-- <li>
                        <a class="dropdown-item" href="docs/index.html" target="_blank">
                            <i class="fa-fw bi bi-card-text me-2"></i>Documentation
                        </a>
                    </li> --}}
                    <li class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="">
                            @csrf
                            <button type="submit" class="dropdown-item bg-danger-soft-hover"><i class="bi bi-power fa-fw me-2"></i>Sign Out</button>
                        </form>
                    </li>
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

