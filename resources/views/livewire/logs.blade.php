<div class="col-md-6 col-12 mb-30">
    <div class="box">
        <div class="box-head">
            <h4 class="title">Delete Logs That Before :</h4>
        </div>
        <div class="box-body">
            <input wire:model.live="date" id="inputClipboard" type="date" class="form-control" >
            <button wire:click="deleteing" type="submit" class="button button-danger button-clipboard mb-0 mt-15" >Delete</button>
            <button wire:click="week" type="submit" class="button button-primary  mb-0 mt-15" >Delete one week  ago</button>
            <button wire:click="month" type="submit" class="button button-primary  mb-0 mt-15" >Delete one month ago</button>
            <button wire:click="year" type="submit" class="button button-primary  mb-0 mt-15" >Delete one year age</button>
        </div>
    </div>
</div>
