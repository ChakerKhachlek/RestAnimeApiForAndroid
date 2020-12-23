<div>
     {{-- category model  Livewire--}}
     <select name="category" wire:model="selectedCategory" class="border shadow p-2 bg-white">
        <option value=''>Choose a Category</option>
        {{-- selesting series Livewire--}}
        @foreach($categories as $category)
            <option value={{ $category->id }}>{{ $category->name }}</option>
        @endforeach
        </select>

        @if(!empty($selectedCategory))
        <button wire:click="createMode()" class="btn btn-xs btn-warning">New Anime</button>
        @endif

        @if(!empty($categoryAnimes))
         {{-- series table Livewire--}}
         <table class="table table-sm table-dark" style="margin-top:10px">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">Description</th>
            <th scope="col">Release Date</th>
            <th scope="col">RATING</th>
            <th scope="col">IMAGE URL</th>
            <th scope="col" style="width: 150px;">File URL</th>
        </tr>

      
        @foreach($categoryAnimes as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->description}}</td>
                <td>{{$row->release_date}}</td>
                <td>{{$row->rating}}</td>
                <td><img src="{{$row->image_url}}" width="50" height="50"></td>
                <td style="max-width:300px;word-wrap: break-word;">{{$row->file_url}}</td>
                <td width="100">
                    {{-- Anime edit and Delete methods Livewire--}}
                    <button wire:click="updateMode({{$row->id}})" class="btn btn-xs btn-warning">Edit</button>
                    <button wire:click="deleteAnime({{$row->id}})" class="btn btn-xs btn-danger">Del</button>
                </td>
            </tr>
        @endforeach
         </table>
        @endif

        


        <div style="padding-top: 30px">
        @if($createMode)
            @include('livewire.anime.createAnime')
        @elseif($updateMode)
            @include('livewire.anime.updateAnime')
        @endif
        </div>

        
</div>
