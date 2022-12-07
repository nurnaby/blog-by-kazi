<?php

namespace App\Http\Controllers\Home;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory(){
        $BlogCategorys = BlogCategory::all();
        return view('admin.blog_category.all_blog_category',compact('BlogCategorys'));
    } //End method

    public function AddBlogCategory(){
        
        return view('admin.blog_category.add_blog_category');
    }// End method

    public function storeBlogCategory(Request $request){
        $request->validate([
            'blog_category'=>'required'
        ],[
            'required.blog_category'=>'blog category name is require'
        ]
        );
        BlogCategory::insert([
            'blog_category'=>$request->blog_category
        ]);
        $notification = array(
            'message'=> ' Add Blog Category successfully',
            'alert-type'=> 'success'
    );
   return redirect()->route('all.blog.category')->with($notification);
        
    }// End method
    public function EditBlogCategory($id){
        $BlogCategorys = BlogCategory::find($id);
        return view('admin.blog_category.edit_blog_category',compact('BlogCategorys'));
    }//End method

    public function UpdateBlogCategory(Request $request){

        $BlogCategorys = $request->id;
        BlogCategory::findOrFail($BlogCategorys)->update([
            'blog_category'=>$request->blog_category
        ]);
        $notification = array(
            'message'=> ' Update Blog Category successfully',
            'alert-type'=> 'success'
    );
   return redirect()->route('all.blog.category')->with($notification);

    }//End method

public function DeleteBlogCategory($id){
    BlogCategory::findOrFail($id)->delete();
        $notification = array(
            'message'=> ' delete Blog Category  successfully',
            'alert-type'=> 'info'
    );
    return redirect()->back()->with($notification);

    }//End method




}