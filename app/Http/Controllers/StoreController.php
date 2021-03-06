<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\Tag;

class StoreController extends Controller
{
    
    public function index()
    {
    	$pFeatured = Product::featured()->get();

    	$pRecommended = Product::recommend()->get();

    	$categories = Category::all();

    	return view('store.index', compact('categories', 'pFeatured', 'pRecommended'));
    }

    public function category($id)
    {
    	$categories = Category::all();
    	$category = Category::find($id);
    	$products = Product::ofCategory($id)->get();

    	return view('store.category', compact('categories', 'products', 'category'));
    }

    public function product($id)
    {
        $categories = Category::all();
        $product = Product::find($id);

        return view('store.product', compact('categories', 'product'));
    }

    public function tag($id)
    {
        $tag = Tag::find($id);
        $tags = Tag::all();
        //dd($tag->products);
        return view('store.product_tag', compact('tag', 'tags'));
    }
}
