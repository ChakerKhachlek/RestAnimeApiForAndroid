<div class="panel panel-default">
    
        <div class="h3">Update Category</div>
        <button wire:click="createMode()" class="btn btn-xs btn-primary">Create New</button>

    <div class="panel-body">
        <div class="form-inline">
            {{-- selected category id Livewire--}}
            <input type="hidden" wire:model="selected_id">
            <div class="input-group">
                Name
                {{-- name model Livewire--}}
                <input wire:model="name" type="text" class="form-control input-sm">
            </div>
            <div class="input-group">
                <br>
                {{-- Update function Livewire--}}
                <button wire:click="update()" class="btn btn-default">Update</button>
                {{-- category updating Livewire--}}
                <div wire:loading wire:target="store">Updating...</div>
            </div>
        </div>
    </div>

</div>