<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan; // <-- Imported Artisan facade to flush the cache
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'mobile_no' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = \App\Models\User::create([
            'name' => $request->name,
            'username' => $request->username,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('admin.dashboard')->with('success', 'Account registered successfully!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function dashboard()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('admin.dashboard', compact('blogs'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'short_description' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            // Store image in public/blogs folder (inside storage/app/public/blogs)
            $imagePath = $request->file('image')->store('blogs', 'public');
        }

        Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . rand(1000, 9999), // guarantee uniqueness
            'category' => $request->category,
            'short_description' => $request->short_description,
            'content' => $request->content,
            'image_path' => $imagePath,
        ]);

        // CLEAR CACHE: Force updates to show up for everyone instantly
        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        return redirect()->route('admin.dashboard')->with('success', 'Blog created successfully!');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'short_description' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $blog->image_path;
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image_path) {
                Storage::disk('public')->delete($blog->image_path);
            }
            // Store new image
            $imagePath = $request->file('image')->store('blogs', 'public');
        }

        $blog->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . $blog->id, // unique slug using ID
            'category' => $request->category,
            'short_description' => $request->short_description,
            'content' => $request->content,
            'image_path' => $imagePath,
        ]);

        // CLEAR CACHE: Ensure modifications drop cached versions across all visitor devices
        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        return redirect()->route('admin.dashboard')->with('success', 'Blog updated successfully!');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        
        // Delete image file from storage
        if ($blog->image_path) {
            Storage::disk('public')->delete($blog->image_path);
        }

        $blog->delete();

        // CLEAR CACHE: Ensure deleted posts drop off from public dashboard listings instantly
        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        return redirect()->route('admin.dashboard')->with('success', 'Blog deleted successfully!');
    }
}