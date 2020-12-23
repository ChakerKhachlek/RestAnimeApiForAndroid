<?php

namespace App\Http\Livewire;

use App\Models\Anime;
use Livewire\Component;
use App\Models\Category;

class ManageAnimesComponent extends Component
{
    public $name,$description,$rating,$release_date,$file_url,$image_url;
    public $categories,$selectedCategory,$categoryAnimes;
    public $selectedAnime;
    public $createMode=false;
    public $updateMode=false;

    protected $listeners = [
        'categoryAnimes:changed' =>'$refresh',
    ];

    public function mount(){
        $this->categories=Category::all();
        
    }
    
    public function render()
    {
        if(!empty($this->selectedCategory)){
            $selectedCategory=Category::find($this->selectedCategory);
            $this->categoryAnimes=$selectedCategory->animes()->get();
        }
        return view('livewire.anime.manage-animes-component');
    }

    public function resetInput(){
        $this->name=null;
        $this->description=null;
        $this->rating=null;
        $this->release_date=null;
        $this->file_url=null;
        $this->image_url=null;
    }

    public function createMode(){
        $this->resetInput();
        $this->updateMode=false;
        $this->createMode=true;
    }

    public function updateMode($id){
        $this->resetInput();
        $this->createMode=false;

        $this->selectedAnime=$id;
        $record=Anime::find($id);

        $this->name=$record->name;
        $this->description=$record->description;
        $this->rating=$record->rating;
        $this->release_date=$record->release_date;
        $this->image_url=$record->image_url;
        $this->file_url=$record->file_url;
        $this->updateMode=true;
        
    }

    public function updatedSelectedCategory(){
        $this->createMode=false;
       
        if(!empty($this->selectedCategory)){
            $selectedCategory=Category::find($this->selectedCategory);
            $this->categoryAnimes=$selectedCategory->animes()->get();
        }else{
            $this->categoryAnimes=null;
        }

        $this->emit('categoryAnimes:changed');
    }

    



    public function addAnime(){
        $this->validate([
            'name' => 'required',
            'description'=>'required',
            'rating'=>'required|numeric',
            'release_date'=>'required',
            'file_url'=>'required',
            'image_url'=>'required'
        ]);

        $selectedCategory=Category::find($this->selectedCategory);

        $selectedCategory->animes()->create([
            'name' => $this->name,
            'description' => $this->description,
            'release_date' =>$this->release_date,
            'rating' => $this->rating,
            'image_url' => $this->image_url,
            'file_url' => $this->file_url,
        ]);

        $this->resetInput();
      
    }

    public function updateAnime(){
        $record=Anime::find($this->selectedAnime);
        $record->update([
            'name' => $this->name,
            'description' => $this->description,
            'release_date' =>$this->release_date,
            'rating' => $this->rating,
            'image_url' => $this->image_url,
            'file_url' => $this->file_url,
        ]);
        $this->resetInput();
        $this->emit('categoryAnimes:changed');
        $this->updateMode=false;
    }

    public function deleteAnime($id){
        $record=Anime::find($id);
        $record->delete();
        $this->emit('categoryAnimes:changed');
    }




}
