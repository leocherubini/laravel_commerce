<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Storage as Factory;

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

    public function scopeFeatured($query)
    {
        return $query->where('featured', '=', 1);
    }

    public function scopeRecommended($query)
    {
        return $query->where('recommended', '=', 1);
    }

    public function scopeOfCategory($query, $type)
    {
        return $query->where('category_id', '=', $type);
    }

    public function scopeRecommend($query)
    {
        return $query->where('recommend', '=', 1);
    }

    public function destroyImages()
    {

        foreach ($this->images as $image) {

            if (Storage::disk()->exists($image->id . '.' . $image->extension)) {
                Storage::disk()->delete($image->id . '.' . $image->extension);
            }

        }

        return true;
    }

    /**
     * Escopo responsavel por retornar o caminha do AWS S3
     *
     * @return String
     */
    public function scopePathImage()
    {
        $caminho = env('STORAGE_URL', 'http://localhost:8000/uploads/');
        return $caminho;
    }

}
