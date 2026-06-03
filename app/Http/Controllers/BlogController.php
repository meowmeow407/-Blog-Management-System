<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        // Get all unique categories for the filters
        $categories = Blog::select('category')->distinct()->pluck('category');
        
        // Initial blog listing
        $blogs = Blog::latest()->paginate(9);

        return view('blogs.index', compact('blogs', 'categories'));
    }

    public function filter(Request $request)
    {
        $query = Blog::query();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        // Date filter
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->input('date'));
        }

        // Get filtered blogs
        $blogs = $query->latest()->paginate(9);

        // Return only the partial view for AJAX response
        return view('blogs._list', compact('blogs'))->render();
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $recentBlogs = Blog::where('id', '!=', $blog->id)->latest()->take(3)->get();
        
        return view('blogs.show', compact('blog', 'recentBlogs'));
    }
}
