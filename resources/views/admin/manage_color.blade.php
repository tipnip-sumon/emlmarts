@extends('admin/layout')
@section('page_title','Manage Color')
@section('container')
<section class="content-main">
    {{session('message')}}
    <div class="content-header">
        
        <div>
            <h2 class="content-title card-title">Color</h2>
        </div>
        <div>
            <input type="text" placeholder="Search Categories" class="form-control bg-white" />
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{url('admin/color')}}" method="POST">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{$id}}"/>
                        <div class="mb-4">
                            <label for="color" class="form-label">Color</label>
                            <input type="text" placeholder="Type here" value="{{$color}}"  class="form-control" id="color" name="color"/>
                        </div>
                        @error('color')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Update color</button>
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