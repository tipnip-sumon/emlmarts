@extends('admin/layout')
@section('page_title','Category')
@section('cat_active','active')
@section('container')
<section class="content-main">
    {{session('message')}}
    <div class="content-header">
        
        <div>
            <h2 class="content-title card-title">Categories</h2>
            <p>Add Category</p>
        </div>
        <form action="" class="col-9">
            <div>
                <input type="text" placeholder="Search Category" name="search" id="search" class="form-control bg-white" value="{{$search}}"/>
            </div>
            <button class="btn btn-primary mt-5">Search</button>
            <a href="{{url('/admin/category')}}">
                <button class="btn btn-danger mt-5" type="button">Reset</button>
            </a>
        </form>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{route('admin.insert0')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text" placeholder="Type here"  class="form-control" id="category_name" name="category_name"/>
                        </div>
                        @error('category_name')
                         <x-alert type="warning" :$message/>
                        @enderror
                        <div class="mb-4">
                            <label for="parent_category_id" class="form-label"> Parent Category</label>
                            <select class="form-select" id="parent_category_id" name="parent_category_id">
                                <option value="0">Select Parent Categories</option>
                                    @foreach ($category as $list)
                                        <option value="{{$list->id}}">{{$list->category_name}}</option>
                                    @endforeach
                            </select>
                        </div>
                        @error('parent_category_id')
                            <x-alert type="warning" :$message/>
                        @enderror
                        <div class="mb-4">
                            <label for="category_slug" class="form-label"> Category Slug</label>
                            <input type="text" placeholder="Type here" class="form-control" id="category_slug" name="category_slug" />
                        </div>
                        @error('category_slug')
                        <x-alert type="warning" :$message/>
                        @enderror
                        <div class="mb-4">
                            <label for="image" class="form-label">Category Images</label>
                            <div class="input-upload">
                                <input class="form-control" type="file" id="image" name="image"/>
                            </div>
                        </div>
                        @error('image')
                            <x-alert type="warning" :$message/>
                        @enderror
                        <div class="mb-4">
                            <label for="category_order" class="form-label"> Category Order</label>
                            <input type="text" placeholder="Type here" class="form-control" id="category_order" name="category_order" />
                        </div>
                        <div class="mb-4">
                            <label for="is_home" class="form-label">Show Category</label>
                            <select class="form-select" id="is_home" name="is_home">
                                <option selected value="0">No</option>
                                <option  value="1">Yes</option>
                            </select>
                        </div>
                        @error('is_home')
                        <x-alert type="warning" :$message/>
                        @enderror
                        <div class="mb-4">
                            <label class="form-label">Description</label>
                            <textarea placeholder="Type here" class="form-control" id="category_description" name="category_description"></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Create category</button>
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
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Slug</th>
                                    <th>Order</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $show)
                                <tr>
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </td>
                                    <td>{{$show['id']}}</td>
                                    <td><b>{{$show['category_name']}}</b></td>
                                    <td>{{$show['category_description']}}</td>
                                    <td>{{$show['category_slug']}}</td>
                                    <td>{{$show['category_order']}}</td>
                                    <td class="text-end">
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">View detail</a>
                                                <a class="dropdown-item" href="{{url('admin/manage_category/')}}/{{$show['id']}}">Edit info</a>
                                                @if($show['status']==1)
                                                <a class="dropdown-item text-success" href="{{url('admin/category/status/0')}}/{{$show['id']}}">Active</a>
                                                @elseif($show['status']==0)
                                                <a class="dropdown-item text-danger" href="{{url('admin/category/status/1')}}/{{$show['id']}}">Deactivate</a>
                                                @endif
                                                <a class="dropdown-item text-danger" href="{{url('admin/category/delete')}}/{{$show['id']}}">Delete</a>
                                            </div>
                                        </div>
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