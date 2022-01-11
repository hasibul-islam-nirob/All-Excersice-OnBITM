@extends('Layout.master')

@section('title','Add category' )

@section('body')

    <div class="container">
        <form class="text-center border border-light p-5" action="#!">
            <h1 class=" mb-4">Category Form</h1>

            <div class="form-group  row">
                <h5 class="col-md-3">Category Name : </h5>
                <input type="text" name="name" class="col-md-9 form-control" >
            </div>

            <div class="form-group row">
                <h5 class="col-md-3">Category Description : </h5>
                <input type="text" name="description" class="col-md-9 form-control" >
            </div>

            <div class="form-group row">
                <h5 class="col-md-3">Category Image : </h5>
                <input type="file" name="image" class="col-md-9 form-control" >
            </div>

            <div class="row">
                <h5 class="col-md-3 col-form-label">Publication Status</h5>
                <div class="col-md-9">
                    <!-- Default unchecked disabled -->
                    <div class=" custom-radio">
                        <input type="radio" class="custom-control-input" value="1" id="status1" name="status" checked>
                        <label for="status1">Publish</label>
                    </div>

                    <!-- Default checked disabled -->
                    <div class=" custom-radio">
                        <input type="radio" class="custom-control-input" value="0" id="status2" name="status"  >
                        <label  for="status2">UnPublish</label>
                    </div>
                </div>
            </div>



            <button class="btn btn-info btn-block my-4" type="submit">Add Category</button>
        </form>
    </div>

@endsection
