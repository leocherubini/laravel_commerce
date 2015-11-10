<?php

namespace CodeCommerce\Http\Controllers;

use Illuminate\Http\Request;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use CodeCommerce\Category;
use Illuminate\Routing\Redirector;

class CategoriesController extends Controller
{

	/**
	 * @var Category
	 */
	private $categoryModel;

	public function __construct(Category $categoryModel)
	{
		$this->categoryModel = $categoryModel;
	}
    
    public function index()
    {
    	$categories = $this->categoryModel->all();

    	return view('categories.index', compact('categories'));
    }

    public function create()
    {
    	return view('categories.create');
    }

    public function store(Requests\CategoryRequest $request, Redirector $redirector)
    {
    	$input = $request->all();

    	$category = $this->categoryModel->fill($input);

    	$category->save();

    	return $redirector->route('categories');
    }

    public function edit($id)
    {
    	$category = $this->categoryModel->find($id);

    	return view('categories.edit', compact('category'));
    }

    public function update(Requests\CategoryRequest $request, Redirector $redirector, $id)
    {
    	$this->categoryModel->find($id)->update($request->all());

    	return $redirector->route('categories');
    }

    public function destroy(Redirector $redirector, $id)
    {
    	$this->categoryModel->find($id)->delete();

    	return $redirector->route('categories');
    }
}
