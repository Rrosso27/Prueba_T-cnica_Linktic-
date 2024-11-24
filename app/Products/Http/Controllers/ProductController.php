<?php

namespace App\Products\Http\Controllers;

use App\Products\Models\Product;
use  App\Products\Http\Controllers\Controller;
use App\Products\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the product.
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function index()
    {
        try {
            $products = Product::all();
            return response()->json(['data' => $products, 'message' => "operación ejecutada correctamente"], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
    /**
     * Store a newly created product in storage.
     * @param StoreProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $product = Product::create($request->validated());
            return response()->json(['data' => $product, 'message' => "Producto creado correctamente  "], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified product.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $product = Product::find($id);
            if ($product) {
                return response()->json(['data' => $product, 'message' => "operación ejecutada correctamente"], 200);

            } else {
                return response()->json(['message' => 'Producto no encontrado'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
    /**
     * Update the specified product in storage.
     * @param StoreProductRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function update(StoreProductRequest $request, $id)
    {
        try {
            $product = Product::find($id);
            if ($product) {
                $product->update($request->validated());
                return response()->json(['data' => $product, 'message' => "Producto actualizado correctamente "], 200);
            } else {
                return response()->json(['message' => 'Producto no encontrado'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified product from storage.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        try {
            $product = Product::find($id);
            if ($product) {
                $product->delete();
                return response()->json(['data' => $product, 'message' => "Producto eliminado correctamente "], 200);

            } else {
                return response()->json(['message' => 'Producto no encontrado'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}
