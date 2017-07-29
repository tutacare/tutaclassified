<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product, App\Category;
use App\City, App\Province;
use App\SubCategory;
use Redirect, DB, Ads;

class SearchController extends Controller
{
    public function search(Request $request)
    {
      if($request->has('q'))
      {
        $key = $request->q;
        $city = $request->city;
        $key_array = preg_split('/\s+/', $key);
        // $search_product = Product::where(function ($q) use ($key_array) {
        //   foreach ($key_array as $value) {
        //     $q->orWhere('product_title', 'LIKE', '%'. $value .'%')
        //     ->orWhere('product_description', 'LIKE', '%'. $value .'%');
        //   }
        // })->with('User')->with('City')->where('status','publish')->paginate(30);

        $search_product = DB::table('products')
              ->join('users', 'products.user_id', '=', 'users.id')
              ->join('cities', 'users.city_id', '=', 'cities.id')
              ->select('products.*', 'cities.*', 'users.*')
              ->where('cities.city', $city)
              ->where('products.status', 'publish')
              ->where('products.product_title', 'LIKE', '%'. $key .'%')
              ->orWhere('products.product_description', 'LIKE', '%'. $key .'%');

        return view('search.index', [
           'ads' => $search_product->get(),
           'page' => 'search',
           'query_search' => $key,
           //'ads' => Ads::get(null,'all'),
           'ads_all_count' => $search_product->count(),
          //  'category' => $category,
          //  'ads_sub_cat' => Ads::get($slug, 'sub_cat'),
           'ads_category' => Category::all(),
            'ads_city' => City::all(),
            'ads_province' => Province::all(),
            'city' => $city
          ]);
        //return dd($search_product);
      }
      else
      {
        return Redirect::to('/');
      }
    }
}
