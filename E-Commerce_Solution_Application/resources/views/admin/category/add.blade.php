@extends('admin.master')

@section('title')
    Add New Category
@endsection

@section('body')
    <div class="py-5">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Add Category Form</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                @if($message = Session::get('message'))
                    <h2 class="text-success text-center py-2" >{{$message}}</h2>
                @endif
                <form action="{{route('add.category')}}" method="post" class="form-horizontal" id="form-sample-1" novalidate="novalidate">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="category_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category Description</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="category_description">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Publication Status</label>
                        <div class="col-sm-9">
                            <div>
                                <label class="ui-radio ui-radio-primary ui-radio-inline">
                                    <input type="radio" name="status" value="1" checked>
                                    <span class="input-span"></span>Publish</label>
                                <label class="ui-radio ui-radio-primary ui-radio-inline">
                                    <input type="radio" name="status" value="0">
                                    <span class="input-span"></span>Unpublish</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9 ml-sm-auto">
                            <button class="btn btn-info" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
