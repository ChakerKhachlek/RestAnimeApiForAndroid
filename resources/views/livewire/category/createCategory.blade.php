<div class="panel panel-default">
    
        <div class="h3">Create Category</div>
   
    <div class="panel-body">
        <div class="form-inline">
            <div class="input-group">
                Category Name
                {{-- Name Model Livewire--}}
                <input wire:model="name" type="text" class="form-control input-sm">
            </div>
           
            <div class="input-group">
                <br>
                {{-- store method Livewire--}}
                <button wire:click="store()" class="btn btn-default">Save</button>
                {{-- category storing Livewire--}}
                <div wire:loading wire:target="store">Creating...</div>
            </div>
        </div>
    </div>
</div>