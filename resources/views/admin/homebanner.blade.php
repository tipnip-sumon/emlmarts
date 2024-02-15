@extends('admin/layout')
@section('page_title','Home Banner')
@section('banner_active','active')
@section('container')
<section class="content-main">
    {{session('message')}}
    <div class="content-header">
        
        <div>
            <h2 class="content-title card-title">Home Banner</h2>
            <p>Add Home Banner</p>
        </div>
        <div>
            <input type="text" placeholder="Search Home Banner" class="form-control bg-white" />
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{route('admin.insert_banner')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="btn_txt" class="form-label">Banner Txt</label>
                            <input type="text" placeholder="Type here"  class="form-control" id="btn_txt" name="btn_txt"/>
                        </div>
                        @error('btn_txt')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="btn_link" class="form-label"> Banner Link</label>
                            <input type="text" placeholder="Type here" class="form-control" id="btn_link" name="btn_link" />
                        </div>
                        @error('btn_link')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="image" class="form-label">Banner Images</label>
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
                            <label for="is_home" class="form-label">Show Banner</label>
                            <select class="form-select" id="is_home" name="is_home">
                                <option selected value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        @error('is_home')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Create Banner</button>
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
                                    <th>Banner Txt</th>
                                    <th>Banner Link</th>
                                    <th>Images</th>
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
                                    <td><b>{{$show->btn_txt}}</b></td>
                                    <td><b>{{$show->btn_link}}</b></td>
                                    <td>
                                        <div>
                                            <img style="height: 50px; width:100px" src="{{asset('storage/media/banner/'.$show->image)}}"  alt="Item" />
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <div class="dropdown">
                                            <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">View detail</a>
                                                <a class="dropdown-item" href="{{url('admin/manage_banner/')}}/{{$show['id']}}">Edit info</a>
                                                @if($show['status']==1)
                                                <a class="dropdown-item text-danger" href="{{url('admin/homebanner/status/0')}}/{{$show['id']}}">Deactivate</a>
                                                @elseif($show['status']==0)
                                                <a class="dropdown-item text-success" href="{{url('admin/homebanner/status/1')}}/{{$show['id']}}">Active</a>
                                                @endif
                                                <a class="dropdown-item text-danger" href="{{url('admin/homebanner/delete')}}/{{$show['id']}}">Delete</a>
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