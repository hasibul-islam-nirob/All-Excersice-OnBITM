@extends('admin.master')

@section('title')
    Edit Sub category
@endsection


@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Update Sub Category</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="ibox-body">

                    <form class="form-horizontal" action="{{route('sub-category.update',['id'=>$subCategory->id])}}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sub Category Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="name"  value="{{$subCategory->name}}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <select name="category_id" class="form-control">
                                    <option value="" disabled>--Select Option--</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $subCategory->category_id ? 'selected' : ''}} />{{$category->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description" rows="5" cols="100">{{$subCategory->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="image" accept="image/*" />
                                <img src="{{asset($subCategory->image)}}" width="100" height="80" alt="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Publication Status</label>
                            <div class="col-sm-10">
                                <label for=""><input type="radio" {{$subCategory->status == 1 ? 'checked' : ''}} name="status" value="1"/>Publish</label>
                                <label for=""><input type="radio" {{$subCategory->status == 0 ? 'checked' : ''}} name="status"  value="0"/>UnPublish</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-info" type="submit">Update Sub Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection