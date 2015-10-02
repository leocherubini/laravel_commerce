<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;

class WelcomeController extends Controller
{

	/**
	 * @var Category
	 */
	private $category;

	public function __construct(Category $category)
	{
		$this->category = $category;
	}
    
    public function index()
    {
    	return view('welcome');
    }

    public function exemplo()
    {
    	$categories = $this->category->all();

    	return view('exemplo', compact('categories'));
    }

}
