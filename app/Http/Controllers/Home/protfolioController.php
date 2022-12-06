<?php

namespace App\Http\Controllers\Home;

use App\Models\protfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class protfolioController extends Controller
{
    public function All_protfolio(){
        $all_portfolios = protfolio::latest()->get();
        return view('admin.protfolio.all_protfolio',compact('all_portfolios'));
    }//End methode
    
    public function add_protfolio(){
        return view('admin.protfolio.add_protfolio');
    }//End methode

    public function store_protfolio(Request $request){
        $request->validate([
            'protfolio_name'=> 'required',
            'protfolio_title'=> 'required',
            'protfolio_image'=> 'required'
        ],[
            'protfolio_name.required'=> 'protfolio name is Required',
            'protfolio_title.required'=> 'protfolio title is Required'
        ]);
        $image = $request->file('protfolio_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

        Image::make($image)->resize(623,852)->save('upload/portfoli_image/'.$name_gen);
        $save_url = 'upload/portfoli_image/'.$name_gen;
        protfolio::insert([
            'protfolio_name' =>$request->protfolio_name,
            'protfolio_title' =>$request->protfolio_title,
            'protfolio_description' =>$request->protfolio_description,
            'protfolio_image' =>$save_url,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message'=> ' Add portfoli successfully',
            'alert-type'=> 'success'
    );
   return redirect()->route('all.protfolio')->with($notification);
}

}