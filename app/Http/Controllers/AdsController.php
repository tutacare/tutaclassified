<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product, App\Category;
use App\City, App\Province;
use App\SubCategory;
use DB, Ads, Carbon;

class AdsController extends Controller
{
    public function index($slug)
    {
      $ads = Product::where('slug', $slug)->first();
      $ads->increment('viewer', 1);
      return view('beranda.ads.index',['ads' => $ads]);
    }

    public function getAllCategory()
    {
       $category = Category::all();
       return view('beranda.category.all', [
         'ads' => Ads::get(null,'all'),
         'ads_all_count' => Ads::get(null, 'all_count'),
        //  'category' => $category,
        //  'ads_sub_cat' => Ads::get($slug, 'sub_cat'),
         'ads_category' => Category::all(),
          'ads_city' => City::all(),
          'ads_province' => Province::all()
         ]);
    }

    public function getCategory($slug)
    {
       $category = Category::where('slug', $slug)->first();
       return view('beranda.category.index', [
         'ads' => Ads::get($slug),
         'ads_count' => Ads::get($slug, 'count'),
         'category' => $category,
         'ads_sub_cat' => Ads::get($slug, 'sub_cat'),
         'ads_category' => Category::all(),
         'ads_city' => City::all(),
         'ads_province' => Province::all()
         ]);
    }
    public function getSubCategory($cat_slug, $sub_slug)
    {
       $sub_category = SubCategory::where('slug', $sub_slug)->first();
       $category = Category::where('slug', $cat_slug)->first();
       return view('beranda.sub-category.index', [
         'ads' => Ads::get($sub_slug, 'sub'),
         'ads_count' => Ads::get($sub_slug, 'sub_count'),
         'category' => $category,
         'ads_sub_cat' => Ads::get($cat_slug, 'sub_cat'),
         'ads_category' => Category::all(),
         'ads_city' => City::all(),
         'ads_province' => Province::all(),
         'sub_category' => $sub_category->name
         ]);
    }

    public function getCityCategory($cat_slug, $city_slug)
    {
       $category = Category::where('slug', $cat_slug)->first();
       return view('beranda.category.city', [
         'ads' => Ads::getCity($cat_slug, $city_slug, 'get'),
         'ads_city_count' => Ads::getCity($cat_slug, $city_slug, 'count'),
        'category' => $category,
         'city' => City::where('slug', $city_slug)->first(),
        //'ads_sub_cat' => Ads::get($slug, 'sub_cat'),
         'ads_category' => Category::all(),
          'ads_city' => City::all(),
          'ads_province' => Province::all()
         ]);
    }

}
