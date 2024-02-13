@extends('admin/layout')
@section('page_title','User')
@section('user_active','active')
@section('container')
<section class="content-main">
    {{session('message')}}
    <div class="content-header">
        
        <div>
            <h2 class="content-title card-title">User</h2>
        </div>
        <div>
            <input type="text" placeholder="Search Categories" class="form-control bg-white" />
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Search..." class="form-control" />
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <select class="form-select">
                        <option>Status</option>
                        <option>Active</option>
                        <option>Disabled</option>
                        <option>Show all</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-3 col-6">
                    <select class="form-select">
                        <option>Show 20</option>
                        <option>Show 30</option>
                        <option>Show 40</option>
                    </select>
                </div>
            </div>
        </header>
        <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Mobile No</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Registered</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $show)
                        <tr>
                            <td>
                                <div class="info pl-3">
                                    <h6 class="mb-0 title">{{$show->name}}</h6>
                                </div>
                            </td>
                            <td>{{$show->mobile}}</td>
                            <td>{{$show->email}}</td>
                            <td>
                                @if($show->status==1)
                                <span class="badge rounded-pill alert-success">Active</span>
                                @else
                                <span class="badge rounded-pill alert-danger">In Active</span>
                                @endif
                            </td>
                            <td>{{ $show->created_at->format('d-M-Y') }}</td>
                            {{-- <td>{{ \Carbon\Carbon::parse($show->created_at)->format('d-M-Y') }}</td> --}}
                            {{-- <td>{{date('d-M-Y', strtotime($show->created_at))}}</td> --}}
                            <td class="text-end">
                                <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">View detail</a>
                                        @if($show['status']==1)
                                        <a class="dropdown-item text-success" href="{{url('admin/user/status/0')}}/{{$show['id']}}">Active</a>
                                        @elseif($show['status']==0)
                                        <a class="dropdown-item text-danger" href="{{url('admin/user/status/1')}}/{{$show['id']}}">Deactivate</a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection