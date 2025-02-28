@extends('admin/layout')
@section('page_title','Manage Product')
@section('manage_product_active','active')
@section('container')

<section class="content-main">
    @if(!empty(Session::get('message'))) 
        <div class="mb-4 alert alert-success">
            {{ Session::get('message')}}
        </div> 
    @endif
    @if(!empty(Session::get('sku_error'))) 
        <div class="mb-4 alert alert-danger">
            {{ Session::get('sku_error')}}
        </div> 
    @endif
    <form action="{{route('admin.insert4')}}" method="POST" enctype="multipart/form-data">
        @csrf
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
            <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Basic</h4>
                </div>
                <div class="card-body">
                        <div class="mb-4">
                            <label for="name" class="form-label">Product title</label>
                            <input type="text" value="{{old('name')}}" placeholder="Type here" class="form-control" id="name" name="name"  required/>
                        </div>
                        @error('name')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" value="{{old('slug')}}" placeholder="Type here" class="form-control" id="slug" name="slug" required/>
                        </div>
                        @error('slug')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label class="form-label">Short Description</label>
                            <textarea placeholder="Type here" class="form-control" id="short_desc" name="short_desc" rows="4">{{ old('short_desc') }}</textarea>
                        </div>
                        @error('short_desc')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label class="form-label">Full Description</label>
                            <textarea placeholder="Type here"  class="form-control" id="full_desc" name="full_desc" rows="4">{{ old('full_desc') }}</textarea>
                        </div>
                        @error('full_desc')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                </div>
            </div>
            <div class="card-header">
                <h4>Product Images</h4>
            </div>
            <input id="piid" type="hidden" name="piid[]">
            <div class="card mb-4" id="product_image_1">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label for="images" class="form-label">Image</label>
                                <input type="file" value="{{old('images.0')}}" placeholder="images" class="form-control" id="images" name="images[]" required/>
                            </div>
                        </div>
                        @error('images.*')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="col-lg-4">
                        <button type="button" class="btn btn-primary" onclick=add_image_more()><i class="text-muted material-icons md-post_add"></i>&nbsp;Add</button> 
                    </div>
                </div>
            </div>
            <!-- card end// -->
            <div class="card-header">
                <h4>Attibutes</h4>
            </div>
            <input id="paid" type="hidden" name="paid[]">
            <div class="card mb-4" id="product_attr_1">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label for="sku" class="form-label">SKU</label>
                                <input type="text" value="{{old('sku.0')}}"  placeholder="sku" class="form-control" id="sku" name="sku[]" required/>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label for="mrp" class="form-label">MRP</label>
                                <input type="number" value="{{old('mrp.0')}}" placeholder="mrp" class="form-control" id="mrp" name="mrp[]" required/>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" value="{{old('price.0')}}" placeholder="Price" class="form-control" id="price" name="price[]" required/>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label for="attr_image" class="form-label">Image</label>
                                <input type="file" value="{{old('attr_image.0')}}" placeholder="attr_image" class="form-control" id="attr_image" name="attr_image[]" required/>
                            </div>
                        </div>
                        @error('attr_image.*')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label for="size_id" class="form-label">Size</label>
                                <select class="form-select" id="size_id" name="size_id[]" required>
                                    <option value="">Size Select</option>
                                    @foreach ($size as $list)
                                    <option  value="{{$list->id}}" {{ (old("size_id.0") == $list->id ? "selected":"") }}>{{$list->size}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label for="color_id" class="form-label">Color</label>
                                <select class="form-select" id="color_id" name="color_id[]" required>
                                    <option value="">Color Select</option>
                                    @foreach ($color as $list)
                                    <option  value="{{$list->id}}"{{ (old("color_id.0") == $list->id ? "selected":"") }}>{{$list->color}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-4">
                                <label for="qty" class="form-label">Qty</label>
                                <input type="number" value="{{old('qty.0')}}" placeholder="qty" class="form-control" id="qty" name="qty[]" required/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <button type="button" class="btn btn-primary" onclick=add_more()><i class="text-muted material-icons md-post_add"></i>&nbsp;Add</button> 
                    </div>
                </div>
            </div>
            <!-- card end// -->
        </div>
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="input-upload">
                        <input class="form-control" value="{{old('image')}}" type="file" id="image" name="image"/>
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
                                <option value="">Category Select</option>
                                @foreach ($category as $list)
                                <option  value="{{$list->id}}" {{ (old("category_id") == $list->id ? "selected":"") }}>{{$list->category_name}}</option>
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
                            <select class="form-select" id="brand" name="brand">
                                <option value="">Brand Select</option>
                                @foreach ($brand as $list)
                                <option  value="{{$list->id}}" {{ (old("brand") == $list->id ? "selected":"") }}>{{$list->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('brand')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="model" class="form-label">Model</label>
                            <input type="text" value="{{old('model')}}" placeholder="Type here" class="form-control" id="model" name="model" />
                        </div>
                        @error('model')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="keywords" class="form-label">Keywords</label>
                            <input type="text" value="{{old('keywords')}}" placeholder="Type here" class="form-control" id="keywords" name="keywords" />
                        </div>
                        @error('keywords')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="technical_spceification" class="form-label">Technical Spacipication</label>
                            <textarea placeholder="Type here" class="form-control" id="technical_spceification" name="technical_spceification">{{ old('technical_spceification') }}</textarea>
                        </div>
                        @error('technical_spceification')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="uses" class="form-label">Uses</label>
                            <input type="text" value="{{old('uses')}}" placeholder="Type here" class="form-control" id="uses" name="uses" />
                        </div>
                        @error('uses')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="mb-4">
                            <label for="warranty" class="form-label">Warranty</label>
                            <input type="text" value="{{old('warranty')}}" placeholder="Type here" class="form-control" id="warranty" name="warranty" />
                        </div>
                        @error('warranty')
                        <div class="mb-4 atert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="form-label">Lead Time</label>
                                    <div class="row gx-2">
                                        <input placeholder="Type here" value="{{old('lead_time')}}" type="text" class="form-control" id="lead_time" name="lead_time" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label class="form-label">Tax</label>
                                    <select value="{{old('tax_id')}}" class="form-select" id="tax_id" name="tax_id">
                                        <option value="">Select Tax</option>
                                        @foreach ($taxes as $list)
                                        <option  value="{{$list->id}}" {{ (old("tax_id") == $list->id ? "selected":"") }}>{{$list->tax_desc}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-4">
                                    <label class="form-label">Is Promo</label>
                                    <div class="row gx-2">
                                        <select class="form-select" id="is_promo" name="is_promo">
                                            <option value="1">Yes</option>
                                            <option  value="0" >No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="mb-4">
                                    <label class="form-label">Is Featured</label>
                                    <div class="row gx-2">
                                        <select class="form-select" id="is_featured" name="is_featured">
                                            <option value="1">Yes</option>
                                            <option  value="0" >No</option>
                                        </select>
                                    </div>
                               </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Is Discounted</label>
                                <div class="row gx-2">
                                    <select class="form-select" id="is_discounted" name="is_discounted">
                                        <option value="1">Yes</option>
                                        <option  value="0" >No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label class="form-label">Is Tranding</label>
                                <div class="row gx-2">
                                    <select class="form-select" id="is_tranding" name="is_tranding">
                                        <option value="1">Yes</option>
                                        <option  value="0" >No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="tag" class="form-label">Tags</label>
                            <input type="text" value="{{old('tag')}}" class="form-control" id="tag" name="tag" />
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
<script>
    loop_count=1;
    function add_more(){
        loop_count++;
        var html = '<input id="paid" type="hidden" name="paid[]"><div id="product_attr_'+loop_count+'" class="card mb-4"><div class="card-body"><div class="row">';
            html+='<div class="col-lg-4"><div class="mb-4"><label for="sku" class="form-label">SKU</label><input type="text" placeholder="sku" class="form-control" id="sku" name="sku[]" /></div></div>';
            html+='<div class="col-lg-4"><div class="mb-4"><label for="mrp" class="form-label">MRP</label><input type="text" placeholder="mrp" class="form-control" id="mrp" name="mrp[]" /></div></div>';
            html+='<div class="col-lg-4"><div class="mb-4"><label for="price" class="form-label">Price</label><input type="text" placeholder="Price" class="form-control" id="price" name="price[]" /></div></div>';
            html+='<div class="col-lg-4"><div class="mb-4"><label for="attr_image" class="form-label">Image</label><input type="file" placeholder="attr_image" class="form-control" id="attr_image" name="attr_image[]" /></div></div>';
            var size_id_html = jQuery('#size_id').html();
            html+='<div class="col-lg-4"><div class="mb-4"><label for="size_id" class="form-label">Size</label><select class="form-select" id="size_id" name="size_id[]">'+size_id_html+'</select></div></div>';
            var color_id_html = jQuery('#color_id').html();
            html+='<div class="col-lg-4"><div class="mb-4"><label for="color_id" class="form-label">Color</label><select class="form-select" id="color_id" name="color_id[]">'+color_id_html+'</select></div></div>';
            html+='<div class="col-lg-4"><div class="mb-4"><label for="qty" class="form-label">Qty</label><input type="text" placeholder="qty" class="form-control" id="qty" name="qty[]" /></div></div>';
            html+='<div class="col-lg-4"><button type="button" class="btn btn-danger" onclick=remove_more("'+loop_count+'")><i class="text-muted material-icons"></i>&nbsp;Remove</button></div>';
            html+='</div></div></div>';
            jQuery('#product_attr_1').append(html);
    }
    function remove_more(loop_count){
        jQuery('#product_attr_'+loop_count).remove();
    }
    loop_image_count = 1;
    function add_image_more(){
        loop_image_count++;
        var html = '<input id="piid" type="hidden" name="piid[]"><div id="product_image_'+loop_image_count+'" class="card mb-4"><div class="card-body"><div class="row">';
        html+='<div class="col-lg-4"><div class="mb-4"><label for="attr_image" class="form-label">Image</label><input type="file" placeholder="attr_image" class="form-control" id="attr_image" name="attr_image[]" /></div></div>';
        html+='<div class="col-lg-4"><button type="button" class="btn btn-danger" onclick=remove_image_more('+loop_image_count+')><i class="text-muted material-icons"></i>&nbsp;Remove</button></div>';
        html+='</div></div></div>';
        jQuery('#product_image_1').append(html);
    }
    function remove_image_more(loop_image_count){
        jQuery('#product_image_'+loop_image_count).remove();
    }
    CKEDITOR.replace('short_desc');
    CKEDITOR.replace('full_desc');
    CKEDITOR.replace('technical_spceification');
</script>
@endsection