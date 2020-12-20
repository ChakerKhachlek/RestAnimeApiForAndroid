<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class ManageCategoriesComponent extends Component
{
    public $data, $name, $selected_id;

    //Update create mode variables switchers
    public $createMode=true;
    public $updateMode = false;

    //rendering component method
    public function render()
    {
        $this->data = Category::all();
        return view('livewire.category.manage-categories-component');
    }

    //reseting inputs
    private function resetInput()
    {
        $this->name = null;
    }

    //creation mode on
    public function createMode(){
        $this->updateMode=false;
        $this->createMode=true;
    }

    //storing method 
    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);

        Category::create([
            'name' => $this->name
        ]);

        $this->resetInput();
    }

    //edit method
    public function edit($id)
    {
        $record = Category::findOrFail($id);
        $this->selected_id = $id;
        $this->name = $record->name;
        $this->updateMode = true;
    }

    //update method
    public function update()
    {
        $this->validate([
            'name' => 'required'
        ]);

        if ($this->selected_id) {
            $record = Category::find($this->selected_id);
            $record->update([
                'name' => $this->name
            ]);

            $this->resetInput();
            $this->updateMode = false;
        }

    }

    //destroy method
    public function destroy($id)
    {
        if ($id) {
            $record =Category::find($id);
            $record->animes()->delete();
            $record->delete();
        }
    }
}
