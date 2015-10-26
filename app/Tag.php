<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function products()
    {
    	return $this->belongsToMany(Product::class);
    }

    public function saveTags($tags)
    {
        $tags = array_unique(array_map(function ($str) {
            return ucwords(strtolower(preg_replace('/\s+/', ' ', trim($str))));
        },
        
        explode(',', $tags)));

        $tagIds = [];
        foreach ($tags as $tag){
            if($tag != "")
                array_push($tagIds, $this->firstOrCreate(['name' => $tag])->id);
        }

        return $tagIds;
    }

}
