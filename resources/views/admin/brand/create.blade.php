@extends ('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between py-3">
                    <h3 class="mb-0">Add New Brand</h3>
                    <a href="{{ url('admin/brand/create') }}" class="btn btn-primary text-white float-end">Back</a>
                </div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active p-2"><a href="#home-pills" data-toggle="tab">Basick Info</a>
                    </li>
                    <li class="p-2"><a href="#profile-pills" data-toggle="tab">Media</a>
                    </li>
                    <li class="p-2"><a href="#messages-pills" data-toggle="tab">Address</a>
                    </li>
                    <li class="p-2"><a href="#settings-pills" data-toggle="tab">SEO</a>
                    </li>
                </ul>
                <div class="card-body">
                    <form action="{{ url('admin/brand') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active show" id="home-pills">
                                <h4>Basick Information</h4>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Brand Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Brand Slug</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="slug" class="form-control">
                                        @error('slug')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Brand Description</label>
                                    <div class="col-sm-10">
                                        <textarea rows="5" name="description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Other Description</label>
                                    <div class="col-sm-10">
                                        <textarea rows="5" name="other_description" class="form-control"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="profile-pills">
                                <h4>Media</h4>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Brand Logo</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="file" name="logo" class="form-control">
                                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Brand Video</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="file" name="Vedio" class="form-control">
                                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="messages-pills">
                                <h4>Address</h4>
                                <div class="row mb-3">   
                                    <div class="col-md-6 col-sm-12">                                 
                                        <label class="col-sm-10 col-form-label">Phone Number</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="phonenumber" class="form-control">
                                        </div>
                                     </div>
                                     <div class="col-sm-12 col-md-6">
                                        <label class="col-sm-12 col-form-label">Mobile</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="mobile" class="form-control">
                                    </div>
                                     </div>
                                </div>
                                <div class="row mb-3">   
                                    <div class="col-md-6 col-sm-12">                                 
                                        <label class="col-sm-10 col-form-label">Email</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="email" class="form-control">
                                        </div>
                                     </div>
                                     <div class="col-sm-12 col-md-6">
                                       
                                     </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 col-sm-12">                                 
                                        <label class="col-sm-10 col-form-label">Address</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="address" class="form-control">
                                        </div>
                                     </div>
                                     <div class="col-sm-12 col-md-6">
                                        <label class="col-sm-2 col-form-label">Postalcode</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="postalcode" class="form-control">
                                        </div>
                                     </div>
                                    
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 col-sm-12">                                 
                                        <label class="col-sm-10 col-form-label">City</label>
                                        <div class="col-sm-12">
                                            <input type="text" name="city" class="form-control">
                                        </div>
                                     </div>
                                     <div class="col-sm-12 col-md-6">
                                       
                                     </div>
                                    
                                </div>   

                            </div>

                            <div class="tab-pane fade" id="settings-pills">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Mobile</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="mobile" class="form-control">
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
