<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

enum Term: string
{
    case Summer = "Summer";
    case Winter = "Winter";
    case Fall = "Fall";
}
class Session extends Model
{
    use HasFactory;
    protected $casts = [
        "year" => "date:Y-m-d",
        "term" => Term::class,
    ];


    public function getName()
    {
        return "[" . $this->year->year . "] " . $this->course->name;
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }
}
