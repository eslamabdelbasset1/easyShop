<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Categories
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{session('success')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <div class="card-header">
                            All Categories
                        </div>
                        <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
{{--                        @php($i = 1)--}}
                        @foreach ( $categories as $category)
                            <tr>
                                <td scope="row">{{$categories->firstItem()+$loop->index}}</td>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->user->name}}</td>
                                <td>
                                    @if ($category->created_at == null)
                                        <span class="text-danger">No data set</span>
                                        @else
                                        {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('category/edit/'.$category->id)}}" class="btn btn-info">Edit</a>
                                    <a href="{{url('softDelete/category/'.$category->id)}}" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td> {{$categories->links()}}</td>
                        </tr>
                    </tfoot>
                </table>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            Add Categories
                        </div>
                        <div class="card-body">
                            <form action="{{route('store_category')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    @error('category_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    {{--Trash Part--}}
        <div class="container py-4">
            <div class="row">
                <div class="col-md-9">
                    <div class="card ">
                        <div class="card-header">
                            Trash List
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--                        @php($i = 1)--}}
                            @foreach ( $trash_cat as $category)
                                <tr>
                                    <td scope="row">{{$trash_cat->firstItem()+$loop->index}}</td>
                                    <td>{{$category->category_name}}</td>
                                    <td>{{$category->user->name}}</td>
                                    <td>
                                        @if ($category->created_at == null)
                                            <span class="text-danger">No data set</span>
                                        @else
                                            {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('category/restore/'.$category->id)}}" class="btn btn-info">Restore</a>
                                        <a href="{{url('empty/category/'.$category->id)}}" class="btn btn-dark">Empty</a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td> {{$trash_cat->links()}}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="col-md-3">

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

