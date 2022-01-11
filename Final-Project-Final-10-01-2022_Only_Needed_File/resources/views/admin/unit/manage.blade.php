@extends('admin.master')

@section('title')
    Manage Unit
@endsection



@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Our Unit's</div>
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
                            <th>Brand Name</th>
                            <th>Brand Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($units as $unit)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$unit->name}}</td>
                                <td>{{$unit->description}}</td>
                                <td>{{$unit->status == 1 ? 'Published' : 'Unpublished'}}</td>

                                <td>
                                    <a href="{{route('unit.edit',['id'=>$unit->id])}}" class="btn btn-danger">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="" class="btn btn-success" onclick="event.preventDefault();document.getElementById('unitDeleteForm{{$unit->id}}').submit()">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form action="{{route('unit.delete',['id'=>$unit->id])}}" method="post" id="unitDeleteForm{{$unit->id}}">
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