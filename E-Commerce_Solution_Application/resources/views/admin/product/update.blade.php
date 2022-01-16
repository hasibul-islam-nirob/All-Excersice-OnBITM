@extends('admin.master')

@section('title')
    Update Product
@endsection

@section('body')
    <div class="py-5">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Update Product Form</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                @if($message = Session::get('message'))
                    <h2 class="text-success text-center py-2" >{{$message}}</h2>
                @endif
                <form action="{{route('update.product',['id'=>$product->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal" id="form-sample-1" novalidate="novalidate">
                    @csrf
                    <div class="form-group row" >
                        <label class="col-sm-3 col-form-label" required>Category Name</label>
                        <div class="col-sm-9">
                            <select name="category_id" class="form-control">
                                <option value=""  >Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}} >{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" >
                        <label class="col-sm-3 col-form-label">Sub-Category Name</label>
                        <div class="col-sm-9">
                            <select name="sub_category_id" class="form-control" required>
                                <option value="" disabled >Select Category</option>
                                @foreach($subCategories as $subCategory)
                                    <option value="{{$subCategory->id}}" {{$product->sub_category_id == $subCategory->id ? 'selected' : ''}} > {{$subCategory->sub_category_name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" >
                        <label class="col-sm-3 col-form-label">Brand Name</label>
                        <div class="col-sm-9">
                            <select name="brand_id" class="form-control" required>
                                <option value="" disabled selected>Select Category</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" {{$product->brand_id == $brand->id ? 'selected' : ''}}>{{$brand->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Product Name</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{$product->product_name}}" name="product_name" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Product Quantity</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{$product->product_quantity}}" name="product_quantity" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Product Code</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{$product->product_code}}" name="product_code" required >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Regular Price</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{$product->regular_price}}" name="regular_price" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Selling Price</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{$product->selling_price}}" name="selling_price" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Short Description</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" value="{{$product->short_description}}" name="short_description" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Long Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="summernote" name="long_description" required placeholder="Long Description" >{{$product->long_description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Product Image</label>
                        <div class="col-sm-9">
                            <input class="form-control-file form-control" type="file"  name="product_image" accept="image/*" required/>
                            <img src="{{asset($product->product_image)}}" alt="" width="140" height="100">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Publication Status</label>
                        <div class="col-sm-9">
                            <div>
                                <label class="ui-radio ui-radio-primary ui-radio-inline">
                                    <input type="radio" name="status" value="1" {{$category->status == 1 ? 'checked' : ''}}>
                                    <span class="input-span"></span>Publish</label>
                                <label class="ui-radio ui-radio-primary ui-radio-inline">
                                    <input type="radio" name="status" value="0" {{$category->status == 0 ? 'checked' : ''}}>
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

@section('script')
    <script type="text/javascript">
        $(function() {
            $('#summernote').summernote();
            $('#summernote_air').summernote({
                airMode: true
            });
        });
    </script>
@endsection
