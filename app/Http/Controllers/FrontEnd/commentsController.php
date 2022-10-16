<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\posts;
use App\Models\comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class commentsController extends Controller
{
    
    public function store(Request $request)
    {
        if (Auth::check()) {
            $validator = Validator::make($request->all(),[
                'comment_body' => 'required|string'
            ]);
        if ($validator->fails()) {
            return redirect()->back()->with('message', 'Comment in invalid');
        }

            $post = posts::where('slug', $request->post_slug)->where('status','1')->first();
            if ($post) {
                comments::create([
                    'post_id'      => $post->id,
                    'user_id'      => Auth::user()->id,
                    'comment_body' => $request->comment_body,
                ]);
                return redirect()->back()->with('sub_comment', 'Comment Has Been Submited');

            }
            else
            {
            return redirect()->back()->with('message', 'Post Not Found');
            }




        }
        else
        {
            return redirect('login')->with('message', 'Login First Please');
        }
    }


    public function destroy(Request $request)
    {
        if(Auth::check()){
            $comment = comments::where('id', $request->comment_id)
                                      ->where('user_id', Auth::user()->id)
                                      ->first();

            if($comment){
                $comment->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'comment Deleted Succesfully'
                ]);
            }
            else
            {
                return response()->json([
                    'status' => 500,
                    'message' => 'Somthing Went Wrong'
                ]);
            }

        }
        else
        {
            return response()->json([
                'status' => 401,
                'message' => 'Login To Delete This'
            ]);

        }
    }
}
