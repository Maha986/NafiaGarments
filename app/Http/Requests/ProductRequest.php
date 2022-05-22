<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\Nullable;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required','string','max:255'],
            'categories' => ['required'],
            'description' => ['nullable','string'],
            'status' => ['required','numeric'],
            'product_weight'=>['required','numeric'],
            'purchase_cost' => ['numeric','required'],
            'purchase_discount' => ['numeric','nullable'],
            'purchase_discount_percentage' => ['numeric','nullable','min:1','max:100'],
            'price' => ['required','numeric'],
            'list_price_for_salesman' => ['numeric','required'],
            'commission_amount'=>['numeric','required'],
            'commission' => ['numeric','required','min:1','max:100'],
            'video_link' => ['string','nullable'],
            'labour_cost' => ['numeric','nullable'],
            'transportation_cost' => ['numeric','nullable'],
            'owner' => ['string','nullable','max:255'],
            'vendor' => ['string','nullable','max:255'],
        ];
    }
}
