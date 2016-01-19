<?php

namespace app\Http\Controllers\Api\v1;

use App\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProductsController extends \App\Http\Controllers\Controller
{
    /**
     * List all the products.
     *
     * @return \Illuminate\Http\Response
     */
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
    /**
     * Return details about specific product.
     *
     * @param int $id
     * 
     * @return \Illuminate\Http\Response
     */
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
    /**
     * Store a new product in the database.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
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
    /**
     * Update the specified product.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified product from the database.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
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
