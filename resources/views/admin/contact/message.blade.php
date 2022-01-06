@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-6 py-4">
                            <h4>Contact Message page</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            All Message Data
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" width="5%">No</th>
                                <th scope="col" width="15%">Name</th>
                                <th scope="col" width="20%">Email</th>
                                <th scope="col" width="20%">subject</th>
                                <th scope="col" width="25%">Message</th>
                                <th scope="col" width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach ( $messages as $message)
                                <tr>
                                    <td scope="row">{{$i++}}</td>
                                    <td>{{$message->name}}</td>
                                    <td>{{$message->email}}</td>
                                    <td>{{$message->subject}}</td>
                                    <td>{{$message->message}}</td>
                                    <td>
                                        <a href="{{url('message/delete/'.$message->id)}}" class="btn btn-danger"
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



