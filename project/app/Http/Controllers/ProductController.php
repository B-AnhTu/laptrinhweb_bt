<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\Product;
use Validator;
use App\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $products = Product::all();

        return $this->sendResponse(ProductResource::collection($products), 'Products retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();

        $rules = [
            'name' => 'required|max:100',
            'price' => 'required',
            'detail' => 'required'
        ];

        $customMessages = [
            'price.required' => 'Price is required',
            'detail.required' => 'Detail is required',
            'name.max' => 'Name must not exceed 100 characters',
            'name.required' => 'Name is required',
        ];

        $validator = Validator::make($input, $rules, $customMessages);


        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $product = Product::create($input);

        return $this->sendResponse(new ProductResource($product), 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id): JsonResponse
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }

        return $this->sendResponse(new ProductResource($product), 'Product retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Product $product): JsonResponse
    {
        $input = $request->all();

        $rules = [
            'name' => 'required|max:100',
            'price' => 'required',
            'detail' => 'required'
        ];

        $customMessages = [
            'price.required' => 'Price is required',
            'detail.required' => 'Detail is required',
            'name.max' => 'Name must not exceed 100 characters',
            'name.required' => 'Name is required',
        ];

        $validator = Validator::make($input, $rules, $customMessages);


        if($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $product->name = $input['name'];
        $product->detail = $input['detail'];
        $product->price = $input['price'];
        $product->save();

        return $this->sendResponse(new ProductResource($product), 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return $this->sendResponse([], 'Product deleted successfully.');
    }
}
