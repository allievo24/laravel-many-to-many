<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $categories = Category::all();
        $tags= Tag::all();
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([

            'title'=>'required|max:255',
            'content'=>'required|max:65535',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id'

        ]); 
        $data = $request->all();    
        $post = new Post();
        $post->fill($data);
        
        /*metodo di laravel per rtasformare una stringa in slug.
        $slug= Str::slug($post->title, '-');
        $checkPost = Post::where('slug',$slug)->first();
        $counter =1;
        while($checkPost){
            $slug = Str::slug($post->title . '-' . $counter, '-');
            $counter++;
            $chekPost = Post::where('slug',$slug)->first();

        }*/
        
        $slug = $this-> calcolaSlug($post->title);
        
        $post->slug= $slug;
        
        $post->save();
        if(array_key_exists('tags',$data)){
          $post->tags()->sync($data['tags']);  
        }
        
        
        
        return redirect()->route('admin.posts.index')->with('status', 'Post creato con sucesso');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
       return view('admin.posts.show',compact('post')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([

            'title'=>'required|max:255',
            'content'=>'required|max:65535',
            'category_id' => 'nullable|exists:categories,id',
        ]); 
        
        $data = $request->all();
        
        $data['slug']= $this->calcolaSlug($data['title']);

        $post->update($data);

        return redirect()->route('admin.posts.index')->with('status','Post Aggiornato');

    }
    //metodo custom per calcolare lo slag
    protected function calcolaSlug($title){
        $slug= Str::slug($title, '-');
        
        $checkPost = Post::where('slug',$slug)->first();
        $counter =1;
        while($checkPost){
            $slug = Str::slug($title . '-' . $counter, '-');
            $counter++;
            $chekPost = Post::where('slug',$slug)->first();

        }
       
        return $slug;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
      $post->delete();
      return redirect()->route('admin.posts.index')->with('status','Post cancellato');
    }
}