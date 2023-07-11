@extends('admin.master')
@section('body')
<div class="row mt-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Brand Form</h4>
                <hr/>
                <h4 class="text-center text-success">{{session('message')}}</h4>
                <form class="form-horizontal p-t-20" action="{{route('Brand.update',['id' => $brand->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Brand Name<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">

                                <input type="text" class="form-control" value="{{$brand->name}}" name="name" id="exampleInputuname3" placeholder="Brand name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Brand Description<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <textarea class="form-control" name="description" id="exampleInputEmail3" placeholder="Brand Description">{{$brand->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-3 control-label" for="web">Brand Image<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="file" name="image" id="input-file-now" class="dropify" />
                                <img src="{{asset($brand->image)}}" alt="" height="100" width="130"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <label class="me-3">
                                    <input type="radio" name="status" {{$brand->status == 1 ? 'checked': ''}} value ="1">Published</label>
                                <label><input type="radio" name="status" {{$brand->status == 2 ? 'checked': ''}} value ="2">Un Published</label>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row m-b-0">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update Brand Information</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
