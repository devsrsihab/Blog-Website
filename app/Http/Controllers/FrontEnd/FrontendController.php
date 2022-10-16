<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\posts;
use App\Models\settings;
use App\Models\categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    // index method
    public function index()
    {
        $setting = settings::find(1);
        $all_categories = categories::where('status','1')->get();
        $latest_posts = posts::where('status','1')->orderBy('created_at','DESC')->get()->take(10);
        return view('frontend.index',compact('all_categories','latest_posts','setting'));
    }

    // viewCategoriePost method
    public function viewCategoriePost(string $categorie_slug)
    {
        $categorie = categories::where('slug', $categorie_slug)->where('status','1')->first();
        if ($categorie) {
            $posts= posts::where('categorie_id',$categorie->id)->where('status','1')->paginate(3);
            return view('frontend.posts.index',compact('posts','categorie'));
        }
        else
        {
         return redirect('/');   
        }
    }

    // viewPost method
    public function viewPost(string $categorie_slug, string $post_slug)
    {
        $categorie = categories::where('slug', $categorie_slug)->where('status','1')->first();
        
        if ($categorie) {
            $posts= posts::where('categorie_id',$categorie->id)->where('status','1')->where('slug',$post_slug)->first();
            $latest_posts = posts::where('categorie_id',$categorie->id)->where('status','1')->orderBy('created_at','DESC')->get()->take(3);
            return view('frontend.posts.singleView',compact('posts','latest_posts'));
        }
        else
        {
         return redirect('/');   
        }
    }
}
