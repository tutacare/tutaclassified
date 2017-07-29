<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use Input, Session, Redirect, Carbon;
use Storage;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $product_publish = Product::where('status','publish')->get();
    $product_mod = Product::where('status','mod')->get();
    return view('dashboard.admin.product.index', [
      'product_publish' => $product_publish,
      'product_mod' => $product_mod
      ]);
  }
  public function show($id)
  {
    $product = Product::findOrFail($id);
    return view('dashboard.admin.product.show', [
      'product' => $product
      ]);
  }
  public function saveMod(Request $request, $id)
  {
    $product = Product::findOrFail($id);
    $product->product_title = Input::get('product_title');
    $product->product_description = Input::get('product_description');
    $product->status = Input::get('status');
    $product->sundul_at = Carbon::now();
    $product->save();

    Session::flash('message', 'Proses Moderasi Sukses');
    return Redirect::to('dashboard/admin/product');

  }
  public function destroy($id)
  {
    $product = Product::find($id);
    Storage::delete('product/' . $product->foto1);
    Storage::delete('product/thumbnail/' . $product->foto1);
    if($product->foto2){Storage::delete('product/' . $product->foto2);}
    if($product->foto3){Storage::delete('product/' . $product->foto3);}
    if($product->foto4){Storage::delete('product/' . $product->foto4);}
    if($product->foto5){Storage::delete('product/' . $product->foto5);}
    $product->delete();
    Session::flash('message', 'Menghapus Produk Sukses');
    return Redirect::to('dashboard/admin/product');
  }
}
