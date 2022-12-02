<?php

namespace App\Http\Controllers\Home;

use App\Models\Homesilde;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function HomeSlide(){
        $homeSlide = Homesilde::find(1);
        return view('admin.Home_slide.home_slide_all',compact('homeSlide'));
    }
}