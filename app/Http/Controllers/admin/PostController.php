<?php

namespace App\Http\Controllers\admin;

use App\Models\posts;
use App\Models\categories;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\admin\PostFormRequest;

class PostController extends Controller
{
    //view post
    public function index()
    {
        $post['posts']= posts::all();
        return view('admin.post.index',$post);
    }
    // create post
    public function create()
    {
        $categories['categories'] = categories::where('status','1')->get();
        return view('admin.post.create',$categories);
    }
    // store post
    public function store(PostFormRequest $request)
    {
        $data                   = $request->validated();
        $post                   = new posts;
        $post->categorie_id     = $data['categorie_id'];
        $post->name             = $data['name'];
        $post->slug             = Str::slug($data['slug']);
        $post->description      = $data['description'];
        $post->yt_iframe        = $data['yt_iframe'];
        $post->meta_title       = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword     = $data['meta_keyword'];
        $post->status           = $request->status == true ? '1': '0';
        $post->created_by       = Auth::user()->id;
        $post->save();

        return redirect('/admin/posts')->with('message','Post Created successfully');
     
    }

    // edit posts
    public function edit($post_id)
    {
        $categorie['categories']= categories::where('status','1')->get();
        $post['posts'] = posts::find($post_id);
        return view('admin.post.edit',$post,$categorie);
    }

    // update posts
    public function update(PostFormRequest $request,$post_id)
    {
        $data                   = $request->validated();
        $post                   = posts::find($post_id);
        $post->categorie_id     = $data['categorie_id'];
        $post->name             = $data['name'];
        $post->slug             = Str::slug($data['slug']);
        $post->description      = $data['description'];
        $post->yt_iframe        = $data['yt_iframe'];
        $post->meta_title       = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword     = $data['meta_keyword'];
        $post->status           = $request->status == true ? '1': '0';
        $post->created_by       = Auth::user()->id;
        $post->update();

        return redirect('/admin/posts')->with('message','Post updated successfully');
    }

    // delete post
    public function delete($post_id)
    {
        $post = posts::find($post_id);
        $post->delete();
        return redirect('/admin/posts')->with('message','Post Deleted successfully');

    }
}
