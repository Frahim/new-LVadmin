<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brands;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProductFormRequest;

class ProductsController extends Controller
{
    public function index()
    {
       $products = Product::all();
       return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brands::all();
        $categories = Category::all();
        return view('admin.products.create', compact('brands','categories'));
    }

    public function store(ProductFormRequest $request)
    {
       
       $validatedData = $request->validated();
       
       $brand = Brands::findOrFail($validatedData['brand_id']);  
        $product = $brand->products()->create([
            'brand_id' => $validatedData['brand_id'],
            'category' => $validatedData['category'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'type' => $validatedData['type'],          
            'orginal_price'=> $validatedData['orginal_price'],
            'selling_price'=> $validatedData['selling_price'],
            'quantity'=> $validatedData['quantity'],          
            'description'=> $validatedData['description'],
            'disease'=> $validatedData['disease'], 
            'variety'=> $validatedData['variety'], 
            'sorting'=> $validatedData['sorting'], 
            'pod'=> $validatedData['pod'], 
            'plant'=> $validatedData['plant'], 
                 
            'meta_title'=> $validatedData['meta_title'],
            'meta_keyword'=> $validatedData['meta_keyword'],
            'meta_description'=> $validatedData['meta_description'],
       ]);

       if($request->hasFile('image')){
        $uploadPath = 'uploads/products/';

        $i =1;
        foreach($request->file('image') as $imageFile){
            $extention = $imageFile-> getClientOriginalExtension();
            $filename = time().$i++.'.'.$extention;
            $imageFile-> move($uploadPath, $filename);
            $finalImagePathName = $uploadPath.$filename;

            $product->productImages()->create([
                'product_id' => $product->id,
                'image' => $finalImagePathName,
            ]);
        } 
       }

       return Redirect('admin/products')->with('message','Product Added Sucessfilly');
    }

    public function edit(int $product_id)
    {
        $brands = Brands::all();
        $product = Product::findOrFail($product_id);
        return view('admin.products.edit', compact('brands','product'));
    }
}
