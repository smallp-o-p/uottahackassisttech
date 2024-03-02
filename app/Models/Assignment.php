<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{

    protected $fillable = [
        'title',
        'due_date',
        'uploaded_document'
    ];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
    use HasFactory;
}
