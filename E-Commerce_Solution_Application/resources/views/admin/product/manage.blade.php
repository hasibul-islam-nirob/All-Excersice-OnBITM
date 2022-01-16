@extends('admin.master')

@section('title')
    Product
@endsection

@section('body')

    <div class="">
        <!-- START PAGE CONTENT-->
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">All Product</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover table-responsive" id="example-table" cellspacing="0" width="100%">
                        @if($message = Session::get('message'))
                            <h2 class="text-success text-center py-2" >{{$message}}</h2>
                        @endif
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Product Image</th>
                            <th>Category Name</th>
                            <th>Sub-Category Name</th>
                            <th>Brand Name</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Product Code</th>
                            <th>Regular Price</th>
                            <th>Selling Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>

                        @foreach($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img src="{{$product->product_image}}" alt=""></td>
                                <td>{{$product->Category->category_name}}</td>
                                <td>{{$product->subCategory->sub_category_name}}</td>
                                <td>{{$product->Brand->brand_name}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->product_quantity}}</td>
                                <td>{{$product->product_code}}</td>
                                <td>{{$product->regular_price}}</td>
                                <td>{{$product->selling_price}}</td>
                                <td>{{$product->status == 1 ? 'Publish' : 'Unpublish' }}</td>
                                <td>
                                    <a href="{{route('edit-product',['id'=>$product->id])}}" class="btn btn-danger">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="" class="btn btn-success" onclick="event.preventDefault(); document.getElementById('productDeleteID{{$product->id}}').submit();">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form action="{{route('delete.product',['id'=>$product->id])}}" method="post" id="productDeleteID{{$product->id}}">
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
