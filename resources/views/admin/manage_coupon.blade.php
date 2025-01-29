@extends('admin/layout')
@section('page_title','Manage Category')
@section('container')
<section class="content-main">
    {{session('message')}}
    <div class="content-header">
        
        <div>
            <h2 class="content-title card-title">Coupons</h2>
        </div>
        <div>
            <input type="text" placeholder="Search Coupon" class="form-control bg-white" />
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
                        <div class="mb-4">
                            <label for="type" class="form-label"> Type</label>
                            <select class="form-select" name="type" id="type">
                                @if($type=='value')
                                <option selected value="Value">Value</option>
                                <option value="Per">Percentage</option>
                                @elseif ($type=='per')
                                <option value="Value">Value</option>
                                <option selected value="Per">Percentage</option>
                                @endif
                            </select>
                       </div>
                       <div class="mb-4">
                            <label for="min_order_amt" class="form-label"> Min Order Amt</label>
                            <input type="text" value="{{$min_order_amt}}" placeholder="Type here" class="form-control" id="min_order_amt" name="min_order_amt" />
                        </div>
                        <div class="mb-4">
                            <label for="is_one_time" class="form-label"> Is One Time</label>
                            <select class="form-select" name="is_one_time" id="is_one_time">
                                @if($is_one_time=='1')
                                    <option selected value="1">Yes</option>
                                    <option value="0">No</option>
                                @else
                                    <option value="1">Yes</option>
                                    <option selected value="0">No</option>
                                @endif
                            </select>
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