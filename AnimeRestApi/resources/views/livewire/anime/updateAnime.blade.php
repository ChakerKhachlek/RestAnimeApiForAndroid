<div class="panel panel-default">
    
    <div class="h3">Update Anime</div>
    

<div class="panel-body">
    <div class="form-inline">

        <div class="input-group">
            Anime Name
            {{-- name model Livewire--}}
            <input wire:model="name" type="text" class="form-control input-sm">
        </div>

        <div class="input-group">
            Anime Description
            {{-- description model Livewire--}}
            <input wire:model="description" type="text" class="form-control input-sm">
        </div>

        <div class="input-group">
            Anime Rating
            {{-- rating model Livewire--}}
            <input wire:model="rating" type="text" class="form-control input-sm">
        </div>

        <div class="input-group">
            Anime Image Url
            {{-- image model Livewire--}}
            <input wire:model="image_url" type="text" class="form-control input-sm">
        </div>

        <div class="input-group">
            Anime File Url
            {{-- file model Livewire--}}
            <input wire:model="file_url" type="text" class="form-control input-sm">
        </div>

        <div class="input-group">
            <button wire:click="updateAnime()" class="form-control btn btn-success">Update</button>
        </div>
        

    </div>
   
</div>

</div>