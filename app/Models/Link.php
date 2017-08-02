<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /**
     * Table name 
     *
     * @var string
     */
    protected $table = 'links';

    /**
     * Mass attributes 
     *
     * @var array
     */
    protected $fillable = ['name', 'link'];
}
