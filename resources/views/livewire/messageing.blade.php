<div class="card card-chat-list rounded-end-lg-0 card-body border-end-lg-0 rounded-top-0">
    <!-- Search chat START -->
    <form class="position-relative">
        <input wire:model.live="search"  class="form-control py-2" type="search" placeholder="Search for chats" aria-label="Search">
        <button class="btn bg-transparent text-secondary px-2 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit">
            <i class="bi bi-search fs-5"></i>
        </button>
    </form>
    <!-- Search chat END -->
    <!-- Chat list tab START -->
    <div class="mt-4 h-100">
        <div class="chat-tab-list custom-scrollbar">
            <ul class="nav flex-column nav-pills nav-pills-soft">
                @foreach($users as $user)
                    <li class="nav-link active text-start" data-bs-dismiss="offcanvas" >
                        <!-- Chat user tab item -->
                        <a href="{{route('home.chats.user' , $user->name)}}">

                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar avatar-story me-2 {{$user->status == 1 ? 'status-online':'status-offline'}} ">
                                    <img class="avatar-img rounded-circle" src="{{$user->photo != null ? asset($user->photo->path) : asset('import/assets/images/avatar/placeholder.jpg') }}" />
                                </div>
                                <div class="flex-grow-1 d-block">
                                    <h6 class="mb-0 mt-1">{{$user->name}}</h6>
                                    <div class="small text-secondary">{{$user->email}}</div>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- Chat list tab END -->
</div>
