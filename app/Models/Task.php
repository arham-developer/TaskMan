<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Task extends Model
{
    use SoftDeletes;

    protected $table        = 'tasks';
    protected $primaryKey   = 'uuid';
    public    $incrementing = false;
    public    $timestamps   = true;
    protected $dates        = ['deleted_at'];
    protected $guarded      = ['id'];
    protected $hidden       = ['user_id', 'parent_id', 'deleted_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }
    
    public function subtasks(): HasMany
    {
        return $this->hasMany(Task::class, 'parent_id', 'id');
    }

    public function timetracks(): HasMany
    {
        return $this->hasMany(Timetrack::class, 'task_id', 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($item) {
            $uuid = Str::uuid()->toString();
            $item->uuid = $uuid;
        });
    }
}
