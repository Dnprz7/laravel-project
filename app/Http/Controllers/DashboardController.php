<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Image;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $query = Image::query();

        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'default');

        if ($search) {
            $query->where('tag', 'LIKE', '%' . $search . '%');
        }

        switch ($sortBy) {
            case 'likes':
                $query->leftJoinSub(
                    'SELECT image_id, COUNT(*) as likes_count FROM likes GROUP BY image_id',
                    'likes',
                    'images.id',
                    '=',
                    'likes.image_id'
                );
                $query->orderByDesc('likes.likes_count');
                break;
            case 'dislikes':
                $query->leftJoinSub(
                    'SELECT image_id, COUNT(*) as dislikes_count FROM dislikes GROUP BY image_id',
                    'dislikes',
                    'images.id',
                    '=',
                    'dislikes.image_id'
                );
                $query->orderByDesc('dislikes.dislikes_count');
                break;
            case 'comments':
                $query->leftJoinSub(
                    'SELECT image_id, COUNT(*) as comments_count FROM comments GROUP BY image_id',
                    'comments',
                    'images.id',
                    '=',
                    'comments.image_id'
                );
                $query->orderByDesc('comments.comments_count');
                break;
            case 'recent':
                $query->orderByDesc('id');
                break;
            case 'oldest':
                $query->orderBy('id');
                break;
            default:
                $query->orderByDesc('id');
                break;
        }

        $images = $query->paginate(5);

        return view('dashboard', [
            'images' => $images,
            'search' => $search,
            'sortBy' => $sortBy
        ]);
    }

}
