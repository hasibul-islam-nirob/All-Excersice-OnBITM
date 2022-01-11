@extends('admin.master')

@section('title')
    Manage Category
@endsection



@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Our Category's</div>
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

                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                <img src="{{asset($category->image)}}" alt="" width="75" height="80">
                            </td>
                            <td>{{$category->status == 1 ? 'Published' : 'Unpublished'}}</td>

                            <td>
                                <a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-danger">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="" class="btn btn-success" onclick="event.preventDefault();document.getElementById('categoryDeleteForm{{$category->id}}').submit()">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <form action="{{route('category.delete',['id'=>$category->id])}}" method="post" id="categoryDeleteForm{{$category->id}}">
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