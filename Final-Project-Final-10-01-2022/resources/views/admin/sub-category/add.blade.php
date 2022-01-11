@extends('admin.master')

@section('title')
    Add new Sub category
@endsection



@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Add Sub-Category Form</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="ibox-body">

                    @if($massage = Session::get('massage') )
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{$massage}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form class="form-horizontal" action="{{route('create.new-sub-category')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <select name="category_id" class="form-control">
                                    <option value="" disabled selected>--Select Option--</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sub Category Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="name" placeholder=" ">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sub Category Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" rows="5" cols="120"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Publication Status</label>
                            <div class="col-sm-10">
                                <label for="">
                                    <input  type="radio" name="status" value="1"/> Publish </label>
                                <label for="">
                                    <input  type="radio" name="status" value="0"/> UnPublish
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sub Category Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="image" accept="image/*" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-info" type="submit">Add New Sub-Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection