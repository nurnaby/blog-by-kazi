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

        Image::make($image)->resize(430,327)->save('upload/blog_image/'.$name_gen);
        $save_url = 'upload/blog_image/'.$name_gen;
        
        
        Blog::insert([
            'blog_category_id' =>$request->blog_category_id,
            'blog_title' =>$request->blog_title,
            'blog_description' =>$request->blog_description,
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
    }//End Method

    public function updateBlog(Request $request){
        
        $blog_id = $request->id;
       if($request->file('blog_image')){
        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    
        Image::make($image)->resize(430,327)->save('upload/blog_image/'.$name_gen);
        $save_url = 'upload/blog_image/'.$name_gen;
        Blog::findOrFail($blog_id)->update([
            'blog_category_id' =>$request->blog_category_id,
            'blog_title' =>$request->blog_title,
            'blog_description' =>$request->blog_description,
            'blog_tags' =>$request->blog_tags,
            'blog_image' =>$save_url,
            'created_at' => Carbon::now()
        ]);
       }else{
        Blog::findOrFail($blog_id)->update([
            'blog_category_id' =>$request->blog_category_id,
            'blog_title' =>$request->blog_title,
            'blog_description' =>$request->blog_description,
            'blog_tags' =>$request->blog_tags,
           
            'created_at' => Carbon::now()
        ]);

       }
    
        
        $notification = array(
            'message'=> ' Update blog successfully',
            'alert-type'=> 'success'
    );
    return redirect()->route('all.blog')->with($notification);
        
    }//End Method
    public function Delete_Blog($id){
        $Blogs = Blog::find($id);
        $image =$Blogs->blog_image;
        unlink($image);
        Blog::findOrFail($id)->delete();
        $notification = array(
            'message'=> ' delete Blog  successfully',
            'alert-type'=> 'info'
        ); 
        return redirect()->back()->with($notification);

        
    }//End Method
    public function Blog_details($id){
        $data['all_Category'] = BlogCategory::orderBy('blog_category','ASC')->get();
        $data['all_blog'] = Blog::latest()->limit(3)->get();
        $data['Blogs'] = Blog::findOrFail($id);
        return view('frontend.blog_detials',$data);
    }//End Method
    public function CategoryBlog($id){
        $data['all_Category'] = BlogCategory::orderBy('blog_category','ASC')->get();
        $data['all_blog'] = Blog::latest()->limit(3)->get();
        // $data['Blogs'] = Blog::findOrFail($id);
        $data['categoryBlog'] = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
       
        return view('frontend.cat_blog_delails',$data);
    }//End Method



}