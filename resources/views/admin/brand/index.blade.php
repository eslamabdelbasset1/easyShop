<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Brand
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
                            All Brand
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Image</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--                        @php($i = 1)--}}
                            @foreach ( $brands as $brand)
                                <tr>
                                    <td scope="row">{{$brands->firstItem()+$loop->index}}</td>
                                    <td>{{$brand->brand_name}}</td>
                                    <td><img src="{{asset($brand->brand_image)}}"
                                        style="width:60px;" alt=""></td>
                                    <td>
                                        @if ($brand->created_at == null)
                                            <span class="text-danger">No data set</span>
                                        @else
                                            {{Carbon\Carbon::parse($brand->created_at)->diffForHumans()}}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('brand/edit/'.$brand->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{url('brand/delete/'.$brand->id)}}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure delete?')">Delete</a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td> {{$brands->links()}}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            Add Brand
                        </div>
                        <div class="card-body">
                            <form action="{{route('store.brand')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                                    <input type="text" name="brand_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    @error('brand_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Brand Image</label>
                                    <input type="file" name="brand_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    @error('brand_image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Add Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--Trash Part--}}
{{--        <div class="container py-4">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-9">--}}
{{--                    <div class="card ">--}}
{{--                        <div class="card-header">--}}
{{--                            Trash List--}}
{{--                        </div>--}}
{{--                        <table class="table">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th scope="col">No</th>--}}
{{--                                <th scope="col">Name</th>--}}
{{--                                <th scope="col">Email</th>--}}
{{--                                <th scope="col">Created At</th>--}}
{{--                                <th scope="col">Action</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            --}}{{--                        @php($i = 1)--}}
{{--                            @foreach ( $trash_cat as $category)--}}
{{--                                <tr>--}}
{{--                                    <td scope="row">{{$trash_cat->firstItem()+$loop->index}}</td>--}}
{{--                                    <td>{{$category->category_name}}</td>--}}
{{--                                    <td>{{$category->user->name}}</td>--}}
{{--                                    <td>--}}
{{--                                        @if ($category->created_at == null)--}}
{{--                                            <span class="text-danger">No data set</span>--}}
{{--                                        @else--}}
{{--                                            {{Carbon\Carbon::parse($category->created_at)->diffForHumans()}}--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        <a href="{{url('category/restore/'.$category->id)}}" class="btn btn-info">Restore</a>--}}
{{--                                        <a href="{{url('empty/category/'.$category->id)}}" class="btn btn-dark">Empty</a>--}}
{{--                                    </td>--}}

{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                            <tfoot>--}}
{{--                            <tr>--}}
{{--                                <td> {{$trash_cat->links()}}</td>--}}
{{--                            </tr>--}}
{{--                            </tfoot>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-md-3">--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</x-app-layout>

