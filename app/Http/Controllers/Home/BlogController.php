<?php

namespace App\Http\Controllers\Home;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function AllBlog(){
        $Blogs = Blog::latest()->get();
        return view('admin.blog.allBlog',compact('Blogs'));
    }
}