<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    use SoftDeletes;

    protected $table        = 'units';
    protected $guarded      = ['id'];
    public    $timestamps   = true;

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}
