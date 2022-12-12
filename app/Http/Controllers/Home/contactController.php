<?php

namespace App\Http\Controllers\Home;

use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class contactController extends Controller
{
    public function ContactMe(){
        return view('frontend.contact_me');
    }
    public function storeContactMe(Request $request){

        contact::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'phon'=>$request->phon,
            'message'=>$request->message,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message'=> ' Contact message  send successfully',
            'alert-type'=> 'info'
    );
    return redirect()->back()->with($notification);
    } //end methode 

    public function All_ContactMe(){
           $data['contacts'] = contact::latest()->get();
        return view('admin.all_contact',$data);
    }
    public function delete_ContactMe($id){
        contact::findOrFail($id)->delete();
           
           $notification = array(
            'message'=> ' Contact message  send successfully',
            'alert-type'=> 'info'
    );
    return redirect()->back()->with($notification);
        
    }



}