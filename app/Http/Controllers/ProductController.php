<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('status', '1')->get();
        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', '1')->get();
        // dd($categories);
        return view('admin.product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        // dd($request);
        // $images = $request->file('images');
        // // dd($images);
        // foreach ($images as $image) {
        //     $imageName = $image->getClientOriginalName();
        //     $image->move(public_path('myProduct'), $imageName);
        // }

        // Store product data in the database
        $product = Product::create([
            'category_id' => $request->category_id,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
            'description2' => $request->description2,
            'review' => $request->review,
            'today_offer' => $request->today_offer,
            'super_deal' => $request->super_deal,
            'offers' => $request->offers,
            'status' => $request->status,
        ]);

        // Handle image uploads
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('myProduct'), $imageName);
                $images[] = $imageName;
            }
            // Save image paths to the product record
            $product->update(['images' => json_encode($images)]);
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        // dd($product->images);
        $json_images = json_decode($product->images);

        foreach($json_images as $json_image) {
            $filepath = public_path('/myProduct/' . $json_image);
            unlink($filepath);
        }

        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully');
    }
}
