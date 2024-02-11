@extends('admin/layout')
@section('page_title','Manage Tax')
@section('container')
<section class="content-main">
    {{session('message')}}
    <div class="content-header">
        
        <div>
            <h2 class="content-title card-title">Tax</h2>
        </div>
        <div>
            <input type="text" placeholder="Search Categories" class="form-control bg-white" />
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{url('admin/tax')}}" method="POST">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{$id}}"/>
                        <div class="mb-4">
                            <label for="tax_desc" class="form-label">Tax Desc</label>
                            <input type="text" value="{{$tax_desc}}" placeholder="Type here"  class="form-control" id="tax_desc" name="tax_desc"/>
                        </div>
                        @error('tax_desc')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="tax_value" class="form-label">Tax Value</label>
                            <input type="number" value="{{$tax_value}}" placeholder="Type here"  class="form-control" id="tax_value" name="tax_value"/>
                        </div>
                        @error('tax_value')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                @if ($status==1)
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                                @else
                                <option value="1">Yes</option>
                                <option selected value="0">No</option>
                                @endif
                            </select>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Update Tax</button>
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