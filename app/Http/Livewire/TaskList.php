<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Task as TaskModel;

class TaskList extends Component
{
    use WithPagination;

    public $search = '', $pageCount = 25;
    public $labels = [
        'todo' => 'info',
        'in-progress' => 'danger',
        'pending' => 'warning',
        'review' => 'default',
        'done' => 'success'
    ];
    
    public $priorities = [1 => 'High', 'Medium', 'Low'];

    protected $listeners = [
        'refreshParent' => '$refresh',
    ];

    protected function getData()
    {
        $user = Auth()->user();
        $keySearch = "%{$this->search}%";

        $taskQuery = TaskModel::query()->whereNull('parent_id')->where('title', 'like', $keySearch)->orderBy('priority', 'ASC');

        if($user->is_guest){
            return ['data' => $taskQuery->clone()->whereIsPublic(true)->paginate($this->pageCount),];
        }

        if($user->is_admin){
            return ['data' => $taskQuery->clone()->paginate($this->pageCount),];
        }

        return ['data' => $taskQuery->clone()->whereUserId($user->id)->paginate($this->pageCount),];
    }

    public function render()
    {
        return view('livewire.task-list', $this->getData());
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatePageCount($pageCount)
    {
        $this->pageCount = $pageCount;
    }
}
