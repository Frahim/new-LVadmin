@extends ('layouts.admin')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between py-3">
                    <h3 class="mb-0">Add Products</h3>
                    <a href="{{ url('admin/products') }}" class="btn btn-primary text-white float-end">Back</a>
                </div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li><a class="active" href="#info-pills" data-toggle="tab">Product Info</a></li> 
                    <li class=""><a href="#price-pills" data-toggle="tab">Price</a></li>
                    <li class=""><a href="#variation-pills" data-toggle="tab">Variation</a></li>                   
                    <li class=""><a href="#image-pills" data-toggle="tab">Product Images</a></li>
                    <li class=""><a href="#seo-pills" data-toggle="tab">SEO</a></li>
                </ul>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-warning mb-3">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="tab-content">
                            <div class="tab-pane fade in active show" id="info-pills">
                                <div class="my-3 row">                                   
                                    <div class="col-sm-12 col-md-6">
                                        <label class="col-12">Product Name</label>
                                        <input type="text" name="name" class="form-control col-12" />
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label>Product Slug</label>
                                        <input type="text" name="slug" class="form-control col-12" />
                                    </div>
                                </div>

                                <div class="my-3 row"> 
                                    <div class="col-sm-12 col-md-6">
                                    <label class="col-12 me-3">Brand</label>
                                    <select name="col-12 brand_id" class="form-conrol p-2">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label class="col-12 me-3">Category</label>
                                        <select name="category" class="form-conrol p-2">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>
                                
                               
                                <div class="my-3 row"> 
                                    <div class="col-sm-12 col-md-6">
                                        <label> Product Description</label>
                                        <textarea type="textarea" name="description" class="form-control" ></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label> Product Short Description</label>
                                        <textarea type="text" name="other_description" class="form-control" ></textarea>
                                    </div>
                                </div>
                                <div class="my-3 row"> 
                                    <div class="col-sm-12 col-md-6">
                                        <label> Product Description</label>
                                        <textarea type="textarea" name="description" class="form-control" ></textarea>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label> Product Short Description</label>
                                        <textarea type="text" name="other_description" class="form-control" ></textarea>
                                    </div>
                                </div>                              
                                
                            </div>
                            <div class="tab-pane fade in" id="price-pills">
                                <div class="my-3 row"> 
                                    <div class="col-sm-12 col-md-6">
                                        <label> Product Regular Price</label>
                                        <input type="text" name="orginal_price" class="form-control" />
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label> Product Selling Price</label>
                                        <input type="text" name="selling_price" class="form-control" />
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <label> Product Quantity</label>
                                        <input type="text" name="quantity" class="form-control" />
                                    </div>
                                </div>
                                
                            </div>
                            <div class="tab-pane fade in" id="variation-pills">
                                <div class="my-3">
                                    <label class="col-sm-2 col-form-label">Variation </label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text"  name="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                           

                            <div class="tab-pane fade in" id="image-pills">
                                <div class="my-3">
                                    <label class="col-sm-2 col-form-label">Product Image</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="file" multiple name="image[]" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade in" id="seo-pills">
                                <div class="my-3">
                                    <label> Product Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" />
                                </div>
                                <div class="my-3">
                                    <label> Product Meta Keyword</label>
                                    <input type="text" name="meta_keyword" class="form-control" />
                                </div>
                                <div class="my-3">
                                    <label> Product Meta Description</label>
                                    <input type="text" name="meta_description" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
