<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Category, App\Product;
use App\City;
use DB;

class HomeController extends Controller
{
    public function index()
    {
      $category = Category::orderBy(DB::raw('RAND()'))->take(12)->get();
      $category_10 = DB::table('categories')
                ->join('sub_categories', 'categories.id', '=', 'sub_categories.category_id')
                ->join('products', 'sub_categories.id', '=', 'products.sub_category_id')
                 ->select('products.status', 'categories.category', 'categories.slug', DB::raw('count(*) as total'))
                 ->where('products.status', 'publish')
                 ->groupBy('categories.category','categories.slug')
                 ->orderBy('total', 'desc')
                 ->take(10)
                 ->get();
      $category_list = Category::orderBy(DB::raw('RAND()'))->get();
      $city = DB::table('products')
                  ->join('users', 'products.user_id', '=', 'users.id')
                  ->join('cities', 'users.city_id', '=', 'cities.id')
                 ->select('products.status', 'cities.city', 'cities.slug', DB::raw('count(*) as total'))
                 ->where('products.status', 'publish')
                 ->groupBy('cities.city','cities.slug')
                 ->orderBy('total', 'desc')
                 ->take(32)
                 ->get();
      $product = Product::where('status', 'publish')->orderBy('sundul_at', 'desc')->take(10)->get();
      $product_popular = Product::where('status', 'publish')->orderBy(DB::raw('RAND()'))->take(32)->get();
      return view('beranda.beranda', [
        'category' => $category,
        'category_10' => $category_10,
        'category_list' => $category_list,
        'product' => $product,
        'product_popular' => $product_popular,
        'city' => $city
        ]);
      //return dd($city);
    }
}
