@extends('admin/layout')
@section('page_title','Manage Banner')
@section('container')
<section class="content-main">
    {{session('message')}}
    <div class="content-header">
        
        <div>
            <h2 class="content-title card-title">Banner</h2>
        </div>
        <div>
            <input type="text" placeholder="Search Banner" class="form-control bg-white" />
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{url('admin/edit_homebanner')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- @dd($data->image) --}}
                        <input type="hidden" id="id" name="id" value="{{$data->id}}"/>
                        <div class="mb-4">
                            <label for="btn_txt" class="form-label">Btn Txt</label>
                            <input type="text" placeholder="Type here" value="{{$data->btn_txt}}"  class="form-control" id="btn_txt" name="btn_txt"/>
                        </div>
                        @error('btn_txt')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="btn_link" class="form-label">Btn Txt</label>
                            <input type="text" placeholder="Type here" value="{{$data->btn_link}}"  class="form-control" id="btn_link" name="btn_link"/>
                        </div>
                        @error('btn_link')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <img style="height: 50px; width:100px" src="{{asset('storage/media/banner/'.$data->image)}}"  alt="Item" />
                            <input type="file" class="form-control" id="image" name="image"/>
                        </div>
                        <div class="mb-4">
                            <label for="is_home" class="form-label">Show Banner</label>
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
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Update Banner</button>
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