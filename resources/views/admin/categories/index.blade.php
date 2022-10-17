@extends('layouts.app')


@section('content')
    <div class="container">
        
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>          
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>

                        <td class="d-flex">
                            <a href="{{route('admin.categories.show',['category'=>$category->id])}}" class="btn btn-primary mr-auto">Show</a>
                            <a href="{{route('admin.categories.edit',['category'=>$category->id])}}" class="btn btn-warning mr-auto">Edit</a>
                            
                            <form action="{{route('admin.categories.destroy',['category'=>$category->id])}}" method="POST" >
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
