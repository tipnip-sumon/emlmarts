@extends('admin/layout')
@section('page_title','Manage Product')
@section('manage_product_active','active')
@section('container')
<section class="content-main">
    {{session('message')}}
    <form action="{{url('admin/edit_products')}}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @dd($data->name) --}}
        {{-- @dd($category) --}}
    <div class="row">
        <div class="col-9">
            <div class="content-header">
                <h2 class="content-title">Add New Product</h2>
                <div>
                    <button type="submit" class="btn btn-light rounded font-sm mr-5 text-body hover-up">Save to draft</button>
                    <button type="submit" class="btn btn-md rounded font-sm hover-up">Publich</button>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Basic</h4>
                </div>
                <div class="card-body">
                    {{-- @foreach ($data as $show) --}}
                        <div class="mb-4">
                            <label for="name" class="form-label">Product title</label>
                            <input type="text" placeholder="Type here" class="form-control" id="name" name="name" value="{{$data->name}}" required/>
                        </div>
                        <input type="hidden" id="id" name="id" value="{{$data->id}}"/>
                        @error('name')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" placeholder="Type here" class="form-control" id="slug" name="slug" value="{{$data->slug}}" required/>
                        </div>
                        @error('slug')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label class="form-label">Short Description</label>
                            <textarea placeholder="Type here" class="form-control" id="short_desc" name="short_desc" rows="4">{{$data->short_desc}}</textarea>
                        </div>
                        @error('short_desc')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label class="form-label">Full Description</label>
                            <textarea placeholder="Type here" class="form-control" id="full_desc" name="full_desc" rows="4">{{$data->desc}}</textarea>
                        </div>
                        @error('full_desc')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">Regular price</label>
                                    <div class="row gx-2">
                                        <input placeholder="$" type="text" class="form-control" id="reg_price" name="reg_price" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">Promotional price</label>
                                    <input placeholder="$" type="text" class="form-control" id="pro_price" name="pro_price"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label class="form-label">Currency</label>
                                <select class="form-select">
                                    <option>USD</option>
                                    <option>EUR</option>
                                    <option>RUBL</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Tax rate</label>
                            <input type="text" placeholder="%" class="form-control" id="tax" name="tax" />
                        </div>
                        <label class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" value="" />
                            <span class="form-check-label"> Make a template </span>
                        </label>
                    {{-- @endforeach --}}
                </div>
            </div>
            <!-- card end// -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Shipping</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Width</label>
                                    <input type="text" placeholder="inch" class="form-control" id="product_name" />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label">Height</label>
                                    <input type="text" placeholder="inch" class="form-control" id="product_name" />
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="product_name" class="form-label">Weight</label>
                            <input type="text" placeholder="gam" class="form-control" id="product_name" />
                        </div>
                        <div class="mb-4">
                            <label for="product_name" class="form-label">Shipping fees</label>
                            <input type="text" placeholder="$" class="form-control" id="product_name" />
                        </div>
                    </form>
                </div>
            </div>
            <!-- card end// -->
        </div>
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Media</h4>
                </div>
                <div class="card-body">
                    <div class="input-upload">
                        <img src="{{asset('storage/media/'. $data->image)}}" alt="" />
                        <input class="form-control" type="file" id="image" name="image"/>
                    </div>
                </div>
                
                @error('image')
                <div class="mb-4 atert alert-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <!-- card end// -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Organization</h4>
                </div>
                <div class="card-body">
                    <div class="row gx-2">
                        <div class="col-sm-6 mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select" id="category_id" name="category_id">
                                @foreach ($category as $cat_show)
                                    @if ($data->category_id==$cat_show->id)
                                        <option selected value="{{$cat_show->id}}">{{$cat_show->category_name}}</option>
                                    @elseif ($data->category_id!=$cat_show->id)  
                                        <option value="{{$cat_show->id}}">{{$cat_show->category_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="col-sm-6 mb-3">
                            <label class="form-label">Sub-category</label>
                            <select class="form-select">
                                <option>Nissan</option>
                                <option>Honda</option>
                                <option>Mercedes</option>
                                <option>Chevrolet</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="brand" class="form-label">Brand</label>
                            <input type="text" placeholder="Type here" class="form-control" id="brand" name="brand"  value="{{$data->brand}}"/>
                        </div>
                        @error('brand')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="model" class="form-label">Model</label>
                            <input type="text" placeholder="Type here" class="form-control" id="model" name="model" value="{{$data->model}}"/>
                        </div>
                        @error('model')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="keywords" class="form-label">Keywords</label>
                            <input type="text" placeholder="Type here" class="form-control" id="keywords" name="keywords" value="{{$data->keywords}}"/>
                        </div>
                        @error('keywords')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="technical_spceification" class="form-label">Technical Spacipication</label>
                            <input type="text" placeholder="Type here" class="form-control" id="technical_spceification" name="technical_spceification" value="{{$data->technical_spceification}}"/>
                        </div>
                        @error('technical_spceification')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="uses" class="form-label">Uses</label>
                            <input type="text" placeholder="Type here" class="form-control" id="uses" name="uses" value="{{$data->uses}}"/>
                        </div>
                        @error('uses')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="warranty" class="form-label">Warranty</label>
                            <input type="text" placeholder="Type here" class="form-control" id="warranty" name="warranty" value="{{$data->warranty}}"/>
                        </div>
                        @error('warranty')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="tag" class="form-label">Tags</label>
                            <input type="text" class="form-control" id="tag" name="tag" />
                        </div>
                        @error('tag')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <!-- row.// -->
                </div>
            </div>
            <!-- card end// -->
        </div>
    </div>
</form>
</section>
<!-- content-main end// -->

@endsection