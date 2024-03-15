@extends('admin/layout')
@section('page_title','Brand')
@section('brand_active','active')
@section('container')
<section class="content-main">
    {{session('message')}}
    <div class="content-header">
        
        <div>
            <h2 class="content-title card-title">Brand</h2>
            <p>Add Brand</p>
        </div>
        <form action="" class="col-9">
            <div>
                <input type="text" placeholder="Search Brand" name="search" id="search" class="form-control bg-white" value="{{$search}}"/>
            </div>
            <button class="btn btn-primary mt-5">Search</button>
            <a href="{{url('/admin/brand')}}">
                <button class="btn btn-danger mt-5" type="button">Reset</button>
            </a>
        </form>
    </div>
    {{session('message')}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{route('admin.insert')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="brand_name" class="form-label">Brand Name</label>
                            <input type="text" placeholder="Type here"  class="form-control" id="brand_name" name="brand_name"/>
                        </div>
                        @error('brand_name')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="image" class="form-label">Brand Images</label>
                            <div class="input-upload">
                                <input class="form-control" type="file" id="image" name="image"/>
                            </div>
                        </div>
                        @error('image')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="is_home" class="form-label">Show Brand</label>
                            <select class="form-select" id="is_home" name="is_home">
                                <option selected value="0">No</option>
                                <option  value="1">Yes</option>
                            </select>
                        </div>
                        @error('is_home')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Create Brand</button>
                        </div>
                        
                    </form>
                </div>
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </th>
                                    <th>ID</th>
                                    <th>Brand Name</th>
                                    <th>Image</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brand as $show)
                                <tr>
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </td>
                                    <td>{{$show['id']}}</td>
                                    <td><b>{{$show['brand_name']}}</b></td>
                                    <td>
                                        <div class="left" style="height: 50px;width:50px;">
                                            <img src="{{asset('storage/media/brand/'.$show->brand_image)}}"  alt="Item" />
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">View detail</a>
                                                <a class="dropdown-item" href="{{url('admin/manage_brand/')}}/{{$show['id']}}">Edit info</a>
                                                @if($show['status']==1)
                                                <a class="dropdown-item text-success" href="{{url('admin/brand/status/0')}}/{{$show['id']}}">Active</a>
                                                @elseif($show['status']==0)
                                                <a class="dropdown-item text-danger" href="{{url('admin/brand/status/1')}}/{{$show['id']}}">Deactivate</a>
                                                @endif
                                                <a class="dropdown-item text-danger" href="{{url('admin/brand/delete')}}/{{$show['id']}}">Delete</a>
                                            </div>
                                        </div>
                                        <!-- dropdown //end -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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