<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'order',
        'path_id'
    ];

    public function path()
    {
        return $this->belongsTo(Path::class, 'path_id', 'id');
    }
}
