<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
    	'extension'
    ];

    public function product()
    {
    	return $this->belongsTo('CodeCommerce\Product');
    }

}
