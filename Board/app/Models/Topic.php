<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $table = 'topics';

    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function likes()
    {
        return $this->belongsToMany('App\Models\User','likes')
        ->withTimestamps();
    }

    
}
