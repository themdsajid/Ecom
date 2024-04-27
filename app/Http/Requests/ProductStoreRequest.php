<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming 2MB as max file size for each image
            'description' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'description2' => 'required',
            'review' => 'required',
            'today_offer' => 'required',
            'super_deal' => 'required',
            'offers' => 'required',
            'status' => 'required|in:0,1',
        ];
    }
}
