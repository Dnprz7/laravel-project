<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Image;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $sortBy = $request->input('sort_by');

        if (!empty($sortBy)) {
            switch ($sortBy) {
                case 'likes':
                    $images = Image::select('images.*')
                        ->leftJoinSub(
                            'SELECT image_id, COUNT(*) as likes_count FROM likes GROUP BY image_id',
                            'likes',
                            'images.id',
                            '=',
                            'likes.image_id'
                        )
                        ->orderByDesc('likes.likes_count')
                        ->get();
                    break;
                case 'dislikes':
                    $images = Image::select('images.*')
                        ->leftJoinSub(
                            'SELECT image_id, COUNT(*) as dislikes_count FROM dislikes GROUP BY image_id',
                            'dislikes',
                            'images.id',
                            '=',
                            'dislikes.image_id'
                        )
                        ->orderByDesc('dislikes.dislikes_count')
                        ->get();
                    break;
                case 'comments':
                    $images = Image::select('images.*')
                        ->leftJoinSub(
                            'SELECT image_id, COUNT(*) as comments_count FROM comments GROUP BY image_id',
                            'comments',
                            'images.id',
                            '=',
                            'comments.image_id'
                        )
                        ->orderByDesc('comments.comments_count')
                        ->get();
                    break;
                case 'recent':
                    $images = Image::orderBy('id', 'desc')->paginate(5);
                    break;
                case 'oldest':
                    $images = Image::orderBy('id', 'asc')->paginate(5);
                    break;
                default:
                    // Por defecto, mostrar las imágenes más recientes
                    $images = Image::orderBy('id', 'desc')->paginate(5);
                    break;
            }
        } else {
            $images = Image::orderBy('id', 'desc')->paginate(5);
        }

        return view('dashboard', [
            'images' => $images
        ]);
    }
}
