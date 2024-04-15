<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Addlogo;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $addLogo = Addlogo::find(1);
        return view('index', ['addLogo' => $addLogo, 'sliders' => $sliders]);
    }

    public function desert()
    {
        return view('category.desert');
    }

    public function commcool()
    {
        return view('category.commcool');
    }

    public function blog()
    {
        return view('blog');
    }

    public function videoGallery()
    {
        return view('video-gallery');
    }

    public function contactUs()
    {
        return view('contact-us');
    }

    public function b2b_registration()
    {
        return view('b2b.registration');
    }
}
