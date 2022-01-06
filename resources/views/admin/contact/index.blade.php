@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Contact page</h4>
                        </div>
                        <div class="col-sm-6 pb-4">
                            <a href="{{route('add.contact')}}">
                                <button class="btn btn-primary">Add Contact</button>
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
                            All Contacts
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" width="5%">No</th>
                                <th scope="col" width="35%">Contact Address</th>
                                <th scope="col" width="25%">Email</th>
                                <th scope="col" width="15%">Phone</th>
                                <th scope="col" width="20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach ( $contacts as $contact)
                                <tr>
                                    <td scope="row">{{$i++}}</td>
                                    <td>{{$contact->address}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->phone}}</td>
                                    <td>
                                        <a href="{{url('contact/edit/'.$contact->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{url('contact/delete/'.$contact->id)}}" class="btn btn-danger"
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



