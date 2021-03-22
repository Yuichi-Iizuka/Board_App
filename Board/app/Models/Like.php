<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';

    protected $fillable = [
        'user_id',
        'topic_id',
    ];

    public function topic()
    {
        return $this->belongsTo('App\Models\topic');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    
}
