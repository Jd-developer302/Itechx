<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    // Display a listing of all posts
    public function index()
    {


        $posts = Post::with('category')->get(); // Get all posts with their associated category
        $latestPosts = Post::with('category')->latest()->take(5)->get(); // Get latest posts
        return view('Frontend.post.index', compact('posts', 'latestPosts'));
    }

    // Get the latest posts (you can adjust the limit as needed)
   
}
