<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pages;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PageFormRequest;
use Illuminate\Support\Facades\File;
class PagesController extends Controller
{
    public function index()
    {
       $pages = Pages::all();
       return view('admin.pages.index', compact('pages'));
    }

    public function create()    {        
        return view('admin.pages.create');
    }

    public function store( PageFormRequest $request)
    {
        $validatedData = $request->validated();       

        $pages = new Pages;

        $pages->name = $validatedData['name'];       
        $pages->slug = Str::slug($validatedData['slug']);
        $pages->page_content = $validatedData['page_content'];
        $pages->page_other_content = $validatedData['page_other_content'];
        $pages->video_url = $validatedData['video_url'];
        $pages->meta_title = $validatedData['meta_title'];
        $pages->meta_keyword = $validatedData['meta_keyword'];
        $pages->meta_description = $validatedData['meta_description'];   
        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/pages/', $filename);
            $pages->banner_image = $filename;
        }
        $pages->save();
        return redirect('admin/pages')->with('message', 'Page Added');
    }

    public function edit(int $page_id ){
     
        $page= Pages::findOrFail($page_id);
        return view('admin.pages.edit', compact('page')) ;
    }

    public function update( int $page_id, PageFormRequest $request){
        $validatedData = $request->validated();
        $page = Pages::findOrFail($page_id);
        if($page)
        {
            $page->update([                
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'page_content'=> $validatedData['page_content'],
                'page_other_content'=> $validatedData['page_other_content'],  
                'video_url'=> $validatedData['video_url'],  
                'meta_title'=> $validatedData['meta_title'],
                'meta_keyword'=> $validatedData['meta_keyword'],  
                'meta_description'=> $validatedData['meta_description'],                                              
            ]);

            if ($request->hasFile('banner_image')) {
                $path = 'uploads/pages/' . $page->banner_image;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $file = $request->file('banner_image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
    
                $file->move('uploads/pages/', $filename);
                $page->logo = $filename;
            }
        
               return redirect('admin/pages')->with('message','Update Sucessfilly');
        }
        else
        {
            return redirect('admin/pages')->with('message','No Such Page or ID found');
        }
    }

    public function destroy(int $page_id) {
        $page = Pages::find($page_id);

        $page->delete();
        return redirect('admin/pages')->with('message', 'Page Deleted Successfully');
    }
}
