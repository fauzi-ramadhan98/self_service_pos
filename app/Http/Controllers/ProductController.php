<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    function __construct(){
        $this->middleware('user')->except('destroy');
    }

    public function index(){
        $product = Product::get();
        return view('product.index', compact('product'));
    }

    public function create(){
        //Tampilkan halaman create
        return view('product.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'product'       => 'required|min:6',
            'price'         => 'required',
            'stock'         => 'required',
        ], [
            'product.required'  => 'Nama Produk harus di isi.',
        ]);

        $validator->validate();

        Product::create([
            'product'      => $request->product,
            'price'        => $request->price,
            'stock'        => $request->stock,
        ]);

        return redirect('/product');
    }

    public function edit($id){
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    public function update($id, Request $request){
        $product = Product::find($id);
        $product->product = $request->product;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();
        return redirect('/product')->with('success','Data produk berhasil diupdate.');
    }

    public function destroy($id){
        $product = Product::find($id);
        if($product){
            $product->delete();
            return redirect('/product')->with('success','Data produk berhasil dihapus.');
        }else{
            return redirect('/product')->with('success','Data produk tidak ditemukan.');
        }
    }
}
