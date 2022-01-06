@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>About</h4>
                        </div>
                        <div class="col-sm-6 pb-4">
                            <a href="{{route('add.about')}}">
                                <button class="btn btn-primary">Add About</button>
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
                            All About
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" width="5%">No</th>
                                <th scope="col" width="20%">Title</th>
                                <th scope="col" width="20%">Short Description</th>
                                <th scope="col" width="35%">Long Description</th>
                                <th scope="col" width="20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach ( $homeAbout as $about)
                                <tr>
                                    <td scope="row">{{$i++}}</td>
                                    <td>{{$about->title}}</td>
                                    <td>{{$about->short_desc}}</td>
                                    <td>{{$about->long_desc}}</td>
                                    <td>
                                        <a href="{{url('about/edit/'.$about->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{url('about/delete/'.$about->id)}}" class="btn btn-danger"
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



