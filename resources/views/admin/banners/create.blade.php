@extends ('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between py-3">
                <h3 class="mb-0">Add New Banner</h3>
                <a href="{{ url('admin/banner/create')}}" class="btn btn-primary text-white float-end">Back</a>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-warning mb-3">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
                <form action="{{ url('admin/banner') }}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            <label class="col-form-label">Banner Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>    
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="col-form-label">Banner Slug</label>
                            <div class="col-sm-10">
                                <input type="text" name="slug" class="form-control">
                                @error('slug')
                                <small class="text-danger">{{$message}}</small>    
                                @enderror
                            </div>
                        </div>
                    </div>
                   
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            <label class="me-3">Brand</label>
                            <select name="brand_id" class="form-conrol p-2">
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                  
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                        <label class="col-form-label">Banner Description</label>
                        <div class="col-sm-10">
                            <textarea rows="5" name="description" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label class="col-form-label">Other Description</label>
                        <div class="col-sm-10">
                            <textarea rows="5" name="other_description" class="form-control"></textarea>
                        </div>
                    </div>
                    </div>                    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Banner Video URL</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="text" name="video_url" class="form-control">                               
                            </div>
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Vanner Video</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="file" name="video" class="form-control">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-12 ">
                        <button type="submit" class="btn btn-primary text-white">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection