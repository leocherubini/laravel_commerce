<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
    	'description'
    ];

    /*
     * Relacionamento hasMany com model Product
     */
    public function products()
    {
    	return $this->hasMany(Product::class);
    }
    
}
