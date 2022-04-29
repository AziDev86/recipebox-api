<?php

namespace App\Http\Requests;

use App\Models\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductsRequest extends FormRequest
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
    //validating user input
    public function rules(Request $request)
    {
        // if the request verb is "put or patch" accept duplicate (composite key unique ( name with row id))
        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            return [
                "name" => "unique:products,name,{$request->product},id",
            ];

        } else {
            return [
                "name" => "required|unique:products",
            ];
        }
    }
}
