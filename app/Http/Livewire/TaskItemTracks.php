<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Timetrack;

class TaskItemTracks extends Component
{
    public $item, $lastTimeTrack = null, $isAnyTrackStarted = false;

    protected $listeners = [
        'refreshParent' => '$refresh',
    ];

    public function mount()
    {
        $this->initCurrent();
    }

    protected function initCurrent()
    {
        $this->lastTimeTrack = $this->item->timetracks
                                ->sortByDesc('id')
                                ->first();

        if($this->lastTimeTrack){
            $this->isAnyTrackStarted = is_null($this->lastTimeTrack->end);
        }
    }

    public function doTrack()
    {
        $this->initCurrent();

        if($this->isAnyTrackStarted){
            Timetrack::find($this->lastTimeTrack->id)->update([
                'end' => date("Y-m-d H:i:s"),
            ]);
        }else{
            Timetrack::create([
                'task_id' => $this->item->id,
                'user_id' => Auth()->user()->id,
                'start' => date("Y-m-d H:i:s"),
            ]);
        }

        
        $this->isAnyTrackStarted = !$this->isAnyTrackStarted;

        $status = $this->isAnyTrackStarted ? 'in-progress' : 'pending';
        $this->item->update(['status' => $status]);

        $this->emit('refreshParent');
    }

    protected function getData()
    {
        return [
            'data' => $this->item->timetracks->sortByDesc('id'),
        ];
    }

    public function render()
    {
        return view('livewire.task-item-tracks', $this->getData());
    }
}
