<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index() {
        $blogs = Blog::latest()->paginate(4);
        $recentBlogs = Blog::latest()->take(3)->get();
        return view('theme.index',compact('blogs','recentBlogs'));
    }
    public function category($id) {
        $categoryName = Category::find($id)->name;
        $blogs = Blog::where('category_id',$id)->paginate(8);
        return view('theme.category',compact('blogs','categoryName'));
    }
    public function contact() {
        return view('theme.contact');
    }
}
