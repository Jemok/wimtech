<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AddCategoryRequest;
use Illuminate\Support\Facades\Session;


class CategoriesController extends Controller
{
    public function store(AddCategoryRequest $addCategoryRequest){

        \Auth::user()->categories()->create($addCategoryRequest->all());

        Session::flash('flash_message', 'Category was created successfully');

        return redirect()->back();

    }


    public function index($category_id){

        $products = Product::where('category_id', '=', $category_id)->latest()->paginate(12);

        $category_name = Category::where('id', '=', $category_id)->first()->category_name;

        $categories = Category::paginate(6);

        return view('laptops.index', compact('products', 'category_name', 'categories'));
    }
    

    public function create(){

        return view('category.create');
    }
}
