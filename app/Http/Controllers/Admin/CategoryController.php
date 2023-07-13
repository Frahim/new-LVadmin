<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();      
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $validatedData = $request->validated();
        $category = new Category;
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description']; 

        if ($request->hasFile('cat_image')) {
            $file = $request->file('cat_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/category/', $filename);
            $category->cat_image = $filename;
        }         
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];   
        $category->save();
        return redirect('admin/category')-> with('message', 'Category Added');
    }


    public function edit(Category $category ){
        return view('admin.category.edit', compact('category')) ;
    }


    public function update( CategoryFormRequest $request, $category ){
        $validatedData = $request->validated();
        $category =  Category::findOrFail($category);
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description']; 

        if ($request->hasFile('cat_image')) {
            $path = 'uploads/category/' . $category->cat_image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('cat_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/category/', $filename);
            $category->cat_image = $filename;
        }
          
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];        
 
        $category->update();

        return redirect('admin/category')-> with('message', 'Category Update');
    }

    public function destroy(int $category_id) {
        $category = Category::find($category_id);

        $category->delete();
        return redirect('admin/category')->with('message', 'Category Deleted Successfully');
    }
}
