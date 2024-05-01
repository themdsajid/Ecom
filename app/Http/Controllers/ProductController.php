<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = Product::where('status', '1')->get();
        $products = Product::all();
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
            'name' => $request->name,
            'slug' => $request->slug,
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
        // $product = Product::find($id);

        // Decrypt the ID
        try {
            $decryptedId = Crypt::decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404); // Handle decryption failure (e.g., invalid payload)
        }

        // Use the decrypted ID to find and display the product
        $product = Product::find($decryptedId);

        // Handle cases where the product is not found
        if (!$product) {
            abort(404); // Or your custom logic
        }

        return view('admin.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::where('status', '1')->get();

        // Decrypt the ID
        try {
            $decryptedId = Crypt::decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404); // Handle decryption failure (e.g., invalid payload)
        }

        // Use the decrypted ID to find and display the product
        $product = Product::find($decryptedId);

        // Handle cases where the product is not found
        if (!$product) {
            abort(404); // Or your custom logic
        }

        return view('admin.product.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        // Update product attributes directly from the validated request
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->description2 = $request->description2;
        $product->review = $request->review;
        $product->today_offer = $request->today_offer;
        $product->super_deal = $request->super_deal;
        $product->offers = $request->offers;
        $product->status = $request->status;

        // Save the updated product
        $product->save();

        // Handle image uploads if any
        if ($request->hasFile('images')) {

            if ($product->images) {
                $json_images = json_decode($product->images);

                foreach ($json_images as $json_image) {
                    $filepath = public_path('myProduct/' . $json_image);
                    unlink($filepath);
                }
            }

            // dd('hello');
            // $images = $request->file('images');
            // dd($images);
            $images = [];

            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('myProduct'), $imageName);
                $images[] = $imageName;
            }
            // dd($images);
            // Update the product's image paths in the database
            $product->images = json_encode($images);
            $product->save();
        }

        // Redirect back with success message or to a specific route
        return redirect()->back()->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd('hello');
        // $product = Product::find($id);

        // Decrypt the ID
        try {
            $decryptedId = Crypt::decrypt($id);
        } catch (\Illuminate\Contracts\Encryption\DecryptException $e) {
            abort(404); // Handle decryption failure (e.g., invalid payload)
        }

        // Use the decrypted ID to find and display the product
        $product = Product::find($decryptedId);

        // Handle cases where the product is not found
        if (!$product) {
            abort(404); // Or your custom logic
        }

        // dd($product->images);
        if ($product->images) {
            $json_images = json_decode($product->images);

            foreach ($json_images as $json_image) {
                $filepath = public_path('/myProduct/' . $json_image);
                unlink($filepath);
            }
        }


        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully');
    }

    public function exportProducts()
    {
        // Fetch data from the database (e.g., users table)
        $products = Product::all();

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Category_ID');
        $sheet->setCellValue('C1', 'Name');
        $sheet->setCellValue('D1', 'Slug');
        $sheet->setCellValue('E1', 'Images');
        $sheet->setCellValue('F1', 'Description');
        $sheet->setCellValue('G1', 'Price');
        $sheet->setCellValue('H1', 'Discount');
        $sheet->setCellValue('I1', 'Description2');
        $sheet->setCellValue('J1', 'Review');
        $sheet->setCellValue('K1', 'Today_offer');
        $sheet->setCellValue('L1', 'Super_Deal');
        $sheet->setCellValue('M1', 'Offers');
        $sheet->setCellValue('N1', 'Status');
        $sheet->setCellValue('O1', 'Created_AT');

        // Set data rows
        $row = 2;
        foreach ($products as $product) {
            $sheet->setCellValue('A' . $row, $product->id);
            $sheet->setCellValue('B' . $row, $product->category_id);
            $sheet->setCellValue('C' . $row, $product->name);
            $sheet->setCellValue('D' . $row, $product->slug);
            $sheet->setCellValue('E' . $row, $product->images);
            $sheet->setCellValue('F' . $row, $product->description);
            $sheet->setCellValue('G' . $row, $product->price);
            $sheet->setCellValue('H' . $row, $product->discount);
            $sheet->setCellValue('I' . $row, $product->description2);
            $sheet->setCellValue('J' . $row, $product->review);
            $sheet->setCellValue('K' . $row, $product->today_offer);
            $sheet->setCellValue('L' . $row, $product->super_deal);
            $sheet->setCellValue('M' . $row, $product->offers);
            $sheet->setCellValue('N' . $row, $product->status);
            $sheet->setCellValue('O' . $row, $product->created_at);
            $row++;
        }

        // Create a writer object
        $writer = new Xlsx($spreadsheet);

        // Set the headers for Excel file download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="products.xlsx"');

        // Write the spreadsheet data to the response
        $writer->save('php://output');
    }
}
