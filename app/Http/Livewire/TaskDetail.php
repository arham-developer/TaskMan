<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task as TaskModel;

class TaskDetail extends Component
{

    public $currentModel;

    protected $listeners = [
        'refreshParent' => '$refresh',
    ];

    public function mount($taskId)
    {
        $this->currentModel = TaskModel::findOrFail($taskId);
    }

    protected function getData()
    {
        return [
            'data' => TaskModel::whereParentId($this->currentModel->id)->orderBy('priority', 'ASC')->get(),
        ];
    }

    public function render()
    {
        return view('livewire.task-detail', $this->getData());
    }

    public function trydelete()
    {
        $this->dispatchBrowserEvent('deleteModal', ['showHide' => 'show']);
    }

    public function destroy()
    {
        $item = $this->currentModel->delete();
        
        $this->dispatchBrowserEvent('deleteModal', ['showHide' => 'hide']);

        return redirect()->route('task-list');
    }
}
