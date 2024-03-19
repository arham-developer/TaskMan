<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{
    User as UserModel,
    Unit as UnitModel,
    Task as TaskModel
};

class TaskForm extends Component
{
    public $model, $currentModelId; // from task-detail on modals

    protected $rules = [
        'model.is_public'   => '',
        'model.title'        => 'required|min:6|max:255|unique:tasks,title',
        'model.description' => '',
        'model.priority'    => 'required',
        'model.unit_id'     => 'required',
        'model.user_id'     => 'required',
    ];

    protected $messages = [
        'model.title.required'      => 'Title is required',
        'model.title.min'           => 'Title must be at least 6 characters',
        'model.title.unique'        => 'Title already taken',
        'model.priority.required'   => 'Please set priority',
        'model.unit_id.required'    => 'Pick a unit or division',
        'model.user_id.required'    => 'Please choose one on assign to',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function submit()
    {
        $this->validate();

        $input = $this->model;
        if($this->currentModelId){
            $input['parent_id'] = TaskModel::findOrFail($this->currentModelId)->id;
        }
        TaskModel::create($input);

        $this->emit('refreshParent');
        $this->dispatchBrowserEvent('formModal', ['showHide' => 'hide']);
        $this->model = null;

        session()->flash('message', 'Item successfully submitted');

        $this->reset();
    }

    protected function getData()
    {
        return [
            'users' => UserModel::whereIsAdmin(false)->whereIsGuest(false)->get(),
            'units' => UnitModel::all(),
        ];
    }

    public function render()
    {
        return view('livewire.task-form', $this->getData());
    }
}
