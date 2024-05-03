<button wire:click="toggleRunning"
        @if($this->isOf)
            class="d-inline btn btn-danger me-2"
        @else
            class="d-inline btn btn-primary me-2"
        @endif
        type="button" href="#!">
    @if($this->isOf)
        Down Now
    @else
        It's Running
    @endif
</button>
