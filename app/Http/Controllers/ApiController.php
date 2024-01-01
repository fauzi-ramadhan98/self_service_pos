<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ApiController extends Controller
{
    public function product_index(){
        $product = Product::get();
        return response()->json($product);
    }

    public function product_store(Request $request){
        Product::insert([
            'product'       => $request->api_product,
            'price'         => $request->api_price,
            'stock'         => $request->api_stock,
        ]);

        $response = array(
            'responseCode'      => '00',
            'responseStatus'    => 'Success'
        );
        return response()->json($response);
    }

    public function product_by_id($id){
        $product = Product::where('id', $id)->first();
        return response()->json($product);
    }

    public function product_update($id, Request $request){
        $product = Product::where('id', $id)->update([
            'product'       => $request->api_product,
            'price'         => $request->api_price,
            'stock'         => $request->api_stock
        ]);

        $response = array(
            'responseCode'      => '00',
            'responseStatus'    => 'Succes'
        );

        return response()->json($response);
    }

    public function product_delete($id){
        Product::where('id', $id)->delete();

        $response = array(
            'responseCode'      => '00',
            'responseStatus'    => 'Success Delete'
        );

        return response()->json($response);
    }

    public function create_product(){
        $formData = [
            'product'       => null,
            'price'         => null,
            'stock'         => null,
        ];

        return response()->json($formData);
    }
}
