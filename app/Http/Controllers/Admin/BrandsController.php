<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BrandFormRequest;
use Illuminate\Support\Str;
use App\Models\Brands;
use Illuminate\Support\Facades\File;


class BrandsController extends Controller
{
    public function index(){
        return view('admin.brand.index');
    }

    public function create(){
        return view('admin.brand.create');
    }

    public function store( BrandFormRequest $request ){
        $validatedData = $request->validated();
        $brand = new Brands;

        $brand->name = $validatedData['name'];
        $brand->slug = Str::slug($validatedData['slug']);
        $brand->description = $validatedData['description'];
        $brand->about_brand = $validatedData['about_brand'];    
        $brand->other_description = $validatedData['other_description'];
        $brand->short_description = $validatedData['short_description'];
        $brand->address = $validatedData['address'];
        $brand->housenumber = $validatedData['housenumber'];    
        $brand->postalcode = $validatedData['postalcode'];
        $brand->city = $validatedData['city'];
        $brand->phonenumber = $validatedData['phonenumber'];
        $brand->mobile = $validatedData['mobile'];
        $brand->email = $validatedData['email'];       

        if($request-> hasFile('logo')){
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            
            $file->move('uploads/brand/', $filename);
            $brand->logo = $filename;
        }
        
        if($request-> hasFile('bandr_image')){
            $file = $request->file('bandr_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            
            $file->move('uploads/brand/', $filename);
            $brand->logo = $filename;
        }

        if($request-> hasFile('Vedio')){
            $file = $request->file('Vedio');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            
            $file->move('uploads/brand/', $filename);
            $brand->Vedio = $filename;
        }       
   
        $brand->meta_title = $validatedData['meta_title'];
        $brand->meta_keyword = $validatedData['meta_keyword'];
        $brand->meta_description = $validatedData['meta_description'];   
 
        $brand->save();

        return redirect('admin/brand')-> with('message', 'Brand Added');
       
    }


    
    public function edit(Brands $brand ){
        return view('admin.brand.edit', compact('brand')) ;
    }


    public function update( BrandFormRequest $request, $brand ){
        $validatedData = $request->validated();
        $brand =  Brands::findOrFail($brand);

       
        $brand->name = $validatedData['name'];
        $brand->slug = Str::slug($validatedData['slug']);
        $brand->description = $validatedData['description'];
        $brand->about_brand = $validatedData['about_brand'];    
        $brand->other_description = $validatedData['other_description'];
        $brand->short_description = $validatedData['short_description'];
        $brand->address = $validatedData['address'];
        $brand->housenumber = $validatedData['housenumber']; 
        $brand->postalcode = $validatedData['postalcode'];

        $brand->city = $validatedData['city'];
        $brand->phonenumber = $validatedData['phonenumber'];
        $brand->mobile = $validatedData['mobile'];
        $brand->email = $validatedData['email'];  

        if($request-> hasFile('logo')){
            $path = 'uploads/brand/'.$brand->logo;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            
            $file->move('uploads/brand/', $filename);
            $brand->logo = $filename;
        }

        if($request-> hasFile('bandr_image')){
            $path = 'uploads/brand/'.$brand->bandr_image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('bandr_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            
            $file->move('uploads/brand/', $filename);
            $brand->bandr_image = $filename;
        }

        if($request-> hasFile('Vedio')){
            $path = 'uploads/brand/'.$brand->Vedio;
            if(File::exists($path)){
                File::delete($path);
            }
            $file2 = $request->file('Vedio');
            $ext = $file2->getClientOriginalExtension();
            $filename2 = time().'.'.$ext;
            
            $file2->move('uploads/brand/', $filename2);
            $brand->Vedio = $filename2;
        }       
   
        $brand->meta_title = $validatedData['meta_title'];
        $brand->meta_keyword = $validatedData['meta_keyword'];
        $brand->meta_description = $validatedData['meta_description'];
   
 
        $brand->update();

        return redirect('admin/brand')-> with('message', 'Brand Update');
    }
}
