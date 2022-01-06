@extends('admin.admin_master')
@section('admin')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Update Contact</h2>
        </div>
        <div class="card-body">
            <form action="{{url('contact/update/'.$contact->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Contact Update Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{$contact->email}}" id="exampleFormControlInput1" placeholder="Slider title">
                    @error('email')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Contact Update Phone</label>
                    <input type="number" name="phone" class="form-control"
                           value="{{$contact->phone}}" id="exampleFormControlInput1" placeholder="Slider title">
                    @error('phone')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Contact Update Address</label>
                    <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3">
                        {{$contact->address}}
                    </textarea>
                    @error('address')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Update Contact</button>
                </div>
            </form>
        </div>
    </div>
@endsection
