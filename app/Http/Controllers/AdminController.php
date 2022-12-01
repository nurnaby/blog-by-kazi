<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message'=> 'Logout  successfully',
            'alert-type'=> 'success'
    );
        return redirect('/login')->with($notification);
    } // End Method
    
    public function adminProfile(){
        $id = auth::user()->id;
        $userdata = User::find($id);
        return view('admin.admin_profile',compact('userdata'));
    } //End Method 

    public function adminEdit(){
        $id = auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_edit',compact('editData'));
    }// End Method

    public function adminUpdate(Request $request){
        $id = auth::user()->id;
        $data = User::find($id);
        $data->name     = $request->name;
        $data->email    = $request->email;
        $data->username = $request->username;

        if($request->file('profile_image')){
            $file = $request->file('profile_image');
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_image'),$fileName);
            $data['profile_image'] = $fileName;
        }
        $data->save();
        $notification = array(
                'message'=> 'profile Update successfully',
                'alert-type'=> 'info'
        );
       return redirect()->route('admin.profile')->with($notification);
        

    } //End Method

    public function changePassword(){
        return view('admin.userChangePassword');
    }//End Method

   public function storePassword(Request $request){
            $validate = $request->validate([
                'old_password'=> 'required',
                'new_password'=> 'required',
                'confim_pasword'=> 'required|same:new_password'
            ]);
   }
    //End Method

}