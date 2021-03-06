<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'article_id'
    ];

    /**
     * Relationship to link an article to a user
     */
    public function user()
    {
        // Create relationship with user
    }
}
