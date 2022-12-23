<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almanach extends Model
{
    use HasFactory;

    protected $table = 'almanach';

    protected $fillable = [
        'name',
        'slug',
        'section',
        'content'
    ];
}
