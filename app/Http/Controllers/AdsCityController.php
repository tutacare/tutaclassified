<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\City, App\Category;
use App\Province;
use Ads;

class AdsCityController extends Controller
{
    public function getAdsCitySlug($slug)
    {
      $city = City::where('slug', $slug)->first();
      return view('beranda.city.index', [
        'ads' => Ads::getCityAds($slug)->get(),
        'ads_count' => Ads::getCityAds($slug)->count(),
        'city' => $city,
        'ads_sub_cat' => Ads::get($slug, 'sub_cat'),
        'ads_category' => Category::all(),
        'ads_city' => City::all(),
        'ads_province' => Province::all()
        ]);
      //return dd(Ads::getCityAds($slug));
    }
}
