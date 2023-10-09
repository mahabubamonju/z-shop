<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('backend.product.index', ['products' => $products]);
    }

    public function create()
    {
        return view('backend.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | max:150',
            'price' => 'required | numeric | min:0 | not_in:0',
            'image' => 'image',
            'description' => 'max:20'
        ],[
            'title.required' => 'Sir Please Give A Title',
            'title.max' => 'Title must be less than 20 character',
        ]);

        
        $product = new Product();

        $product->title         = $request->title;
        $product->description   = $request->description;
        $product->price         = $request->price;
        $image                  = $request->image;

        if ($image) {
            $imgName = rand().'.'.$image->extension();
            $image->move('product-images/', $imgName);
            
            $product->image     = 'product-images/'.$imgName;

        }

        $product->save();
        return back()->with('notification', 'Product Added Successfully!');
    }

    public function edit(int $id)
    {
        $product = Product::where('id',$id)->first();
        return view('backend.product.edit',['product'=>$product]);
    }
  
    public function update(Request $request,int $id)
    {
        $request->validate([
            'title' => 'required | max:150',
            'price' => 'required | numeric | min:0 | not_in:0',
            'image' => 'image',
            'description' => 'max:20'
        ],[
            'title.required' => 'Sir Please Give A Title',
        ]);


        $product = Product::find($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
         // $product->image = $request->image;
         $image = $request->image;

         if($image){
            if(file_exists($product->image)){
                unlink($product->image);
            }

            $imgName = rand().'.'.$image->extension();
            $image->move('product-images/', $imgName);          
            $product->image     = 'product-images/'.$imgName;

         }
        $product->save();

        return to_route('products')->with('notification','Product Updated Successfully!');
    }

    public function show(int $id)
    {
        $product = Product::find($id);
        return view('frontend.product.details',['product' => $product]);
    }

    public function destroy(int $id)
    {
        $product = Product::find($id);
        if(file_exists($product->image)){
            unlink($product->image);
        }
        $product->delete();
        return back()->with('notification', 'Product Deleted Successfully!');
    }
}
