<div wire:click="clearing"  class="card-header d-flex justify-content-between align-items-center">
    <h6 class="m-0"><a href="{{route('home.notificaions')}}">Notifications</a> <span class="badge bg-primary bg-opacity-10 text-primary ms-2" id="notificationsNumbers">{{$this->likesNumber}}</span></h6>
    <button class="btn btn-sm btn-danger-soft" type="submit" id="clearingNotificaions">Clear all</button>
</div>
