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

        return redirect('/login');
    }
    public function adminProfile(){
        $id = auth::user()->id;
        $userdata = User::find($id);
        return view('admin.admin_profile',compact('userdata'));
    }
    public function adminEdit(){
        $id = auth::user()->id;
        $editData = User::find($id);
        return view('admin.admin_edit',compact('editData'));
    }
}