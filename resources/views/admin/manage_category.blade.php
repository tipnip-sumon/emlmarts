@extends('admin/layout')
@section('page_title','Manage Category')
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
                    <form action="{{url('admin/category')}}" method="POST">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{$data->id}}"/>
                        <div class="mb-4">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text" placeholder="Type here" value="{{$data->category_name}}"  class="form-control" id="category_name" name="category_name"/>
                        </div>
                        @error('category_name')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="category_name" class="form-label">Parent Category</label>
                            <select class="form-select" id="parent_category_id" name="parent_category_id">
                                <option value="0">Select Parent Category</option>
                                @foreach ($category as $list)
                                    @if($data->parent_category_id==$list->id)
                                        <option selected  value="{{$list->id}}">
                                    @else
                                        <option  value="{{$list->id}}">
                                    @endif
                                        {{$list->category_name}}
                                        </option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_name')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="category_slug" class="form-label"> Category Slug</label>
                            <input type="text" placeholder="Type here" value="{{$data->category_slug}}"  class="form-control" id="category_slug" name="category_slug" />
                        </div>
                        @error('category_slug')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                       
                        <div class="mb-4">
                            <label for="category_order" class="form-label"> Category Order</label>
                            <input type="text" placeholder="Type here" value="{{$data->category_order}}"  class="form-control" id="category_order" name="category_order" />
                        </div>
                        <div class="mb-4">
                            <label for="is_home" class="form-label">Show Category</label>
                            <select class="form-select" id="is_home" name="is_home">
                                @if ($data->is_home==1)
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                                @else
                                <option value="1">Yes</option>
                                <option selected value="0">No</option>
                                @endif
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                @if ($data->status==1)
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                                @else
                                <option value="1">Yes</option>
                                <option selected value="0">No</option>
                                @endif
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Description</label>
                            <textarea placeholder="Type here"  class="form-control" id="category_description" name="category_description">{{$data->category_description}}</textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Update category</button>
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