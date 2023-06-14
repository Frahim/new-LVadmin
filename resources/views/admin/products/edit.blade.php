@extends ('layouts.admin')

use

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between py-3">
                    <h3 class="mb-0">Edit Products</h3>
                    <a href="{{ url('admin/products') }}" class="btn btn-primary text-white float-end">Back</a>
                </div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li><a class="active" href="#info-pills" data-toggle="tab">Product Info</a>
                    </li>
                    <li class=""><a href="#seo-pills" data-toggle="tab">SEO</a>
                    </li>
                    <li class=""><a href="#variation-pills" data-toggle="tab">Variation</a>
                    </li>
                    <li class=""><a href="#image-pills" data-toggle="tab">Product Images</a>
                    </li>
                </ul>
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-warning mb-3">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ url('admin/products'. $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="tab-content">
                            <div class="tab-pane fade in active show" id="info-pills">
                                <div class="my-3">
                                    <label class="me-3">Brand</label>
                                    <select name="brand_id" class="form-conrol p-2">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected':''}}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="my-3">
                                    <label>Product Name</label>
                                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" />
                                </div>
                                <div class="my-3">
                                    <label>Product Slug</label>
                                    <input type="text" name="slug" value="{{ $product->slug }}" class="form-control" />
                                </div>



                                <div class="my-3">
                                    <label> Product Description</label>
                                    <input type="text" name="description" value="{{ $product->description }}" class="form-control" />
                                </div>
                                <div class="my-3">
                                    <label> Product Short Description</label>
                                    <input type="text" name="other_description" value="{{ $product->other_description }}" class="form-control" />
                                </div>
                                <div class="my-3">
                                    <label> Product Regular Price</label>
                                    <input type="text" name="orginal_price" value="{{ $product->orginal_price }}" class="form-control" />
                                </div>
                                <div class="my-3">
                                    <label> Product Selling Price</label>
                                    <input type="text" name="selling_price" value="{{ $product->selling_price }}" class="form-control" />
                                </div>
                                <div class="my-3">
                                    <label> Product Quantity</label>
                                    <input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control" />
                                </div>
                            </div>

                            <div class="tab-pane fade in" id="seo-pills">
                                <div class="my-3">
                                    <label> Product Meta Title</label>
                                    <input type="text" name="meta_title" value="{{ $product->meta_title }}" class="form-control" />
                                </div>
                                <div class="my-3">
                                    <label> Product Meta Keyword</label>
                                    <input type="text" name="meta_keyword" value="{{ $product->meta_keyword }}" class="form-control" />
                                </div>
                                <div class="my-3">
                                    <label> Product Meta Description</label>
                                    <input type="text" name="meta_description" value="{{ $product->meta_description }}" class="form-control" />
                                </div>
                            </div>

                            <div class="tab-pane fade in" id="variation-pills">
                                <div class="my-3">
                                    
                                </div>
                            </div>

                            <div class="tab-pane fade in" id="image-pills">
                                <label class="col-sm-2 col-form-label">Product Image</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <input type="file" multiple name="image[]" class="form-control">
                                    </div>
                                    <div class="my-3">
                                        @if ($product->productImages)
                                            @foreach ($product->productImages as $image)
                                            <img src="{{ asset($image->image ) }}" alt="Product Iamge" style="width: 200px; height:200px; object-fit:cover"/>
                                            @endforeach
                                        @else
                                        No image
                                        @endif
                                    </div>
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
