@extends('admin.admin_master')
@section('admin')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Update About</h2>
        </div>
        <div class="card-body">
            <form action="{{url('about/update/'.$about->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">About Update Title</label>
                    <input type="text" name="title" class="form-control"
                           value="{{$about->title}}" id="exampleFormControlInput1" placeholder="Slider title">
                    @error('title')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Short Description</label>
                    <textarea name="short_desc" class="form-control" id="exampleFormControlTextarea1" rows="3">
                        {{$about->short_desc}}
                    </textarea>
                    @error('short_desc')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Long Description</label>
                    <textarea name="long_desc" class="form-control" id="exampleFormControlTextarea1" rows="3">
                        {{$about->long_desc}}
                    </textarea>
                    @error('long_desc')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update About</button>
                </div>
            </form>
        </div>
    </div>
@endsection
