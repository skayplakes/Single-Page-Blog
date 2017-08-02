<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Table name 
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * 
     * Mass attributes
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * ELoquent Model (Many to Many) 
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
    	return $this->belongsToMany('App\Models\Post', 'post_tag', 'tag_id');
    }

    /**
     * Pivot table 
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postTags()
    {
    	return $this->HasMany('App\Models\PostTag', 'tag_id');
    }

    /**
     * Mutate space to hyphen ('-') in name column 
     *
     * @param $value
     */
    public function setNameAttribute($value)
    {
    	$this->attributes['name'] = str_replace(' ', '-', $value);
    }

}
