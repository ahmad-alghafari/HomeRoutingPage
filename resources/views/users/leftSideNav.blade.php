<div class="col-lg-3">

    <!-- Advanced filter responsive toggler START -->
    <div class="d-flex align-items-center d-lg-none">
        <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSideNavbar" aria-controls="offcanvasSideNavbar">
            <span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
            <span class="h6 mb-0 fw-bold d-lg-none ms-2">My profile</span>
        </button>
    </div>
    <!-- Advanced filter responsive toggler END -->

    <!-- Navbar START-->
    <nav class="navbar navbar-expand-lg mx-0">
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSideNavbar">
            <!-- Offcanvas header -->
            <div class="offcanvas-header">
                <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <!-- Offcanvas body -->
            <div class="offcanvas-body d-block px-2 px-lg-0">
                <!-- Card START -->
                <div class="card overflow-hidden">
                    <!-- Cover image -->
                    <div class="h-50px" style="background-image:url({{asset('import/assets/images/bg/01.jpg')}}); background-position: center; background-size: cover; background-repeat: no-repeat;"></div>
                        <!-- Card body START -->
                        <div class="card-body pt-0">
                            <div class="text-center">
                            <!-- Avatar -->
                            <div class="avatar avatar-lg mt-n5 mb-3">
                                <a href="{{route('home.users.show' , Auth::user()->id )}}"><img class="avatar-img rounded border border-white border-3"
                                                  @if(Auth::user()->photo != null)
                                                  src="{{asset(Auth::user()->photo->path)}}"
                                                  @else
                                                  src="{{asset('import/assets/images/avatar/placeholder.jpg')}}"
                                                  @endif
                                                  alt="your personal photo "></a>
                            </div>
                            <!-- Info -->
                            <h5 class="mb-0"> <a href="{{route('home.users.show' , Auth::user()->id )}}">{{Auth::user()->name}}</a> </h5>
                            <small>{{Auth::user()->info->overview}}</small>
                            {{--										<p class="mt-3">I'd love to change the world, but they won’t give me the source code.</p>--}}
                                <hr>
                            <!-- User stat START -->
                            <div class="hstack gap-2 gap-xl-3 justify-content-center">
                                <!-- User stat item -->
                                <div>
                                    <h6 class="mb-0">{{Auth::user()->info->posts_number}}</h6>
                                    <small>Posts</small>
                                </div>
                                <!-- Divider -->
                                <div class="vr"></div>
                                <!-- User stat item -->
                                <div>
                                    <h6 class="mb-0"><a href="{{route('home.users.followers' , \Illuminate\Support\Facades\Auth::user()->id)}}" class="nav-link">{{Auth::user()->info->follower}}</a></h6>
                                    <small><a class="nav-link" href="{{route('home.users.followers' , \Illuminate\Support\Facades\Auth::user()->id)}}">Follower</a></small>
                                </div>
                                <!-- Divider -->
                                <div class="vr"></div>
                                <!-- User stat item -->
                                <div>
                                    <h6 class="mb-0"><a href="{{route('home.users.following' , \Illuminate\Support\Facades\Auth::user()->id)}}" class="nav-link">{{Auth::user()->info->following}}</a></h6>
                                    <small><a class="nav-link" href="{{route('home.users.following' , \Illuminate\Support\Facades\Auth::user()->id)}}">Following</a></small>
                                </div>
                            </div>
                            <!-- User stat END -->
                        </div>

                        <!-- Divider -->
                        <hr>

                        <!-- Side Nav START -->
                        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('welcome')}}"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/home-outline-filled.svg')}}" alt=""><span>Home Page</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home.chats.search')}}"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/person-outline-filled.svg')}}" alt=""><span>Chats </span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="blog.html"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/news2-big.svg')}}" alt=""><span>Latest News </span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('domains.index')}}"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/calendar-outline-filled.svg')}}" alt=""><span>Domains </span></a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home.notificaions')}}"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/notification-outlined-filled.svg')}}" alt=""><span>Notifications</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('home.users.settings' , Auth::user())}}"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/cog-outline-filled.svg')}}" alt=""><span>Settings </span></a>
                            </li>
                        </ul>
                        <!-- Side Nav END -->


                    </div>
                    <!-- Card body END -->
                    <!-- Card footer -->
                    <div class="card-footer text-center py-2">
                        <a class="btn btn-link btn-sm" href={{route('home.users.show' , auth::user()->id)}}>View Profile </a>
                    </div>
                </div>
                <!-- Card END -->

                <!-- Helper link START -->
                <!-- Helper link END -->
                <!-- Copyright -->
                <p class="small text-center mt-1">©{{date('Y')}} <a class="text-reset" target="_blank" href=""> {{env('APP_NAME')}} </a></p>
            </div>
        </div>
    </nav>
    <!-- Navbar END-->
</div>
