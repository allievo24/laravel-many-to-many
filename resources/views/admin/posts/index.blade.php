@extends('layouts.app')


@section('content')
    <div class="container">
        
        <a href="{{route('admin.posts.create')}}" class="btn btn-primary mb-3">Edit Post</a>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{$post->id}}</th>          
                        <td>{{$post->title}}</td>
                        <td>{{$post->slug}}</td>
                        <td>{{($post->category)?$post->category->name:"-"}}</td>

                        <td class="d-flex">
                            <a href="{{route('admin.posts.show',['post'=>$post->id])}}" class="btn btn-primary mr-auto">Show</a>
                            <a href="{{route('admin.posts.edit',['post'=>$post->id])}}" class="btn btn-warning mr-auto">Edit</a>
                            
                            <form action="{{route('admin.posts.destroy',['post'=>$post->id])}}" method="POST" >
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
