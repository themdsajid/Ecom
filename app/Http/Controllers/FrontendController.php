<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Addlogo;
use App\Models\MenuTag;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $addLogo = Addlogo::find(1);
        $menuTags = MenuTag::where('field_status', 1)->get();
        return view('index', ['addLogo' => $addLogo, 'sliders' => $sliders, 'menuTags' => $menuTags]);
    }

    public function desert()
    {
        $addLogo = Addlogo::find(1);
        $menuTags = MenuTag::where('field_status', 1)->get();

        return view('category.desert', ['addLogo' => $addLogo, 'menuTags' => $menuTags]);
    }

    public function commcool()
    {
        $addLogo = Addlogo::find(1);
        $menuTags = MenuTag::where('field_status', 1)->get();

        return view('category.commcool', ['addLogo' => $addLogo, 'menuTags' => $menuTags]);
        // return view('category.commcool');
    }

    public function blog()
    {
        $addLogo = Addlogo::find(1);
        $menuTags = MenuTag::where('field_status', 1)->get();

        return view('blog', ['addLogo' => $addLogo, 'menuTags' => $menuTags]);
        // return view('blog');
    }

    public function videoGallery()
    {
        $addLogo = Addlogo::find(1);
        $menuTags = MenuTag::where('field_status', 1)->get();

        return view('video-gallery', ['addLogo' => $addLogo, 'menuTags' => $menuTags]);
        // return view('video-gallery');
    }

    public function contactUs()
    {
        $addLogo = Addlogo::find(1);
        $menuTags = MenuTag::where('field_status', 1)->get();

        return view('contact-us', ['addLogo' => $addLogo, 'menuTags' => $menuTags]);
        // return view('contact-us');
    }

    public function b2b_registration()
    {
        $addLogo = Addlogo::find(1);
        $menuTags = MenuTag::where('field_status', 1)->get();

        return view('b2b.registration', ['addLogo' => $addLogo, 'menuTags' => $menuTags]);
        // return view('b2b.registration');
    }
}
