@extends('admin.master')

@section('title')
    Manage Sub Category
@endsection



@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Our Sub Category's</div>
                </div>
                <div class="ibox-body">

                    @if($message = Session::get('message') )
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{$message}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Sub-Category Name</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subCategories as $subCategory)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$subCategory->name}}</td>
                                <td>{{$subCategory->category->name}}</td>
                                <td>{{$subCategory->description}}</td>
                                <td>
                                    <img src="{{asset($subCategory->image)}}" alt="" width="75" height="80">
                                </td>
                                <td>{{$subCategory->status == 1 ? 'Published' : 'Unpublished'}}</td>

                                <td>
                                    <a href="{{route('subcategory.edit',['id'=>$subCategory->id])}}" class="btn btn-danger">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="" class="btn btn-success" onclick="event.preventDefault();document.getElementById('subCategoryDeleteForm{{$subCategory->id}}').submit()">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form action="{{route('subcategory.delete',['id'=>$subCategory->id])}}" method="post" id="subCategoryDeleteForm{{$subCategory->id}}">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection