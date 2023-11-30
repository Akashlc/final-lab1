<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Brand
        </h2>
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            <!-- Brand Table -->
            <div class="col-md-8 mx-auto">
                <div class="py-12">
                    <div class="max-w-7xl sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Brand
                        </h2>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Image</th>
                                    <th scope="col">Created_at</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1
                                @endphp
                                @foreach ($brands as $brand)
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$brand->brand_name}}</td>
                                    <td><img src="{{asset($brand->brand_image)}}" style="width:70px;height:40px;">
                                    </td>
                                    <td>{{$brand->created_at->diffforhumans()}}</td>
                                    <td>
                                        <a href="{{ url('/BrandController/edit'.$brand->id) }}" class="btn btn-info">Update</a>
                                        <a href="{{ url('/BrandController/softdelete'.$brand->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>

            <!-- Add Brand Form -->
            <div class="col-md-4">
                <div class="py-12 pl-3">
                    <div class="max-w-1xl sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Add Brand
                        </h2>
                        <form method="post" action="{{route('add.brand')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" class="form-control" name="brand_name" placeholder="Enter Brand Name">
                                @error('brand_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="id">Name</label>
                                <input type="file" class="form-control" name="brand_image" placeholder="Brand Image">
                                @error('brand_image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>