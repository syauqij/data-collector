<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Form extends Model
{   
    protected $connection = 'mongodb';

    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];
}
