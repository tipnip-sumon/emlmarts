@extends('admin/layout')
@section('page_title','Tax List')
@section('container')
<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Tax</h2>
            <p>Lorem ipsum dolor sit amet.</p>
        </div>
        <div>
            <a href="#" class="btn btn-light rounded font-md">Export</a>
            <a href="#" class="btn btn-light rounded font-md">Import</a>
            <a href="#" class="btn btn-primary btn-sm rounded">Create new</a>
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row align-items-center">
                <div class="col col-check flex-grow-0">
                    <div class="form-check ms-2">
                        <input class="form-check-input" type="checkbox" value="" />
                    </div>
                </div>
                <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                    <select class="form-select">
                        <option selected>All category</option>
                        <option>Electronics</option>
                        <option>Clothes</option>
                        <option>Automobile</option>
                    </select>
                </div>
                <div class="col-md-2 col-6">
                    <input type="date" value="02.05.2021" class="form-control" />
                </div>
                <div class="col-md-2 col-6">
                    <select class="form-select">
                        <option selected>Status</option>
                        <option>Active</option>
                        <option>Disabled</option>
                        <option>Show all</option>
                    </select>
                </div>
            </div>
        </header>
        <!-- card-header end// -->
        <div class="card-body">
            <article class="itemlist">
                <div class="row align-items-center">
                    @foreach ($data as $show)
                    <div class="col-lg-2 col-sm-2 col-2 col-status">
                        <h6 class="mb-0">{{$show['tax_desc']}}</h6>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-2 col-status">
                        <h6 class="mb-0">{{$show['tax_value']}}</h6>
                    </div>
                     @if ($show['status']==1)
                    <div class="col-lg-2 col-sm-2 col-2 col-status" >
                        <span class="badge rounded-pill alert-success">Active</span>
                    </div>
                    @elseif($show['status']==0)
                    <div class="col-lg-2 col-sm-2 col-2 col-status" >
                        <span class="badge rounded-pill alert-success">Inactive</span>
                    </div>
                    @endif
                    <div class="col-lg-6 col-sm-6 col-6 col-action text-end">
                        <a href="#" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                        @if ($show['status']==1)
                        <a href="{{url('admin/tax/status/0')}}/{{$show['id']}}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Inctive </a>
                        @elseif($show['status']==0)
                        <a href="{{url('admin/tax/status/1')}}/{{$show['id']}}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Active </a>
                        @endif
                        <a href="#" class="btn btn-sm font-sm btn-light rounded"> <i class="material-icons md-delete_forever"></i> Delete </a>
                    </div>
                    @endforeach
                    
                </div>
                <!-- row .// -->
            </article>
            <!-- itemlist  .// -->
            <!-- itemlist  .// -->
        </div>
        <!-- card-body end// -->
    </div>
    <!-- card end// -->
    <div class="pagination-area mt-30 mb-50">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-start">
                {!!$data->links()!!}
            </ul>
        </nav>
    </div>
</section>

@endsection