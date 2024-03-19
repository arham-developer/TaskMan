<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $priorities = [1 => 'High', 'Medium', 'Low'];

        return [
            'id' => $this->uuid,
            'title' => $this->title,
            'description' => $this->description,
            'is_public' => $this->is_public,
            'priority' => $priorities[$this->priority],
            'status' => $this->status,
            'division' => $this->unit->name,
            'timetracks' => $this->timetracks->sortByDesc('id'),
        ];
    }
}
