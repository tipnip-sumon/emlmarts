@extends('admin/layout')
@section('page_title','Manage Product')
@section('manage_product_active','active')
@section('container')
<section class="content-main">
    {{session('message')}}
    {{session('sku_error')}}
    <form action="{{url('admin/edit_products')}}" method="POST" enctype="multipart/form-data">
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
                    {{-- @endforeach --}}
                </div>
            </div>
            <div class="card-header">
                <h4>Product Images</h4>
            </div>
            @php
                $loop_image_count = 1;
            @endphp
            @if(@empty($productImagesArr[0]))
            <input id="piid" type="hidden" name="piid[]">
                <div class="card mb-4" id="product_image_{{$loop_image_count++}}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="images" class="form-label">Image</label>
                                    <input type="file" placeholder="images" class="form-control" id="images" name="images[]"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <button type="button" class="btn btn-primary" onclick=add_image_more()><i class="text-muted material-icons md-post_add"></i>&nbsp;Add</button> 
                        </div>
                    </div>
                </div>
            @else
            @foreach ($productImagesArr as $key => $val)
            <input id="piid" type="hidden" name="piid[]" value="{{$val->id}}">
                <div class="card mb-4" id="product_image_{{$loop_image_count++}}">
                    <div class="card-body">
                        <div class="row">
                            
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="images" class="form-label">Image</label>
                                    <a href="{{asset('storage/media/'. $val->images)}}" target="_blank" rel="noopener noreferrer"><img src="{{asset('storage/media/'. $val->images)}}" alt="" style="height: 52px;width:52px"/></a>
                                    
                                    <input type="file" class="form-control" id="images" name="images[]"/>
                                </div>
                            </div>
                        </div>
                        @if ($loop_image_count==2)
                            <div class="col-lg-4">
                                <button type="button" class="btn btn-primary" onclick=add_image_more()><i class="text-muted material-icons md-post_add"></i>&nbsp;Add</button> 
                            </div>
                        @else
                        <div class="col-lg-4">
                            <a href="{{url('admin/edit_products_image/delete')}}/{{$data->id}}/{{$val->id}}"><button type="button" class="btn btn-danger" onclick=remove_image_more()><i class="text-muted material-icons md-post_add"></i>&nbsp;Remove</button> </a>
                        </div>
                        @endif
                    </div>
                </div>
            @endforeach
            @endif
            <!-- card end// -->
            <div class="card-header">
                <h4>Attibutes</h4>
            </div>
            @php
                $loop_count_num = 1;
            @endphp
            @if(@empty($productsAttr[0]))
            <input id="paid" type="hidden" name="paid[]">
                <div class="card mb-4" id="product_attr_{{$loop_count_num++}}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="sku" class="form-label">SKU</label>
                                    <input type="text" value="" placeholder="sku" class="form-control" id="sku" name="sku[]" required/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="mrp" class="form-label">MRP</label>
                                    <input type="text" value="" placeholder="mrp" class="form-control" id="mrp" name="mrp[]" required/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" value="" placeholder="Price" class="form-control" id="price" name="price[]" required/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="attr_image" class="form-label">Image</label>
                                    <input type="file" placeholder="attr_image" class="form-control" id="attr_image" name="attr_image[]" required/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="size_id" class="form-label">Size</label>
                                    <select class="form-select" id="size_id" name="size_id[]" required>
                                        <option value="">Size Select</option>
                                        @foreach ($sizes as $list)
                                        <option  value="{{$list->id}}">{{$list->size}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="color_id" class="form-label">Color</label>
                                    <select class="form-select" id="color_id" name="color_id[]" required>
                                        <option value="">Color Select</option>
                                        @foreach ($colors as $list)
                                        <option  value="{{$list->id}}">{{$list->color}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="qty" class="form-label">Qty</label>
                                    <input type="text" value="" placeholder="qty" class="form-control" id="qty" name="qty[]" required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <button type="button" class="btn btn-primary" onclick=add_more()><i class="text-muted material-icons md-post_add"></i>&nbsp;Add</button> 
                        </div>
                    </div>
                </div>
            @else
            @foreach ($productsAttr as $key => $val)
                <input id="paid" type="hidden" name="paid[]" value="{{$val->id}}">
                <div class="card mb-4" id="product_attr_{{$loop_count_num++}}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="sku" class="form-label">SKU</label>
                                    <input type="text" value="{{$val->sku}}" placeholder="sku" class="form-control" id="sku" name="sku[]" required/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="mrp" class="form-label">MRP</label>
                                    <input type="text" value="{{$val->mrp}}" placeholder="mrp" class="form-control" id="mrp" name="mrp[]" required/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" value="{{$val->price}}" placeholder="Price" class="form-control" id="price" name="price[]" required/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="attr_image" class="form-label">Image</label>
                                    <img src="{{asset('storage/media/'. $val->attr_image)}}" alt="" style="height: 52px;width:52px"/>
                                    <input type="file" class="form-control" id="attr_image" name="attr_image[]"/>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="size_id" class="form-label">Size</label>
                                    <select class="form-select" id="size_id" name="size_id[]" required>
                                        <option value="">Size Select</option>
                                        @foreach ($sizes as $list)
                                            @if($val->size_id==$list->id)
                                                <option selected  value="{{$list->id}}">{{$list->size}}</option>
                                            @else
                                                <option value="{{$list->id}}">{{$list->size}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="color_id" class="form-label">Color</label>
                                    <select class="form-select" id="color_id" name="color_id[]" required>
                                        <option value="">Color Select</option>
                                        @foreach ($colors as $list)
                                            @if($val->color_id==$list->id)
                                                <option selected  value="{{$list->id}}">{{$list->color}}</option>
                                            @else
                                                <option value="{{$list->id}}">{{$list->color}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label for="qty" class="form-label">Qty</label>
                                    <input type="text" value="{{{$val->qty}}}" placeholder="qty" class="form-control" id="qty" name="qty[]" required/>
                                </div>
                            </div>
                        </div>
                        @if ($loop_count_num==2)
                            <div class="col-lg-4">
                                <button type="button" class="btn btn-primary" onclick=add_more()><i class="text-muted material-icons md-post_add"></i>&nbsp;Add</button> 
                            </div>
                        @else
                        <div class="col-lg-4">
                            <a href="{{url('admin/edit_products/delete')}}/{{$data->id}}/{{$val->id}}"><button type="button" class="btn btn-danger" onclick=remove_more()><i class="text-muted material-icons md-post_add"></i>&nbsp;Remove</button> </a>
                        </div>
                        @endif
                    </div>
                </div>
            @endforeach
            @endif
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
<script>
    loop_count=1;
    function add_more(){
        loop_count++;
        var html = '<input id="paid" type="hidden" name="paid[]" ><div id="product_attr_'+loop_count+'" class="card mb-4"><div class="card-body"><div class="row">';
            html+='<div class="col-lg-4"><div class="mb-4"><label for="sku" class="form-label">SKU</label><input type="text" placeholder="sku" class="form-control" id="sku" name="sku[]" /></div></div>';
            html+='<div class="col-lg-4"><div class="mb-4"><label for="mrp" class="form-label">MRP</label><input type="text" placeholder="mrp" class="form-control" id="mrp" name="mrp[]" /></div></div>';
            html+='<div class="col-lg-4"><div class="mb-4"><label for="price" class="form-label">Price</label><input type="text" placeholder="Price" class="form-control" id="price" name="price[]" /></div></div>';
            html+='<div class="col-lg-4"><div class="mb-4"><label for="attr_image" class="form-label">Image</label><input type="file" placeholder="attr_image" class="form-control" id="attr_image" name="attr_image[]" /></div></div>';
            var size_id_html = jQuery('#size_id').html();
                size_id_html = size_id_html.replace("selected","");
            html+='<div class="col-lg-4"><div class="mb-4"><label for="size_id" class="form-label">Size</label><select class="form-select" id="size_id" name="size_id[]">'+size_id_html+'</select></div></div>';
            var color_id_html = jQuery('#color_id').html();
                color_id_html = color_id_html.replace("selected","");
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
        var html = '<input id="piid" type="hidden" name="piid[]" value="'+loop_image_count+'"><div id="product_image_'+loop_image_count+'" class="card mb-4"><div class="card-body"><div class="row">';
        
        html+='<div class="col-lg-4"><div class="mb-4"><label for="attr_image" class="form-label">Image</label><input type="file" placeholder="images" class="form-control" id="images" name="images[]" /></div></div>';
        html+='<div class="col-lg-4"><button type="button" class="btn btn-danger" onclick=remove_image_more('+loop_image_count+')><i class="text-muted material-icons"></i>&nbsp;Remove</button></div>';
        html+='</div></div></div>';
        jQuery('#product_image_1').append(html);
    }
    function remove_image_more(loop_image_count){
        jQuery('#product_image_'+loop_image_count).remove();
    }
</script>
@endsection