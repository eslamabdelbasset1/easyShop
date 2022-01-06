@extends('admin.admin_master')
@section('admin')

    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>User Profile Update</h2>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="card-body">
            <form action="{{route('update.profile')}}" method="POST" class="form-pill">
                @csrf
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$user['name']}}">
{{--                    @error('current_password')--}}
{{--                    <span class="text-danger">{{$message}}</span>--}}
{{--                    @enderror--}}
                </div>
                <div class="form-group">
                    <label for="email">User Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$user['email']}}">
                </div>

                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
