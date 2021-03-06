<div class="panel panel-default">
    
    <div class="h3">Add Anime</div>
    

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
            Anime Duration
            {{-- name model Livewire--}}
            <input wire:model="duration" type="text" class="form-control input-sm">
        </div>

        <div class="input-group">
            Anime Release Date
            {{-- name model Livewire--}}
            <input wire:model="release_date" type="text" class="form-control input-sm">
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
            <button wire:click="addAnime()" class="form-control btn btn-primary">Add</button>
        </div>
        

    </div>
   
</div>

</div>