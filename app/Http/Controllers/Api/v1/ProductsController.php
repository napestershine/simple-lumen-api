<?php

namespace app\Http\Controllers\Api\v1;

use App\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProductsController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        try {
            $statusCode = 200;
            $response = Product::all();
        } catch (\Exception $e) {
            $statusCode = 500;
            $response = ['error' => 'Internal error'];
        }

        return response()->json($response, $statusCode);
    }

    public function show($id)
    {
        try {
            $statusCode = 200;
            $response = Product::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            $statusCode = 404;
            $response = ['error' => 'Product not found'];
        } catch (\Exception $e) {
            $statusCode = 500;
            $response = ['error' => 'Internal error'];
        }

        return response()->json($response, $statusCode);
    }

    public function store(Request $request)
    {
        try {
            $statusCode = 200;
            $response = Product::create($request->all());
        } catch (\Exception $e) {
            $statusCode = 500;
            $response = ['error' => 'Internal error'];
        }

        return response()->json($response, $statusCode);
    }

    public function update(Request $request, $id)
    {
        try {
            $statusCode = 200;

            $product = Product::findOrFail($id);
            $product->fill($request->all());
            $product->save();

            $response = $product;
        } catch (ModelNotFoundException $e) {
            $statusCode = 404;
            $response = ['error' => 'Product not found'];
        } catch (\Exception $e) {
            $statusCode = 500;
            $response = ['error' => 'Internal error'];
        }

        return response()->json($response, $statusCode);
    }

    public function destroy($id)
    {
        try {
            $statusCode = 200;
            $response = 'success';
            $product = Product::findOrFail($id);
            $product->delete();
        } catch (ModelNotFoundException $e) {
            $statusCode = 404;
            $response = ['error' => 'Product not found'];
        } catch (\Exception $e) {
            $statusCode = 500;
            $response = ['error' => 'Internal error'];
        }

        return response()->json($response, $statusCode);
    }
}
