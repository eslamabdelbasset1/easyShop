@extends('admin.admin_master')
@section('admin')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create Slider</h2>
        </div>
        <div class="card-body">
            <form action="{{url('slider/update/'.$sliders->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="old_image" value="{{$sliders->image}}" class="form-control">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Slider Update Title</label>
                    <input type="text" name="title" class="form-control"
                          value="{{$sliders->title}}" id="exampleFormControlInput1" placeholder="Slider title">
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Slider Description</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">
                        {{$sliders->description}}
                    </textarea>
                    @error('description')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Slider Image</label>
                    <input type="file" value="{{$sliders->image}}" name="image" class="form-control-file" id="exampleFormControlFile1">
                    @error('image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <img src="{{asset($sliders->image)}}" style="width: 300px;padding: 10px 0">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update Slider</button>
                </div>
            </form>
        </div>
    </div>
@endsection
