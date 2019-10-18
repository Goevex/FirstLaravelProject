<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * Get user that owns the news
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
