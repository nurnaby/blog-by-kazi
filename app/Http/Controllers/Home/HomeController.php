<?php

namespace App\Http\Controllers\Home;

use App\Models\Homesilde;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;


class HomeController extends Controller
{
    public function HomeSlide(){
        $homeSlide = Homesilde::find(1);
        return view('admin.Home_slide.home_slide_all',compact('homeSlide'));
    } // End Method

    
    public function updateHomeSlide(Request $request){
            $HomeSlide_id = $request->id;
            If($request->file('home_sild')){
                $image = $request->file('home_sild');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

                Image::make($image)->resize(623,852)->save('upload/home_slide/'.$name_gen);
                $save_url = 'upload/home_slide/'.$name_gen;

                Homesilde::findOrFail($HomeSlide_id)->update([
                    'title' =>$request->title,
                    'short_title' =>$request->short_title,
                    'video_url' =>$request->video_url,
                    'home_silde' =>$save_url,
                ]);
                $notification = array(
                    'message'=> ' Update Home slide with image successfully',
                    'alert-type'=> 'info'
            );
           return redirect()->back()->with($notification);
            }else{
                Homesilde::findOrFail($HomeSlide_id)->update([
                    'title' =>$request->title,
                    'short_title' =>$request->short_title,
                    'video_url' =>$request->video_url
                    
                ]);
                $notification = array(
                    'message'=> ' Update Home slide without image successfully',
                    'alert-type'=> 'info'
            );
           return redirect()->back()->with($notification);
            }//End else
    }// End Method
}