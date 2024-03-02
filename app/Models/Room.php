<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];


    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class);
    }

    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class);
    }

    use HasFactory;
}
