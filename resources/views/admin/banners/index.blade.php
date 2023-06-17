@extends ('layouts.admin')

@section('content')
    <div class="row">
        @if (session('message'))
            <div class="col-md-10 alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center py-2">
                    <h3 class="m-0 align-middle">Banners</h3>
                    <a href="{{ url('admin/banner/create') }}" class="btn btn-primary btn-sm float-end">Add Banner</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table  table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Video Link</th>
                                    <th scope="col">Video</th>                                    
                                    <th scope="col">Description</th>  
                                    <th scope="col">Short  Description</th> 
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banners as $banner)
                                    <tr>
                                        <td>{{ $banner->id }}</td>
                                        <td>{{ $banner->name }}</td>
                                        <td>
                                            @if($banner->brand)
                                            {{ $banner->brand->name }}
                                            @else 
                                            No Brand Silected
                                            @endif
                                        </td>
                                        <td>{{ $banner->video_url}}</td>
                                        <td>{{ $banner->video }}</td>                                        
                                        <td>{{ $banner->description }}</td>
                                        <td>{{ $banner->other_description }}</td>
                                        <td>
                                           
                                        </td>
                                        <td>
                                            <div class="editDelet">
                                            <a href="{{ url('admin/banner/' . $banner->id . '/edit') }}"
                                                class="btn btn-success">Edit</a>
                                                <form action="{{ url('admin/banner/'.$banner->id.'',  ) }}" method="post">
                                                    @csrf
                                                    @method('delete')
            
                                                    <div class="btn btn-danger ">
                                                        <input type="submit" class="btn" value="Delete" />
                                                    </div>
                                                </div>
                                                  </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        <div class="col-12 my-3">
                        {{-- {{ $Banners->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
