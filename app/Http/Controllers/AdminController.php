<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LogoUpdateRequest;
use App\Models\Addlogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        // Find the logo by ID
        $addlogo = Addlogo::find($id);

        // Check if the logo exists
        if (!$addlogo) {
            return redirect()->back()->with('error', 'Logo not found.');
        }

        // Handle file upload
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploadsLogo'), $imageName); // Move the uploaded file to a public directory (e.g., 'uploadsLogo')

            // Delete old image if it exists
            if ($addlogo->file) {
                $filePath = public_path($addlogo->file); // Construct the correct file path
                if (file_exists($filePath)) {
                    unlink($filePath); // Use unlink to delete the old image file
                }
            }

            // Update logo with new file path
            $addlogo->file = 'uploadsLogo/' . $imageName;
        }

        // Update logo name
        $addlogo->name = $request->name;

        // Save the updated logo
        $addlogo->save();

        return redirect()->back()->with('success', 'Logo updated successfully.');
    }
}
