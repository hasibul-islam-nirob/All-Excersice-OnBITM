@extends('admin.master')

@section('title')
    Show Brand Category
@endsection

@section('body')

    <div class="">
        <!-- START PAGE CONTENT-->
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">All Brand's</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        @if($message = Session::get('message'))
                            <h2 class="text-success text-center py-2" >{{$message}}</h2>
                        @endif
                        <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th width="20%">Brand Name</th>
                            <th width="40%">Brand Description</th>
                            <th width="15%">Status</th>
                            <th width="15%">Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($brands as $brand)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$brand->brand_name}}</td>
                                <td>{{$brand->brand_description}}</td>
                                <td>{{ $brand->status == 1 ? 'Publish' : 'Unpublish' }}</td>
                                <td>
                                    <a href="{{route('edit-brand',['id'=>$brand->id])}}" class="btn btn-danger">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="" class="btn btn-success" onclick="event.preventDefault(); document.getElementById('brandDeleteID{{$brand->id}}').submit();">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form action="{{route('delete.brand',['id'=>$brand->id])}}" method="post" id="brandDeleteID{{$brand->id}}">
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


@section('script')
    <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                //"ajax": './assets/demo/data/table_data.json',
                /*"columns": [
                    { "data": "name" },
                    { "data": "office" },
                    { "data": "extn" },
                    { "data": "start_date" },
                    { "data": "salary" }
                ]*/
            });
        })
    </script>
@endsection
