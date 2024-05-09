<tr>
    <th class="text-center">{{$this->user->id}}</th>
    <th class="text-center"><div class="avatar mr-10 mb-10"><img src="{{$this->user->photo == null ? asset('import/assets/images/avatar/placeholder.jpg') : asset($this->user->photo->path)}}"></div></th>
    <th class="text-center"><a href="{{route('home.users.show' , $user)}}">{{$this->user->name}}</a></th>
    <th class="text-center">{{$this->user->email}}</th>
    <th class="text-center">{{$this->user->status == '1' ? 'Online' : 'Ofline'}}</th>
    <th class="text-center">{{$this->isBanded ? 'Banded' : 'Active'}}</th>
    <th class="text-center">{{$this->user->last_login_at}}</th>
    @if($this->isBanded)
        <th class="text-center"><button wire:click="unband" class="d-inline btn btn-primary me-2"  type="submit"><i class="fa fa-angle-double-up"></i>Un Band</button></th>
    @else
        <th class="text-center"><button wire:click="band" class="d-inline btn btn-danger me-2"  type="submit"><i class="fa fa-exclamation-triangle"></i>Band</button></th>
    @endif
</tr>
