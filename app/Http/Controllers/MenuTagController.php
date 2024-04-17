<?php

namespace App\Http\Controllers;

use App\Models\MenuTag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slugs = MenuTag::all();
        return view('admin.menu_tag.all-menu-tag', ['slugs' => $slugs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.menu_tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        MenuTag::create([
            'page_name' => $request->page_name,
            'slug' => $request->slug,
        ]);

        return redirect()->back()->with('success', 'Menu created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(MenuTag $menuTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $slug = MenuTag::find($id);
        return view('admin.menu_tag.edit-menu', ['slug' => $slug]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $slug = MenuTag::find($id);
        $slug->page_name = $request->page_name;
        $slug->slug = $request->slug;
        $slug->save();

        return redirect()->back()->with('success', 'Menu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slug = MenuTag::find($id);
        $slug->delete();

        return redirect()->back()->with('success', 'Menu Tag deleted successfully');
    }
}
