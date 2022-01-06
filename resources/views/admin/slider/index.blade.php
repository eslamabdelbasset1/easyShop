@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Home - Slider</h4>
                        </div>
                        <div class="col-sm-6 pb-4">
                            <a href="{{route('add.slider')}}">
                                <button class="btn btn-primary">Add Slider</button>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{session('success')}}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">
                            All Slider
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" width="5%">No</th>
                                <th scope="col" width="15%">Title</th>
                                <th scope="col" width="45%">Description</th>
                                <th scope="col" width="15%">Image</th>
                                <th scope="col" width="20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach ( $sliders as $slider)
                                <tr>
                                    <td scope="row">{{$i++}}</td>
                                    <td>{{$slider->title}}</td>
                                    <td>{{$slider->description}}</td>
                                    <td>
                                        <img src="{{asset($slider->image)}}"
                                             style="width:60px;" alt=""></td>
                                    <td>
                                        <a href="{{url('slider/edit/'.$slider->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{url('slider/delete/'.$slider->id)}}" class="btn btn-danger"
                                           onclick="return confirm('Are you sure delete?')">Delete</a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
{{--                                <td> {{$slider->links()}}</td>--}}
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



