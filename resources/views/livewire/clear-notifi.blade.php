<div wire:click="clearing"  class="card-header d-flex justify-content-between align-items-center">
    <h6 class="m-0">Notifications <span class="badge bg-danger bg-opacity-10 text-danger ms-2">{{auth()->user()->unreadNotifications->count()}} new</span></h6>
    <button class="btn btn-sm btn-danger-soft" type="submit" id="clearingNotificaions">Clear all</button>
</div>