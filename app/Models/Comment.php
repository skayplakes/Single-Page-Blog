<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Table name 
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * Hidden attributes
     * 
     * @var array
     */
    protected $hidden = ['origin'];

    /**
     * Mass attributes 
     *
     * @var array
     */
    protected $fillable = ['post_id', 'name', 'email', 'blog', 'origin', 'content', 'parent_id', 'valid', 'seen'];

    /**
     * Eloquent Model 
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
    	return $this->belongsTo('App\Models\Post');
    }

    public function parent()
    {
    	return $this->hasOne('App\Models\Comment', 'id', 'parent_id')->select('id', 'name');
    }
}
