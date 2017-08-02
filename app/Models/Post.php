<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    /**
     * Table name 
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * Mass attributes 
     *
     * @var array
     */
    protected $fillable = ['title', 'slug', 'summary', 'origin', 'body', 'category_id', 'published'];

    /**
     * Hidden attributes 
     *
     * @var array
     */
    protected $hidden = ['deleted_at'];

    protected $casts = [
    	'published' => 'boolean'
    ];

    /**
     * Eloquent Model (Many to Many) 
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
    	return $this->belongsToMany('App\Models\Tag', 'post_tag', 'post_id');
    }

    /**
     * Eloquent Model (One to Many) 
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
    	return $this->belongsTo('App\Models\Category');
    }

    /**
     * Eloquent Model (One to Many)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
    	return $this->hasMany('App\Models\Comment');
    }

    /**
     * Guest Scope 
     *
     * @param \Illuminate\Database\Eloquent\Builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeShow($query)
    {
    	return $query->select([
    		'id', 'slug', 'title', 'body', 'category_id', 'comment_count', 'view_count', 'favorite_count', 'created_at'
    		])->wherePublished(1);
    }

    /**
     * Guest list scope 
     *
     * @param \Illuminate\Database\Eloquent\Builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeList($query)
    {
    	return $query->select([
    		'id', 'slug', 'title', 'summary', 'comment_count', 'view_count', 'favorite_count', 'created_at'
    		])->wherePublished(1);
    }

    /**
     * Manager scope 
     *
     * @param \Illuminate\Database\Eloquent\Builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeManage($query)
    {
    	return $query->select('id', 'slug', 'title', 'published', 'created_at');
    }
}
