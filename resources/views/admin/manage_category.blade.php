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
                        <input type="hidden" id="id" name="id" value="{{$id}}"/>
                        <div class="mb-4">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text" placeholder="Type here" value="{{$category_name}}"  class="form-control" id="category_name" name="category_name"/>
                        </div>
                        @error('category_name')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="category_slug" class="form-label"> Category Slug</label>
                            <input type="text" placeholder="Type here" value="{{$category_slug}}"  class="form-control" id="category_slug" name="category_slug" />
                        </div>
                        @error('category_slug')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                       
                        <div class="mb-4">
                            <label for="category_order" class="form-label"> Category Order</label>
                            <input type="text" placeholder="Type here" value="{{$category_order}}"  class="form-control" id="category_order" name="category_order" />
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Description</label>
                            <textarea placeholder="Type here"  class="form-control" id="category_description" name="category_description">{{$category_description}}</textarea>
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