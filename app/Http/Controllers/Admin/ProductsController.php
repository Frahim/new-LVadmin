<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brands;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Resources\ProductResource;
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
        return view('admin.products.create', compact('brands', 'categories'));
    }

    public function store(ProductFormRequest $request)
    {

        $validatedData = $request->validated();
        $brand = Brands::findOrFail($validatedData['brand_id']);
        if ($request->hasFile('pf_image')) {
            $image = $request->file('pf_image');
            $imageExtension = $image->getClientOriginalExtension();
            $newImageName = time() . '.' . $imageExtension;
        }


        $categoryIds = $validatedData['category'];
        // Find the corresponding Category models
        $categories = Category::whereIn('id', $categoryIds)->get();
        // Create an array to store the category names
        $categoryNames = [];
        // Iterate through the categories and retrieve their names
        foreach ($categories as $category) {
            $categoryNames[] = $category->slug;
        }
        // Convert the category names array to a comma-separated string
        $categoryString = implode(', ', $categoryNames);


        $product = $brand->products()->create([
            'brand_id' => $validatedData['brand_id'],
            'category' => $categoryString,
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'type' => $validatedData['type'],
            'orginal_price' => $validatedData['orginal_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'description' => $validatedData['description'],
            'disease' => $validatedData['disease'],
            'variety' => $validatedData['variety'],
            'sorting' => $validatedData['sorting'],
            'pod' => $validatedData['pod'],
            'plant' => $validatedData['plant'],

            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
            'pf_image' =>  $image->move('uploads/products', $newImageName),
        ]);




        return Redirect('admin/products')->with('message', 'Product Added Sucessfilly');
    }

    public function edit(int $product_id)
    {
        $brands = Brands::all();
        $categories = Category::all();

        $product = Product::findOrFail($product_id);
        $selectedCategories = explode(', ',  $product->category); // Assuming category IDs are stored as a comma-separated string

        return view('admin.products.edit', compact('brands', 'product', 'categories', 'selectedCategories'));
    }

    public function update(ProductFormRequest $request, int $product_id)
{
    $validatedData = $request->validated();
    $product = Product::findOrFail($product_id); // Find the product using its ID

    // Handle the image only if a new image file is uploaded
    if ($request->hasFile('pf_image')) {
        $path = 'uploads/products/' . $product->pf_image;

        if (File::exists($path)) {
            File::delete($path); // Delete the old image file
        }

        $image = $request->file('pf_image');
        $imageExtension = $image->getClientOriginalExtension();
        $newImageName = time() . '.' . $imageExtension;

        $image->move('uploads/products', $newImageName); // Move the new image to the desired location
        $product->pf_image = $newImageName; // Update the product's image field with the new image name
    }

    // Update the product with the validated data
    $product->update([
        'brand_id' => $validatedData['brand_id'],
        'category' => $validatedData['category'],
        'name' => $validatedData['name'],
        'slug' => Str::slug($validatedData['slug']),
        'type' => $validatedData['type'],
        'orginal_price' => $validatedData['orginal_price'],
        'selling_price' => $validatedData['selling_price'],
        'quantity' => $validatedData['quantity'],
        'description' => $validatedData['description'],
        'disease' => $validatedData['disease'],
        'variety' => $validatedData['variety'],
        'sorting' => $validatedData['sorting'],
        'pod' => $validatedData['pod'],
        'plant' => $validatedData['plant'],            
        'meta_title' => $validatedData['meta_title'],
        'meta_keyword' => $validatedData['meta_keyword'],
        'meta_description' => $validatedData['meta_description']
    ]);

    return redirect('admin/products')->with('message', 'Product Update Successfully');
}




}
