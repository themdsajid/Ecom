<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\registrationStoreRequest;
use App\Models\Addlogo;
use App\Models\MenuTag;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function loginForm()
    {
        $addLogo = Addlogo::find(1);
        $menuTags = MenuTag::where('field_status', 1)->get();
        return view('users.login', ['addLogo' => $addLogo, 'menuTags' => $menuTags]);
    }

    public function registrationForm()
    {
        $addLogo = Addlogo::find(1);
        $menuTags = MenuTag::where('field_status', 1)->get();
        return view('users.registration', ['addLogo' => $addLogo, 'menuTags' => $menuTags]);
    }

    public function registration(registrationStoreRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'User created successfully');
    }
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $sliders = Slider::all();
        $addLogo = Addlogo::find(1);
        $menuTags = MenuTag::where('field_status', 1)->get();

        return view('index', ['addLogo' => $addLogo, 'sliders' => $sliders, 'menuTags' => $menuTags]);
    }
}
