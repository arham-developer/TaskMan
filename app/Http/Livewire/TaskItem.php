<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TaskItem extends Component
{
    public $priorities = [1 => 'High', 'Medium', 'Low'];

    public $labels = [
        'todo' => 'info',
        'in-progress' => 'danger',
        'pending' => 'warning',
        'review' => 'default',
        'done' => 'success'
    ];

    public $item, $isDetail;

    protected $listeners = [
        'refreshParent' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.task-item');
    }
}
