<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getTagListAttribute()
    {
        $tags = $this->tags->lists('name')->toArray();

        return implode(',',$tags);
    }

    public function destroyImages()
    {

        foreach ($this->images as $image) {

            if (Storage::disk('s3')->exists($image->id . '.' . $image->extension)) {
                Storage::disk('s3')->delete($image->id . '.' . $image->extension);
            }
            
            // if (file_exists(public_path() . '/uploads/' . $image->id . '.' . $image->extension)) {
            //     Storage::disk('public_local')->delete($image->id . '.' . $image->extension);
            // }
        }

        return true;
    }

}
