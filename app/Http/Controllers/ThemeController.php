<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index() {
        return view('theme.index');
    }
    public function category() {
        return view('theme.category');
    }
    public function contact() {
        return view('theme.contact');
    }
    public function singleBlog() {
        return view('theme.single-blog');
    }
    public function login(Request $request) {
        return view('theme.login');
    }
    public function register() {
        return view('theme.register');
    }
}
