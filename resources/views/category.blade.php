<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Category
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add Category
            </h2>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">USER_ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1
                    @endphp
                    @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$category->user_id}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->created_at->diffforhumans()}}</td>
                        <td>
                            <a href="{{ url('/CategoryController/edit'.$category->id) }}" class="btn btn-info">Update</a>
                            <a href="{{ url('/CategoryController/softdelete'.$category->id) }}" class="btn btn-danger">Remove</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <br>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table class="table">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Remove Category
                </h2>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">USER_ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Deleted_at</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1
                    @endphp
                    @foreach ($trashCat as $trash)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$trash->user_id}}</td>
                        <td>{{$trash->category_name}}</td>
                        <td>{{$trash->deleted_at->diffforhumans()}}</td>
                        <td>
                            <a href="{{url('/CategoryController/restore'.$trash->id)}}" class="btn btn-info">Restore</a>
                            <a href="{{url('/CategoryController/delete'.$trash->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>