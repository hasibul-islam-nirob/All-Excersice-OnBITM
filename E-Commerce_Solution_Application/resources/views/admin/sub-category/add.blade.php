@extends('admin.master')

@section('title')
    Add Sub-Category
@endsection

@section('body')
    <div class="py-5">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Add Sub-Category Form</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                @if($message = Session::get('message'))
                    <h2 class="text-success text-center py-2" >{{$message}}</h2>
                @endif
                <form action="{{route('add.subCategory')}}" method="post" class="form-horizontal" id="form-sample-1" novalidate="novalidate">
                    @csrf
                    <div class="form-group row" >
                        <label class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                            <select name="category_id" class="form-control">
                                <option value="" disabled selected>Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Sub-Category Name</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="sub_category_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Sub-Category Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" type="text" name="sub_category_description"></textarea>
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
