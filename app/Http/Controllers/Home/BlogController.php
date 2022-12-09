<?php

namespace App\Http\Controllers\Home;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function AllBlog(){
        $Blogs = Blog::latest()->get();
        return view('admin.blog.allBlog',compact('Blogs'));
    }//End Method

    public function Add_Blog(){
                $blogCategorys = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blog.AddBlog',compact('blogCategorys'));
    }//End Method
    public function storeBlog(Request $request){
        $request->validate([
            'blog_title'=> 'required',
            'blog_description'=> 'required',
            
        ],[
            'blog_title.required'=> 'blog title name is Required',
            'blog_description.required'=> 'blog description protfolio title is Required'
        ]);
        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->resize(1020,519)->save('upload/blog_image/'.$name_gen);
        $save_url = 'upload/blog_image/'.$name_gen;
        
        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->resize(1020,519)->save('upload/portfoli_image/'.$name_gen);
        $save_url = 'upload/portfoli_image/'.$name_gen;
        Blog::insert([
            'blog_category_id' =>$request->blog_category_id,
            'blog_title' =>$request->blog_title,
            'blog_tags' =>$request->blog_tags,
            'blog_image' =>$save_url,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message'=> ' Add Blog successfully',
            'alert-type'=> 'success'
    );
   return redirect()->route('all.blog')->with($notification);

    }//End Method

    public function Edit_Blog($id){
        $Blogs = Blog::find($id);
        $blogCategorys = BlogCategory::orderBy('blog_category','ASC')->get();

        return view('admin.blog.editBlog',compact('Blogs','blogCategorys'));
    }//


}