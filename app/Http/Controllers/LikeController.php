<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LikeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $likes = Like::where('user_id', $user->id)->orderBy('id', 'desc')->paginate(5);

        return view('likes.index', [
            'likes' => $likes
        ]);
    }

    public function like($image_id)
    {
        $user = Auth::user();

        //IF LIKE EXIST
        $isser_like = Like::where("user_id", $user->id)->where("image_id", $image_id)->count();

        if ($isser_like == 0) {
            $like = new Like();
            $like->user_id = $user->id;
            $like->image_id = (int) $image_id;

            $like->save();

            return response()->json([
                "like" => $like,
                'count' => count($like->image->likes),
                'status' => 'undo_like',
            ]);
        } else {
            return response()->json([
                'status' => 'like-exist'
            ]);
        }
    }

    public function undo_like($image_id)
    {
        $user = Auth::user();

        $like = Like::where("user_id", $user->id)->where("image_id", $image_id)->first();

        if ($like) {

            $like->delete();

            return response()->json([
                "like" => $like,
                'count' => count($like->image->likes),
                'status' => 'undo_like'
            ]);
        } else {
            return response()->json([
                'status' => 'like-not-exist'
            ]);
        }
    }

}