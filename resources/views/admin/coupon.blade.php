@extends('admin/layout')
@section('page_title','Coupon')
@section('coupon_active','active')
@section('container')
<section class="content-main">
    {{session('message')}}
    <div class="content-header">
        
        <div>
            <h2 class="content-title card-title">Coupon</h2>
        </div>
        <div>
            <input type="text" placeholder="Search Categories" class="form-control bg-white" />
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{route('admin.insert1')}}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="form-label">Coupon Title</label>
                            <input type="text" placeholder="Type here"  class="form-control" id="title" name="title"/>
                        </div>
                        @error('title')
                            <x-alert type="warning" :$message/>
                        @enderror
                        <div class="mb-4">
                            <label for="code" class="form-label"> Code</label>
                            <input type="text" placeholder="Type here" class="form-control" id="code" name="code" />
                        </div>
                        @error('code')
                            <x-alert type="warning" :$message/>
                        @enderror
                       
                        <div class="mb-4">
                            <label for="value" class="form-label"> Coupon Value</label>
                            <input type="text" placeholder="Type here" class="form-control" id="value" name="value" />
                        </div>
                        @error('value')
                            <x-alert type="warning" :$message/>
                        @enderror
                        <div class="mb-4">
                            <label for="type" class="form-label"> Type</label>
                            <select class="form-select" name="type" id="type">
                                <option value="Value">Value</option>
                                <option value="Per">Percentage</option>
                            </select>
                       </div>
                       <div class="mb-4">
                            <label for="min_order_amt" class="form-label"> Min Order Amt</label>
                            <input type="text" placeholder="Type here" class="form-control" id="min_order_amt" name="min_order_amt" />
                        </div>
                        <div class="mb-4">
                            <label for="is_one_time" class="form-label"> Is One Time</label>
                            <select class="form-select" name="is_one_time" id="is_one_time">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                       </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Create coupon</button>
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
                                    <th>Title</th>
                                    <th>Code</th>
                                    <th>Value</th>
                                    <th>Type</th>
                                    <th>Minimum Order</th>
                                    <th>Is One Time</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $show)
                                <tr>
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" />
                                        </div>
                                    </td>
                                    <td>{{$show['id']}}</td>
                                    <td><b>{{$show['title']}}</b></td>
                                    <td>{{$show['code']}}</td>
                                    <td>{{$show['value']}}</td>
                                    <td>{{$show['type']}}</td>
                                    <td>{{$show['min_order_amt']}}</td>
                                    @if ($show['is_one_time']==1)
                                    <td>Yes</td>
                                    @else
                                    <td>No</td>
                                    @endif
                                    
                                    <td class="text-end">
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">View detail</a>
                                                <a class="dropdown-item" href="{{url('admin/manage_coupon/')}}/{{$show['id']}}">Edit info</a>
                                                @if($show['status']==1)
                                                <a class="dropdown-item text-success" href="{{url('admin/coupon/status/0')}}/{{$show['id']}}">Active</a>
                                                @elseif($show['status']==0)
                                                <a class="dropdown-item text-danger" href="{{url('admin/coupon/status/1')}}/{{$show['id']}}">Deactivate</a>
                                                @endif
                                                <a class="dropdown-item text-danger" href="{{url('admin/coupon/delete')}}/{{$show['id']}}">Delete</a>
                                            </div>
                                        </div>
                                        <!-- dropdown //end -->
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                    <div>
                        {!!$data->links()!!}
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