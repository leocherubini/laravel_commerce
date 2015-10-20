<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
    	'name',
    	'description',
    	'price',
        'featured',
        'recommend'
    ];

    public function images()
    {
        return $this->hasMany('CodeCommerce\ProductImage');
    }

    /*
     * Relacionamento belongsTo com model Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
