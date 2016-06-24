<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\Http\Requests\AddProductRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function store(){



        // getting all of the post data
        $data = array('product_name' => Input::get('product_name'), 'product_description' => Input::get('product_name'), 'product_image' => Input::file('product_image'));
        // setting up rules
        $rules = array('product_name' => 'required', 'product_description' => 'required', 'product_image' => 'required|image'); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return redirect()->back()->withInput()->withErrors($validator);
        }
        else {


            // checking file is valid.
            if (Input::file('product_image')->isValid()) {
                $destinationPath = 'uploads'; // upload path
                $extension = Input::file('product_image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('product_image')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message

                \Auth::user()->products()->create([

                    'product_name' => Input::get('product_name'),
                    'product_description' => Input::get('product_description'),
                    'product_image'    => $fileName,
                    'category_id'      => Input::get('category'),
                    'product_price'    => Input::get('product_price')


                ]);

                Session::flash('flash_message', 'Product was uploaded successfully');
                return redirect()->back();
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return redirect()->back();
            }
        }
    }

    public function update($product_id){

        $product = Product::findOrFail($product_id);


        if(Input::file('product_image') == null){

            $fileName = Input::get('set_image');

            // getting all of the post data
            $data = array('product_name' => Input::get('product_name'), 'product_description' => Input::get('product_name'), 'product_image' => Input::file('product_image'));
            // setting up rules
            $rules = array('product_name' => 'required', 'product_description' => 'required', 'product_image' => 'image'); //mimes:jpeg,bmp,png and for max size max:10000
            // doing the validation, passing post data, rules and the messages
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                // send back to the page with the input data and errors
                return redirect()->back()->withInput()->withErrors($validator);
            }
            else {


                    $product->update([

                        'product_name' => Input::get('product_name'),
                        'product_description' => Input::get('product_description'),
                        'product_image'    => $fileName,
                        'category_id'      => Input::get('category'),
                        'product_price'    => Input::get('product_price')


                    ]);

                    Session::flash('flash_message', 'Product was uploaded successfully');
                    return redirect()->back();


        }}else{

        // getting all of the post data
        $data = array('product_name' => Input::get('product_name'), 'product_description' => Input::get('product_name'), 'product_image' => Input::file('product_image'));
        // setting up rules
        $rules = array('product_name' => 'required', 'product_description' => 'required', 'product_image' => 'image'); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return redirect()->back()->withInput()->withErrors($validator);
        }
        else {


            // checking file is valid.
            if (Input::file('product_image')->isValid()) {
                $destinationPath = 'uploads'; // upload path
                $extension = Input::file('product_image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('product_image')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message

                $product->update([

                    'product_name' => Input::get('product_name'),
                    'product_description' => Input::get('product_description'),
                    'product_image'    => $fileName,
                    'category_id'      => Input::get('category'),
                    'product_price'    => Input::get('product_price')


                ]);

                Session::flash('flash_message', 'Product was uploaded successfully');
                return redirect()->back();
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return redirect()->back();
            }
        }
        }


    }

    public function delete($product_id){

        $product = Product::findOrFail($product_id);

        $product->delete();

        Session::flash('flash_message', 'Product deleted successfully');

        return  redirect()->back();
    }

    public function edit($product_id){

        $product = Product::findOrFail($product_id);

        $categories = Category::all();


        return view('product.edit', compact('product', 'categories'));

    }

    public function show($product_id){

        $product = Product::findOrFail($product_id);

        $categories = Category::all();
        return view('product.show', compact('product', 'categories'));

    }
}
