<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\UpdateBlogRequest;
use App\Http\Requests\StoreBlogRequest;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
            $categories = Category::all();
            return view('theme.blogs.create',compact('categories'));
        }
        else {
            return to_route('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();
        $image = $request->image;
        $newImageName = time() . '-' . $image->getClientOriginalName();
        $image->storeAs('blogs', $newImageName,'public');
        $data['image'] = $newImageName;
        $data['user_id'] = Auth::id();
        Blog::create($data);
        return back()->with('success', 'Blog post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('theme.single-blog',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if (Auth::check() && Auth::user()->id == $blog->user_id) {
            $categories = Category::all();
            return view('theme.blogs.edit',compact('categories','blog'));
        }
        else {
            return to_route('theme.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if (Auth::check() && Auth::user()->id == $blog->user_id) {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                Storage::delete("public/blogs/{$blog->image}");
                $image = $request->image;
                $newImageName = time() . '-' . $image->getClientOriginalName();
                $image->storeAs('blogs', $newImageName, 'public');
                $data['image'] = $newImageName;
            }
            $blog->update($data);
            return back()->with('success', 'Blog post updated successfully');
        }
        else {
            return to_route('theme.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if (Auth::check() && Auth::user()->id == $blog->user_id) {
            Storage::delete("public/blogs/{$blog->image}");
            $blog->delete();
            return back()->with('success', 'Blog post deleted successfully');
        }
        return to_route('theme.index');
    }

    /**
     * Display all user blogs
     */
    public function myBlogs()
    {
        if (Auth::check()) {
            $blogs = Blog::where('user_id', Auth::id())->paginate(10);
            return view('theme.blogs.my-blogs',compact('blogs'));
        }
        else {
            return to_route('login');
        }
    }
}
