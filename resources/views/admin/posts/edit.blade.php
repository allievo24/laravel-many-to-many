@extends('layouts.app')

@section('content')
 <div class="container">
    <form action="{{route('admin.posts.update',['post' => $post->id])}}" method="POST">
        @method('PUT')
        @csrf
        <h1>Edit Your Post</h1>

        <div class="form-group mb-3">
          <label for="category_id">Category</label>
          <select name="category_id" class="form-control @error('category_id') is-invalid @enderror"  id="category_id">
            <option {{(old('category_id')=="")?'selected':''}} value="">Altro</option>
             @foreach ($categories as $category)
            <option {{(old('category_id',$post->category_id)==$category->id)?'selected':''}} value="{{$category->id}}">{{$category->name}}</option>  
            @endforeach
          </select>
          @error('category_id')
          <div class='invalid-feedbak'>
            {{$message}}
          </div>
         @enderror
        </div>


        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror " id="title" name="title" value="{{old('content',$post->content)}}">
            @error('title')
           <div class='invalid-feedbak'>
            {{$message}}
           </div>
           @enderror
          </div>
          <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control @error('title') is-invalid @enderror">{{old('content',$post->content)}}
            </textarea>
             @error('title')
           <div class='invalid-feedbak'>
            {{$message}}
           </div>
           @enderror
          </div>
          
          <button type="submit" class="btn btn-primary">Update</button> 
      </form>

 </div>
  

    
@endsection