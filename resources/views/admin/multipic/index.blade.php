<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Multi Picture
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="card-group">
                        @foreach ($images as $multiImages)
                            <div class="col-md-4 mt-5">
                                <div class="card">
                                    <img src="{{asset($multiImages->image)}}" alt="">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('store.image')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Multi Image</label>
                                    <input type="file" name="image[]" class="form-control"
                                           multiple="" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    @error('image')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Add Image</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

