<?php

namespace App\Http\Controllers\Home;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use Intervention\Image\Facades\Image;

class aboutController extends Controller
{
    public function AboutePage(){
        $aboutePage = About::find(1);
        return view('admin.aboutePage.aboutePage_all',compact('aboutePage'));
    } // End Method

    public function updatePage(Request $request){
        $aboutePage_id = $request->id;
        If($request->file('aboute_image')){
            $image = $request->file('aboute_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(623,852)->save('upload/aboute_page/'.$name_gen);
            $save_url = 'upload/aboute_page/'.$name_gen;
            About::findOrFail($aboutePage_id)->update([
                'title' =>$request->title,
                'short_title' =>$request->short_title,
                'short_description' =>$request->short_description,
                'long_description' =>$request->long_description,
                'aboute_image' =>$save_url,
            ]);
            $notification = array(
                'message'=> ' Update aboute page with image successfully',
                'alert-type'=> 'info'
        );
       return redirect()->back()->with($notification);
        }else{
            About::findOrFail($aboutePage_id)->update([
                'title' =>$request->title,
                'short_title' =>$request->short_title,
                'short_description' =>$request->short_description,
                'long_description' =>$request->long_description,
                
                
            ]);
            $notification = array(
                'message'=> ' Update aboute without image successfully',
                'alert-type'=> 'info'
        );
       return redirect()->back()->with($notification);
        }//End else
        
    } // End Method

    public function homeAboute(){
        $aboutePage = About::find(1);
        return view('frontend.homeAbout_page',compact('aboutePage'));
    }// End Method

    public function multiImage(){
        return view('admin.aboutePage.multiImage');
    }// End Method
    public function storeMultiImage(Request $request){
        $images = $request->file('multi_Image');
        foreach ($images as $image) {
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(220,220)->save('upload/multi_Image/'.$name_gen);
            $save_url = 'upload/aboute_page/'.$name_gen;
            About::insert([
                'aboute_image' =>$save_url,
                'created_at' =>Carbon::now()
            ]);
        } //End of the foreach
            $notification = array(
                'message'=> ' multiple  image upload  successfully',
                'alert-type'=> 'info'
        );
       return redirect()->back()->with($notification);
        

        
    }// End Method

}