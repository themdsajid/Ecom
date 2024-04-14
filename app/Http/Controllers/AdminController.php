<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LogoUpdateRequest;
use App\Models\Addlogo;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logo()
    {
        return view('admin.logoform');
    }

    public function logoUpdate(LogoUpdateRequest $request, $id)
    {
        // Check if a file was uploaded
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploadsLogo'), $imageName); // Move the uploaded file to a public directory (e.g., 'uploadsLogo')
        }

        // Find the logo by ID and update its data
        $addlogo = Addlogo::find($id);

        if (!$addlogo) {
            return redirect()->back()->with('error', 'Logo not found.');
        }

        $addlogo->name = $request->name;
        $addlogo->file = 'uploadsLogo/' . $imageName; // Update the file path

        $addlogo->save();

        return redirect()->back()->with('success', 'Logo updated successfully.');
    }

}
