<?php

namespace App\Orders\Http\Controllers;

use App\Orders\Models\Orders;
use App\Orders\Models\OrderItems;
use App\Orders\Http\Controllers\Controller;
use App\Orders\Http\Requests\StoreOrdersRequest;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     * 
     */
    public function index()
    {
        try {
            $orders = Orders::all();
            return response()->json(['data' => $orders, 'message' => "operación ejecutada correctamente"], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrdersRequest $request)
    {
        try {
            $order = Orders::create($request->all());
            $orderItems = OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $request->product_id,
                'total_price' => $request->total_price
            ]);

            return response()->json(['data' => $orderItems, 'message' => 'Orden creada correctamente'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $order = Orders::find($id);



            if ($order) {
                return response()->json(['data' => $order->id, 'message' => 'Operación ejecutada correctamente'], 200);
            } else {
                return response()->json(['message' => 'Orden no encontrada'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreOrdersRequest $request, $id)
    {
        try {
            $order = Orders::find($id);
            if ($order) {
                $order->update($request->all());
                return response()->json(['data' => $order, 'message' => 'Orden actualizada correctamente'], 200);
            } else {
                return response()->json(['message' => 'Orden no encontrada'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $order = Orders::find($id);
            if ($order) {
                $order->delete();
                return response()->json(['message' => 'Orden eliminada correctamente'], 200);
            } else {
                return response()->json(['message' => 'Orden no encontrada'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
