<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
  
    public function index() {
        
       $posts = auth()->user()->posts()->paginate(1);
        
        //$posts = Post::all();
      //  $posts->paginate(2);;

        return view('admin.posts.index',['posts' => $posts]);
    }

    public function show(Post $post) {
        
        return view('blog-post' , ['post' => $post]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store() {

        $this->authorize('create' , Post::class);

        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);

        if(request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);

        session()->flash('created-post-message' , 'Post has been created');

        return redirect()->route('posts.index');  
    }

    public function edit(Post $post) {

        $this->authorize('view' , $post);

        return view('admin.posts.edit' , ['post' => $post]);
    }

    public function destroy(Post $post , Request $request) {
       
        $this->authorize('delete' , $post);

        $post->delete();

        $request->session()->flash('message' , 'Post has been deleted');

        return back();
    }

    public function update(Post $post) {
        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);

        if(request('post_image')) {
            $inputs['post_image'] = request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];

        //auth()->user()->posts()->save($post);
        $this->authorize('update',$post);

        $post->save();

        session()->flash('post-updated-message' , 'Post has been updated');

        return redirect()->route('posts.index');
    }   
}
