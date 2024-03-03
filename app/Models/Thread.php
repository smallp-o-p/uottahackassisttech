<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thread extends Model
{

    protected $fillable = [
        'answered_by',
        'asked_by',
        'title',
        'pinned'
    ];

    protected $attributes = [
        'answered_by' => 0,
        'pinned' => false
    ];
    protected $casts = [
        'pinned' => 'boolean'
    ];
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'asked_by');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}
