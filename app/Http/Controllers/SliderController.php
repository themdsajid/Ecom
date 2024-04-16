<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderStoreRequest;
use App\Http\Requests\SliderUpdateRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('admin.allslider', ['sliders' => $sliders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createslider');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderStoreRequest $request)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('mySlider'), $imageName);
        $slider = Slider::create([
            'name' => $request->name,
            'file' => 'mySlider/' . $imageName,
        ]);

        return redirect()->back()->with('success', 'Slider Added Sucessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.editslider', ['slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderUpdateRequest $request, string $id)
    {
        $slider = Slider::find($id);

        // dd(request());
        if($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('mySlider'), $imageName);

            if($slider->file) {
                $filePath = public_path($slider->file);
                if(file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            $slider->file = 'mySlider/' . $imageName;
        }

        $slider->name = $request->name;
        $slider->save();

        return redirect()->back()->with('success', 'Slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);

        $filepath = public_path($slider->file);
        unlink($filepath);

        $slider->delete();

        return redirect()->back()->with('success', 'Slider deleted successfully');
    }
}
