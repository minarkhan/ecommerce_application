<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderby('id', 'DESC')->get();
        return view('welcome', compact('posts'));
    }
    public function dashboard()
    {
        $posts = Post::orderby('id', 'DESC')->get();
        return view('dashboard', compact('posts'));
    }
    public function post_edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }
    public function post_update(Request $request, $id)
    {
        // return $request;

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;

        if($request->hasFile('image')){
            if($post->image != null){
                Storage::disk('public')->delete($post->image);
            }
            $image = $request->image;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/post/', $image_new_name);
            $post->image = '/storage/post/' . $image_new_name;
        }
        $post->save();

        return redirect(route('user.dashboard'));
    }
}
