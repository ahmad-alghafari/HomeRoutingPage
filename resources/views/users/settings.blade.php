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
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/choices.js/public/assets/styles/choices.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/dropzone/dist/dropzone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/vendor/flatpickr/dist/flatpickr.css')}}">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('import/assets/css/style.css')}}">

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

{{--    {{dd(session()->all())}}--}}

    <!-- Container START -->
    <div class="container">
        <div class="row">

            <!-- Sidenav START -->
            <div class="col-lg-3">

                <!-- Advanced filter responsive toggler START -->
                <!-- Divider -->
                <div class="d-flex align-items-center mb-4 d-lg-none">
                    <button class="border-0 bg-transparent" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="btn btn-primary"><i class="fa-solid fa-sliders-h"></i></span>
                        <span class="h6 mb-0 fw-bold d-lg-none ms-2">Settings</span>
                    </button>
                </div>
                <!-- Advanced filter responsive toggler END -->

                <nav class="navbar navbar-light navbar-expand-lg mx-0">
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
                        <!-- Offcanvas header -->
                        <div class="offcanvas-header">
                            <button type="button" class="btn-close text-reset ms-auto" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>

                        <!-- Offcanvas body -->
                        <div class="offcanvas-body p-0">
                            <!-- Card START -->
                            <div class="card w-100">
                                <!-- Card body START -->
                                <div class="card-body">
                                    <!-- Side Nav START -->
                                    <ul class="nav nav-tabs nav-pills nav-pills-soft flex-column fw-bold gap-2 border-0">
                                        <li class="nav-item" data-bs-dismiss="offcanvas">
                                            @if($active == 'setting-account')
                                                <a class="nav-link d-flex mb-0 active" href="#nav-setting-tab-1" data-bs-toggle="tab" aria-selected="true"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/person-outline-filled.svg')}}" alt=""><span>Account </span></a>
                                            @else
                                                <a class="nav-link d-flex mb-0 active" href="#nav-setting-tab-1" data-bs-toggle="tab" aria-selected="false" tabindex="-1"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/person-outline-filled.svg')}}" alt=""><span>Account </span></a>
                                            @endif
                                        </li>
                                        <li class="nav-item" data-bs-dismiss="offcanvas">
                                            @if($active == 'setting-photo')
                                                <a class="nav-link d-flex mb-0 active" href="#nav-setting-tab-2" data-bs-toggle="tab" aria-selected="true"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/image-flat.svg')}}" alt=""><span>Personal Photo </span></a>
                                            @else
                                                <a class="nav-link d-flex mb-0 " href="#nav-setting-tab-2" data-bs-toggle="tab" aria-selected="false" tabindex="-1"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/image-flat.svg')}}" alt=""><span>Personal Photo </span></a>
                                            @endif
                                        </li>
                                        <li class="nav-item" data-bs-dismiss="offcanvas">
                                            @if($active == 'setting-password')
                                                <a class="nav-link d-flex mb-0 active" href="#nav-setting-tab-3" data-bs-toggle="tab" aria-selected="true"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/shield-outline-filled.svg')}}" alt=""><span>Change Password </span></a>
                                            @else
                                                <a class="nav-link d-flex mb-0 " href="#nav-setting-tab-3" data-bs-toggle="tab" aria-selected="false" tabindex="-1"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/shield-outline-filled.svg')}}" alt=""><span>Change Password </span></a>
                                            @endif
                                        </li>
                                        {{-- <li class="nav-item" data-bs-dismiss="offcanvas">
                                            <a class="nav-link d-flex mb-0" href="#nav-setting-tab-4" data-bs-toggle="tab"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/handshake-outline-filled.svg')}}" alt=""><span>Communications </span></a>
                                        </li>
                                        <li class="nav-item" data-bs-dismiss="offcanvas">
                                            <a class="nav-link d-flex mb-0" href="#nav-setting-tab-5" data-bs-toggle="tab"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/chat-alt-outline-filled.svg')}}" alt=""><span>Messaging </span></a>
                                        </li> --}}
                                        <li class="nav-item" data-bs-dismiss="offcanvas">
                                            @if($active == 'setting-close-account')
                                                <a class="nav-link d-flex mb-0 active" href="#nav-setting-tab-6" data-bs-toggle="tab" aria-selected="true"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/trash-var-outline-filled.svg')}}" alt=""><span>Close account </span></a>
                                            @else
                                                <a class="nav-link d-flex mb-0 " href="#nav-setting-tab-6" data-bs-toggle="tab" aria-selected="false" tabindex="-1"> <img class="me-2 h-20px fa-fw" src="{{asset('import/assets/images/icon/trash-var-outline-filled.svg')}}" alt=""><span>Close account </span></a>
                                            @endif
                                        </li>
                                    </ul>
                                    <!-- Side Nav END -->
                                </div>
                                <!-- Card body END -->
                                <!-- Card footer -->
                                <div class="card-footer text-center py-2">
                                    <a class="btn btn-link text-secondary btn-sm" href={{route('home.users.show' , Auth::user()->id)}}>View Profile </a>
                                </div>
                            </div>
                            <!-- Card END -->
                        </div>
                        <!-- Offcanvas body -->


                        <!-- Copyright -->
                        <p class="small text-center mt-1">©{{date('Y')}} <a class="text-reset" target="_blank" href="https://www.webestica.com/"> {{env('APP_NAME')}} </a></p>

                    </div>
                </nav>
            </div>
            <!-- Sidenav END -->

            <!-- Main content START -->
            <div class="col-lg-6 vstack gap-4">
                <!-- Setting Tab content START -->
                <div class="tab-content py-0 mb-0">

                    <!-- Account setting tab START -->
                    <div class="tab-pane  fade {{$active == 'setting-account' ? 'show active' : ''}}" id="nav-setting-tab-1">
                        <div class="card mb-4">

                            <!-- Title START -->
                            <div class="card-header border-0 pb-0">
                                <h1 class="h5 card-title">Account Settings</h1>
                            </div>
                            <!-- Card header START -->
                            <!-- Card body START -->
                            <div class="card-body">
                                <!-- Form settings START -->
                                <form class="row g-3" method="POST" action="{{route('home.users.settings.post')}}">
                                    @csrf
                                    @method('POST')

                                    <!-- User name -->
                                    <div class="col-sm-6">
                                        <label class="form-label">User name</label>
                                        <input type="text" class="form-control" placeholder="" name="name" value={{Auth::user()->name}}>
                                        @error('name')
                                        <span class="feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!-- Email -->
                                    <div class="col-sm-6">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" placeholder="user@test.com" name="email" value="{{Auth::user()->email}}">
                                        @error('email')
                                        <span class="feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Phone number -->
                                    <div class="col-sm-6">
                                        <label class="form-label">Phone number</label>
                                        <input type="text" class="form-control" placeholder="Optional" name="phone" value="@if(Auth::user()->info()->exists()) {{Auth::user()->info->phone}} @endif">
                                        @error('phone')
                                        <span class="feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!-- Birthday -->
                                    <div class="col-lg-6">
                                        <label class="form-label">Birthday </label>
                                        <input type="date" class="form-control flatpickr" name="birth" value="@if(Auth::user()->info()->exists()) {{Auth::user()->info->birth}} @endif">
                                        @error('birth')
                                        <span class="feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!-- Job -->
                                    <div class="col-sm-6">
                                        <label class="form-label">Job</label>
                                        <input type="text" class="form-control" placeholder="dr , eng ..." name="job" value="@if(Auth::user()->info()->exists()) {{Auth::user()->info->job}} @endif">
                                        @error('job')
                                        <span class="feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Status</label>
                                        <select name="community_status"  value="@if(Auth::user()->info()->exists()) {{Auth::user()->info->community_status}} @endif" class="form-control">
                                            @if(Auth::user()->info()->exists())
                                                <option value="single" @if(Auth::user()->info->community_status == 'single')selected @endif>Single</option>
                                                <option value="married" @if(Auth::user()->info->community_status == 'married')selected @endif>Married</option>
                                                <option value="divorced" @if(Auth::user()->info->community_status == 'divorced')selected @endif>Divorced</option>
                                                <option value="in a relationship" @if(Auth::user()->info->community_status == 'in a relationship')selected @endif>In A Relationship</option>
                                                <option value="taken" @if(Auth::user()->info->community_status == 'taken')selected @endif>Taken</option>
                                                <option value="empty" @if(Auth::user()->info->community_status == '')selected @endif>empty</option>
                                            @else
                                                <option selected>empty</option>
                                                <option value="single"  >Single</option>
                                                <option value="married" >Married</option>
                                                <option value="divorced" >Divorced</option>
                                                <option value="in a relationship" >In A Relationship</option>
                                                <option value="taken" >Taken</option>
                                            @endif

                                        </select>
                                        @error('community_status')
                                        <span class="feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control"  placeholder="Syria , damascus , mazzah ..." name="address" value="@if(Auth::user()->info()->exists()) {{Auth::user()->info->address}} @endif">
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Page information -->
                                    <div class="col-12">
                                        <label class="form-label">Overview</label>
                                        <textarea class="form-control" rows="4" name="overview" maxlength="200" placeholder="Description" >@if(Auth::user()->info()->exists()) {{Auth::user()->info->overview}} @endif</textarea>
                                        @error('overview')
                                        <span class="feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <small>Character limit: 200</small>
                                    </div>



                                    <!-- Button  -->
                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-sm btn-primary mb-0">Save changes</button>
                                    </div>
                                </form>
                                <!-- Settings END -->
                            </div>
                            <!-- Card body END -->
                        </div>
                    </div>
                    <!-- Account setting tab END -->

                    <!-- Channge avatar tab START -->
                    <div class="tab-pane  fade {{$active == 'setting-photo' ? 'show active' : ''}}" id="nav-setting-tab-2">
                        <!-- Notification START -->
                        <div class="card  mb-4">

                            <!-- Title START -->
                            <div class="card-header border-0 pb-0">
                                <h1 class="h5 card-title">Personal Photo Settings</h1>
                                <p class="mb-0">You can choice an image or leave it as placeholder or you can choice an image that setied awy.</p>
                            </div>
                            <!-- Card header START -->
                            <!-- Card body START -->
                            <div class="card-body">
                                <!-- Form settings START -->
                                @if(Auth::user()->photo != null)
                                    <div class="avatar avatar-xxxl">
                                        <a class="" href="{{asset(Auth::user()->photo->path)}}" data-glightbox="post-gallery" data-gallery="image-popup" >
                                            <img class="avatar-img rounded-circle" src="{{asset(Auth::user()->photo->path)}}" alt="avatar">
                                        </a>
                                    </div>
                                @else
                                    <div class="avatar avatar-xxxl">
                                        <a class="" href="{{asset('import/assets/images/avatar/placeholder.jpg')}}" data-glightbox="post-gallery" data-gallery="image-popup" >
                                            <img class="avatar-img rounded-circle" src="{{asset('import/assets/images/avatar/placeholder.jpg')}}" alt="avatar">
                                        </a>
                                    </div>
                                @endif
                                <div class="mt-5">
                                    <button type="button" class="btn btn-success-soft btn-sm mb-2 mb-sm-0" data-bs-toggle="modal" data-bs-target="#chanephotoModal">
                                        Change photo
                                    </button>
                                    <form  class="d-inline" method="POST" action="{{route('home.users.photo.destroy' , Auth::user()->id)}}">@csrf @method('DELETE') <input type="submit" value="Delete my photo" class="btn btn-danger btn-sm mb-0"></form>


                                    @foreach($errors->all() as $error)
                                        <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                            <strong>{{$error}}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endforeach
                                </div>

                                @if(session('delete_photo'))

                                @endif
                                  <!-- Modal -->
                                <div class="modal fade" id="chanephotoModal" tabindex="-1" aria-labelledby="chanephotoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="chanephotoModalLabel">Modal title</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{route('home.users.photo.store' )}}" method="POST" enctype="multipart/form-data">@csrf
                                            <div class="modal-body text-bg-dark">
                                                <input type="file" name="image"  id="photo" class="form-control " accept="image" >
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" class="btn btn-primary" value="Save changes">
                                            </div>
                                        </form>
                                      </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Card body END -->
                        </div>
                        <!-- photo settings End -->
                    </div>
                    <!-- Channge avatar tab END -->

                    <!-- Change Password tab START -->
                    <div class="tab-pane fade {{$active == 'setting-password' ? 'show active' : ''}}" id="nav-setting-tab-3">
                        <div class="card">
                            <!-- Title START -->
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title">Change your password</h5>
                                <p class="mb-0">See resolved goodness felicity shy civility domestic had but.</p>
                            </div>
                            <!-- Title START -->
                            <div class="card-body">
                                <!-- Settings START -->
                                <form class="row g-3" method="POST" action="{{ route('home.users.settings.updatepassword') }}">
                                    @csrf
                                    <!-- Current password -->
                                    <div class="col-12">
                                        <label class="form-label">Current password</label>
                                        <input type="password" class="form-control" placeholder="" name="password">
                                        @error('password')
                                        <span class="feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!-- New password -->
                                    <div class="col-12">
                                        <label class="form-label" for="new_password">New Password</label>
                                        <!-- Input group -->
                                        <div class="input-group">
                                            <input class="form-control fake password" type="password" id="psw-input" placeholder="Enter new password" name="new_password">
                                            <span class="input-group-text p-0">
                                                <i class="fakepassword icon fa-solid fa-eye-slash cursor-pointer p-2 w-40px"></i>
                                            </span>
                                        </div>
                                        <!-- Psw meter -->
                                        <div id="pswmeter" class="mt-2"></div>
                                        <div id="pswmeter-message" class="rounded mt-1"></div>
                                        @error('new_password')
                                        <span class="feedback " role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <!-- Confirm password -->
                                    <div class="col-12">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" placeholder="" name="new_password_confirm">
                                        @error('new_password_confirm')
                                        <span class="feedback " role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Button  -->
                                    <div class="col-12 text-end">
                                        <button type="submit" class="btn btn-primary mb-0" >Update password</button>
                                    </div>
                                </form>
                                <!-- Settings END -->
                            </div>
                        </div>
                    </div>
                    <!-- Change Password tab END -->

                    <!-- Close account tab START -->
                    <div class="tab-pane fade {{$active == 'setting-close-account' ? 'show active' : ''}}" id="nav-setting-tab-6">
                        <!-- Card START -->
                        <div class="card">
                            <!-- Card header START -->
                            <div class="card-header border-0 pb-0">
                                <h5 class="card-title">Delete account</h5>
                                <p class="mb-0">You can choose between deleting the entire account or deleting only your personal information.</p>
                            </div>
                            <!-- Card header START -->
                            <!-- Card body START -->
                            <div class="card-body">
                                <!-- Delete START -->
                                <h6>Before you go...</h6>
                                <ul>
                                    <li>If you want to delete all of your conversations or your interactions, follows, or posts, you can choose to delete my account data..</li>
                                </ul>
                                <form action="{{route('home.users.account.delete' ,Auth::user() )}}" method="post">

                                <div class="form-check form-check-md my-4">
                                    <input class="form-check-input" type="checkbox" name="check" id="deleteaccountCheck">
                                    <label class="form-check-label" for="deleteaccountCheck">Yes, I'd like to delete</label>
                                    @error('check')
                                    <label class="btn btn-danger form-check-label" >{{$error}}</label>
                                    @enderror
                                </div>
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger btn-sm mb-2 mb-sm-0" name="deleteData" type="submit" value="true">Delete My Data</button>
                                    <button class="btn btn-danger btn-sm mb-0" name="deleteAccount" type="submit" value="true">Delete My Account</button>
                                </form>
                                <!-- Delete END -->
                            </div>
                            <!-- Card body END -->
                        </div>
                        <!-- Card END -->
                    </div>
                    <!-- Close account tab END -->

                </div>
                <!-- Setting Tab content END -->
            </div>

        </div> <!-- Row END -->
    </div>
    <!-- Container END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->
@if(session()->has('message'))
    <div class="alert alert-light fade show position-fixed start-0 bottom-0 z-index-99 shadow p-4 m-3 col-10 col-md-4 col-lg-3" role="alert" id="message-container">
        <div class="text-dark">
            <!-- Content -->
            @switch(session('message'))
                @case("delete_photo_success")
                    <p class="mb-0">Deleted Successfully!</p>
                    @break

                @case('delete_photo_failed')
                    <p class="mb-0">Deleted Failed , No User Have This ID!</p>
                    @break

                @case('password_changed_success')
                    <p class="mb-0">Password Changed Successfully!</p>
                    @break

                @case('password_error')
                    <p class="mb-0">The Current Password Is Not Correct!</p>
                    @break

                @case('add_photo_error')
                    <p class="mb-0">Something Was Wrong When Added Your Photo!</p>
                    @break

                @case('add_photo_success')
                    <p class="mb-0">Photo Added Successfully!</p>
                    @break

                @case('account_save_changed_success')
                    <p class="mb-0">Your Information Updated Successfully!</p>
                    @break

                @case('make_sure_to_delete')
                    <p class="mb-0">You should mark the failed!</p>
                    @break
                @case('delete_data_processing')
                    <p class="mb-0">Delete Your Data Processing Now!</p>
                    @break
                @case('delete_data_error_went_wrong')
                    <p class="mb-0">Something went wrong</p>
                    @break

            @endswitch
            <!-- Buttons -->
            <div class="mt-3">
                <button type="button" class="btn btn-success-soft btn-sm mb-0" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">Ok</span>
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

<!-- JS libraries, plugins and custom scripts -->
<!-- Bootstrap JS -->
<script src="{{asset('import/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>


<!-- Vendors -->
<script src="{{asset('import/assets/vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<script src="{{asset('import/assets/vendor/dropzone/dist/dropzone.js')}}"></script>
<script src="{{asset('import/assets/vendor/flatpickr/dist/flatpickr.min.js')}}"></script>
<script src="{{asset('import/assets/vendor/pswmeter/pswmeter.min.js')}}"></script>

<!-- Theme Functions -->
<script src="{{asset('import/assets/js/functions.js')}}"></script>

</body>
</html>

