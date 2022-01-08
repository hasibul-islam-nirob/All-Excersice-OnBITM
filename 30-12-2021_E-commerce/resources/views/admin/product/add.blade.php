@extends('admin.master')

@section('title')
    Add New Product
@endsection

@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Add New Product Form</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
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

                    <form class="form-horizontal" action="{{route('product.new')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <select name="category_id" id="categoryId" required class="form-control">
                                    <option value="" disabled selected>--Select Category--</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Sub Category Name</label>
                            <div class="col-sm-10">
                                <select name="sub_category_id" class="form-control" required id="subCategory">
                                    <option value="" disabled selected>--Select Sub Category--</option>
                                    @foreach($subcategories as $SubCategory)
                                        <option value="{{$SubCategory->id}}">{{$SubCategory->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Brand Name</label>
                            <div class="col-sm-10">
                                <select name="brand_id" class="form-control" required>
                                    <option value="" disabled selected>--Select Brand--</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Unit Name</label>
                            <div class="col-sm-10">
                                <select name="unit_id" class="form-control" required>
                                    <option value="" disabled selected>--Select Unit--</option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Product Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="name" placeholder="Product Name ">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Product Code</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" name="code" placeholder="Product Code ">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Regular Price</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="regular_price" placeholder="Regular Price ">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Selling Price</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" name="selling_price" placeholder="Selling Price ">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Short Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" type="text" name="short_description" placeholder="Short Description" ></textarea>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Long Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" type="text" name="long_description" placeholder="Long Description" id="summernote" data-plugin="summernote" data-air-mode="true" ></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Product Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="image" accept="image/*" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Product Sub Image</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="sub_image[]" multiple accept="image/*" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Publication Status</label>
                            <div class="col-sm-10">
                                <label for="">
                                    <input  type="radio" name="status" value="1" checked/> Publish </label>
                                <label for="">
                                    <input  type="radio" name="status" value="0"/> UnPublish
                                </label>
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-info" type="submit">Add New Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection