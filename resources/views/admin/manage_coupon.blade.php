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
                    <form action="{{url('admin/coupon')}}" method="POST">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{$id}}"/>
                        <div class="mb-4">
                            <label for="title" class="form-label">Coupon Title</label>
                            <input type="text" placeholder="Type here" value="{{$title}}"  class="form-control" id="title" name="title"/>
                        </div>
                        @error('category_name')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="code" class="form-label"> Coupon Code</label>
                            <input type="text" placeholder="Type here" value="{{$code}}"  class="form-control" id="code" name="code" />
                        </div>
                        @error('code')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                       
                        <div class="mb-4">
                            <label for="value" class="form-label"> Coupon Value</label>
                            <input type="text" placeholder="Type here" value="{{$value}}"  class="form-control" id="value" name="value" />
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Update Coupon</button>
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