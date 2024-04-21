<button wire:click="toggleFollow"
        @if($this->isFollow)
         class="d-inline btn btn-secondary me-2"
        @else
            class="d-inline btn btn-primary-soft me-2"
        @endif
         type="button" href="#!">
    @if($this->isFollow)
        Following
    @else
        Follow
    @endif
</button>
