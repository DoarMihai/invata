<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrolledPaths extends Model
{
    use HasFactory;

    protected $fillable = [
        'path_id',
        'user_id',
        'last_lesson_id',
    ];

    public function path()
    {
        return $this->belongsTo(Path::class, 'path_id', 'id');
    }
}
