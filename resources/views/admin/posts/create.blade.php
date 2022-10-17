@extends('layouts.app')

@section('content')
 <div class="container">
    <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        <h1>Edit Your Post</h1>
        <div class="form-group mb-3">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror"  id="category_id">
              <option {{(old('category_id')=="")?'selected':''}} value="">Altro</option>
               @foreach ($categories as $category)
              <option {{(old('category_id')==$category->id)?'selected':''}} value="{{$category->id}}">{{$category->name}}</option>  
              @endforeach
            </select>
            @error('category_id')
            <div class='invalid-feedbak'>
              {{$message}}
            </div>
           @enderror
          </div>
        <div class="form-group mb-3">
           
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror " id="title" name="title">
            @error('title')
            <div class='invalid-feedbak'>
              {{$message}}
            </div>
           @enderror
         </div>
          
          <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control">
            </textarea>
            @error('title')
            <div class='invalid-feedbak'>
              {{$message}}
            </div>
           @enderror
          </div>
          
          
          <div class='card p-3 mb-3'>
            <h1>Tag:</h1>
            @foreach ($tags as $tag)
              <div class="form-check form-group">

                <input  {{(in_array($tag->id, old('tags',[])))?'checked':''}}  name="tags[]" class="form-check-input" type="checkbox"  id="tag_{{$tag->id}}" value="{{$tag->id}}">
                <label class="form-check-label" for="tag_{{$tag->id}}">{{$tag->name}}</label> 
                
              </div>
           @endforeach
           <!--  @error('tags')
            <div class="alert alert-danger">
              {{$message}}
            </div>
           @enderror-->
           
          </div>
          
          <button type="submit" class="btn btn-primary">Save</button> 
      </form>

 </div>
  

    
@endsection