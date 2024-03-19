<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Timetrack extends Model
{
    protected $table        = 'timetracks';
    protected $guarded      = ['id'];
    protected $hidden       = ['user_id', 'task_id'];
    public    $timestamps   = true;

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    public function task(): BelongsTo
    {
        return $this->BelongsTo(Task::class);
    }
}
