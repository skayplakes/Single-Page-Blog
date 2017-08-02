<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Table 
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Mass attributes 
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Eloquent Model 
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
    	return $this->hasMany('App\Models\Post');
    }

    /**
     * Mutate space to hyphen('-') in name column 
     *
     * @param value
     */
    public function setNameAttribute($value)
    {
    	$this->attributes['name'] = str_replace(' ', '-', $value);
    }
}
