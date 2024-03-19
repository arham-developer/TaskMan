<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Unit as UnitModel;
use Exception;

class UnitList extends Component
{
    const DELETE = 'delete';
    const EDIT = 'edit';

    public $name = '', $currentId = null;

    protected $rules = [
        'name' => 'required|min:6|max:60|unique:units,name',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function submit()
    {
        $this->validate();

        $input = ['name' => $this->name];

        try{
            if($this->currentId){
                UnitModel::findOrFail($this->currentId)->update($input);
            }else{
                UnitModel::create($input);
            }
        }catch(Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        session()->flash('message', 'Item successfully submitted');

        $this->reset();
    }

    protected function getData()
    {
        return [
            'data' => UnitModel::all(),
        ];
    }

    public function render()
    {
        return view('livewire.unit-list', $this->getData());
    }

    public function selectItem(int $id, string $action)
    {
        $item = UnitModel::findOrFail($id);

        if($action === self::DELETE){
            $item->delete();
            session()->flash('message', 'Item successfully trashed');
        }

        if($action === self::EDIT){
            $this->name = $item->name;
            $this->currentId = $item->id;
        }
    }
}
