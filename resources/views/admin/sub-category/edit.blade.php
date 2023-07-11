@extends('admin.master')
@section('body')
<div class="row mt-3">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Sub Category Form</h4>
                <hr/>
                <h4 class="text-center text-success">{{session('message')}}</h4>
                <form class="form-horizontal p-t-20" action="{{route('sub-category.update',['id' => $sub_category->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">Category Name<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <select class="form-control" name="category_id">
                            <option value="" disabled selected> -- Select Category -- </option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}" {{$category->id == $sub_category->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">Sub Category Name<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                    <input type="text" class="form-control"  name="name" value="{{$sub_category->name}}" id="" placeholder="Sub Category name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Sub Category Description<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <textarea class="form-control" name="description" id="exampleInputEmail3" placeholder="Category Description">{{$sub_category->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-3 control-label" for="web">Sub Category Image<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="file" name="image" id="input-file-now" class="dropify" />
                                <img src="{{asset($sub_category->image)}}" alt="" height="100" width="130"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <label class="me-3">
                                    <input type="radio"{{$sub_category->status == 1 ? 'checked' : ''}} name="status" value="1" checked >Published</label>
                                <label><input type="radio"{{$sub_category->status == 2 ? 'checked' : ''}} name="status" value="2">Un Published</label>

                            </div>
                        </div>
                    </div>
                    <div class="form-group row m-b-0">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update Sub Category Info</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
