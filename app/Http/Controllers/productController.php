<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Models\Product;

use Illuminate\Http\Request;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retrieving all products
        return response()->json(Product::orderBy('id', 'DESC')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    //ProductRequest imported form requests directory to validate the user input
    public function store(ProductsRequest $request)
    {
        //inserting new product
        try {
            $product = Product::create($request->all());
            return response()->json(['product' => $product]);

            //return error message if the operation could not be done
        } catch (Exception $err) {
            return response()->json(["message" => "Could not add product"], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // retrieving specif product
        return $product = Product::find($id);
        return $product->json(["product" => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    //ProductRequest imported form requests directory to validate the user input
    public function update(ProductsRequest $request, $id)
    {
        //updating product
        try {
            $product = Product::find($id);
            $product->update($request->all());

            return response()->json(['product' => $product]);

            //return error message if the operation could not be done
        } catch (Exception $err) {
            return response()->json(["message" => "not found"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete product
        Product::destroy($id);
        try {
            return response()->json(
                ['message' => "Product Deleted Successfully"]);
            //return error message if the operation could not be done
        } catch (Exception $err) {
            return response()->json(["message" => "Product not found"]);
        }

    }
}
