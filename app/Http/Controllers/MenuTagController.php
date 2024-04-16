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
    public function edit(MenuTag $menuTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MenuTag $menuTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuTag $menuTag)
    {
        //
    }
}
