<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = 
    [
    	'name',
    ];
    public function subcategories()
    {
    	return $this->hasManyThrough(
    		'App\Subcategory',
    		'App\Item',
    		'category_id',
    		'category_id',
    		'id',
    		'id'
    		);
    }
}
