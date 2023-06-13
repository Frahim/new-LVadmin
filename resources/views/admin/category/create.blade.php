@extends ('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between py-3">
                <h3 class="mb-0">Add New Category</h3>
                <a href="{{ url('admin/category/create')}}" class="btn btn-primary text-white float-end">Back</a>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/category') }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Category Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control">
                            @error('name')
                            <small class="text-danger">{{$message}}</small>    
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Category Slug</label>
                        <div class="col-sm-10">
                            <input type="text" name="slug" class="form-control">
                            @error('slug')
                            <small class="text-danger">{{$message}}</small>    
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">category Description</label>
                        <div class="col-sm-10">
                            <textarea rows="5" name="description" class="form-control"></textarea>
                        </div>
                    </div>                   
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Category Image</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="file" name="cat_iamge" class="form-control">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                        </div>
                    </div>

                    
                    <div class="row mb-3 mt-5">
                        <div class="col-12 alert alert-danger">
                            <h3>SEO Section</h3>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Meta Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="meta_title" class="form-control">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Meta Keyword</label>
                        <div class="col-sm-10">
                            <input type="text" name="meta_keyword" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Meta Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="meta_description" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12 ">
                            <button type="submit" class="btn btn-primary text-white float-end">Save</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection