<!-- Card START -->
<div class="card">
    <!-- Card header START -->

    <div class="d-flex justify-content-center">

    <ul class="nav nav-bottom-line align-items-center justify-content-center justify-content-md-start mb-0 border-0">
        <li class="nav-item ">
            <button type="submit" class="nav-link {{$this->choice == 'followers' ? 'active' : ''}} " wire:click="followers"> Followers</button>
        </li>
        <li class="nav-item ">
            <button type="submit" class="nav-link {{$this->choice == 'following' ? 'active' : ''}} " wire:click="following"> Following</button>
        </li>
    </ul>
    </div>
    <!-- Card header START -->

    <!-- Card body START -->
    <div class="card-header border-0 pb-0">
        <form class="rounded position-relative">
            <input class="form-control ps-5" type="search" placeholder="Search..." aria-label="Search" wire:model.live="search">
            <button class="btn bg-transparent px-2 py-0 position-absolute top-50 start-0 translate-middle-y" type="submit"><i class="bi bi-search fs-5 ps-1"> </i></button>
        </form>
    </div>

    <div class="card-body">
        @foreach($users as $key => $user )
            <!-- Users START -->
            <div class="d-flex mb-3" id="test{{$user->id}}test">
                <!-- Avatar -->
                <div class="avatar avatar-lg me-2">
                    <a href="{{route('home.users.show' , $user->id)}}"><img class="avatar-img rounded-circle" src="{{$user->photo ? asset($user->photo->path) : asset('import/assets/images/avatar/placeholder.jpg')}}" alt=""></a>
                </div>
                <!-- Info -->
                <div class="ms-2 w-100">
                    <div class="d-sm-flex justify-content-between">
                        <h6 class="mb-0"><a href="{{route('home.users.show' , $user->id)}}">{{$user->name}} </a></h6>
                        <p class="small ms-sm-2 mb-0 mb-sm-2">{{$this->choice == 'followers' ? $user->follow()->where('user_follower' , $this->id)->first()->created_at->diffForHumans() : $user->followMe()->where('user_follow' , $this->id)->first()->created_at->diffForHumans()}}</p>

                        <!-- Dropdown START -->
                        <div class="dropdown ms-auto">
                            <a href="#" class="text-secondary" id="bdayActionEdit4" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </a>
                            <!-- Dropdown menu -->
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bdayActionEdit4">
{{--                                <li><a class="dropdown-item" href="#"> <i class="bi bi-trash fa-fw pe-1"></i> Delete</a></li>--}}
{{--                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bell fa-fw pe-1"></i> Turn off notification </a></li>--}}
{{--                                <li><a class="dropdown-item" href="#"> <i class="bi bi-bell-slash fa-fw pe-1"></i> Mute Amanda Read </a></li>--}}
                            </ul>
                        </div>
                        <!-- Dropdown END -->
                    </div>
{{--                        @livewire('follow-live' ,['user' => $user] )--}}
                    @if($user->id != Auth::user()->id)
                    <livewire:follow-live :$user :key="$user->id"/>
                    @endif
                </div>
            </div>
            @if(!$loop->last)
                <hr class="my-4">
            @endif

            <!-- Users END -->
        @endforeach

    </div>
    <!-- Card body END -->
</div>
<!-- Card END -->
