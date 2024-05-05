<button
    wire:click="{{$this->state == "down" ? "toggleOf" : ''}}{{$this->state == "up" ? "toggleOn" : ''}}{{$this->state == "delete" ? "deleteing" : ''}}"
    class="{{$this->state == "down" ? "d-inline btn btn-danger me-2" : ''}}{{$this->state == "up" ? "d-inline btn btn-secondary me-2" : ''}}{{$this->state == "delete" ? "d-inline btn btn-danger me-2" : ''}}"
    type="submit"
    id="clearingNotifications{{$this->state}}">
        {{$this->state}}
</button>
