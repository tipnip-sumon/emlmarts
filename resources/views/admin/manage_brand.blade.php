@extends('admin/layout')
@section('page_title','Manage Brand')
@section('container')
<section class="content-main">
    {{session('message')}}
    <div class="content-header">
        
        <div>
            <h2 class="content-title card-title">Categories</h2>
        </div>
        <div>
            <input type="text" placeholder="Search Categories" class="form-control bg-white" />
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{url('admin/brand')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- @dd($data->brand_image) --}}
                        <input type="hidden" id="id" name="id" value="{{$data->id}}"/>
                        
                        <div class="mb-4">
                            <label for="brand_name" class="form-label">Brand Name</label>
                            <input type="text" placeholder="Type here" value="{{$data->brand_name}}"  class="form-control" id="brand_name" name="brand_name"/>
                        </div>
                        @error('brand_name')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        
                        <div class="card mb-4">
                            <div class="left" style="height: 50px;width:50px;">
                                <img src="{{asset('storage/media/brand/'.$data->brand_image)}}"  alt="Item" />
                                <input class="form-control" type="file" id="image" name="image"/>
                            </div>
                            @error('image')
                            <div class="mb-4 atert alert-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Update Brand</button>
                        </div>
                    </form>
                </div>
                <!-- .col// -->
            </div>
            <!-- .row // -->
        </div>
        <!-- card body .// -->
    </div>
    <!-- card .// -->
</section>

@endsection