<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Form extends Model
{   
    protected $connection = 'mongodb';

    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id', '_id');
    }
    
    public function submissions()
    {
        return $this->hasMany(Form::class);
    }
}
