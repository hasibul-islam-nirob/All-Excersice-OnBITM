@extends('admin.master')

@section('title')
    Sub-Category
@endsection

@section('body')

    <div class="">
        <!-- START PAGE CONTENT-->
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">All Sub-Categories</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        @if($message = Session::get('message'))
                            <h2 class="text-success text-center py-2" >{{$message}}</h2>
                        @endif
                        <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">Category Name</th>
                            <th width="15%">Sub-Category Name</th>
                            <th width="35%">Sub-Category Description</th>
                            <th width="15%">Status</th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($subCategories as $subCategory)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    @if(empty($subCategory->category_id != null))
                                        {!! 'empty'!!}
                                    @else
                                        {{$subCategory->Category->category_name}}
                                    @endif
                                </td>
                                <td>{{$subCategory->sub_category_name}}</td>
                                <td>{{$subCategory->sub_category_description}}</td>
                                <td>{{$subCategory->status == 1 ? 'Publish' : 'Unpublish' }}</td>
                                <td>
                                    <a href="{{route('edit-subCategory',['id'=>$subCategory->id])}}" class="btn btn-danger">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="" class="btn btn-success" onclick="event.preventDefault(); document.getElementById('subCategoryDeleteID{{$subCategory->id}}').submit();">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form action="{{route('delete.subCategory',['id'=>$subCategory->id])}}" method="post" id="subCategoryDeleteID{{$subCategory->id}}">
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
