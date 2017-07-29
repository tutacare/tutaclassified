<?php
/**
 * Created by Irfan Mahfudz Guntur <mytuta.com>
 * Ads Components
 */
namespace App\Components;
use DB, Carbon;
use App\SubCategory, App\User;
use App\Product, App\City;

class Ads {

    public function get($slug, $var = 'get')
    {
      switch ($var) {
        case 'count':
            return DB::table('categories')
            ->join('sub_categories', 'categories.id', '=', 'sub_categories.category_id')
                  ->join('products', 'sub_categories.id', '=', 'products.sub_category_id')
                  ->select('categories.*', 'sub_categories.*', 'products.*')
                  ->where('categories.slug', $slug)
                  ->where('products.status', 'publish')
                  ->count();
            break;
        case 'sub_count':
            return DB::table('categories')
            ->join('sub_categories', 'categories.id', '=', 'sub_categories.category_id')
                  ->join('products', 'sub_categories.id', '=', 'products.sub_category_id')
                  ->select('categories.*', 'sub_categories.*', 'products.*')
                  ->where('products.status', 'publish')
                  ->where('sub_categories.slug', $slug)
                  ->count();
            break;
        case 'all_count':
            return DB::table('products')
                  ->select('products.*')
                  ->where('products.status', 'publish')
                  ->count();
            break;
        case 'sub_cat':
            return DB::table('categories')
            ->join('sub_categories', 'categories.id', '=', 'sub_categories.category_id')
            ->select('sub_categories.*')
            ->where('categories.slug', $slug)
            ->get();
            break;
        case 'subcategory':
            return DB::table('sub_categories')
            ->select('sub_categories.*')
            ->where('sub_categories.category_id', $slug)
            ->get();
            break;
        case 'city':
            return DB::table('cities')
            ->select('cities.*')
            ->where('cities.province_id', $slug)
            ->get();
            break;
        case 'sub':
            return DB::table('categories')
            ->join('sub_categories', 'categories.id', '=', 'sub_categories.category_id')
                  ->join('products', 'sub_categories.id', '=', 'products.sub_category_id')
                  ->join('users', 'products.user_id', '=', 'users.id')
                  ->join('cities', 'users.city_id', '=', 'cities.id')
                  ->select('categories.*', 'sub_categories.*', 'products.*', 'cities.*', 'products.slug as product_slug')
                  ->where('sub_categories.slug', $slug)
                  ->where('products.status', 'publish')
                  ->get();
        case 'all':
            return DB::table('categories')
            ->join('sub_categories', 'categories.id', '=', 'sub_categories.category_id')
                  ->join('products', 'sub_categories.id', '=', 'products.sub_category_id')
                  ->join('users', 'products.user_id', '=', 'users.id')
                  ->join('cities', 'users.city_id', '=', 'cities.id')
                  ->select('categories.*', 'sub_categories.*', 'products.*', 'cities.*', 'products.slug as product_slug')
                  ->where('products.status', 'publish')
                  ->get();
        case 'city_ads':
            return DB::table('categories')
            ->join('sub_categories', 'categories.id', '=', 'sub_categories.category_id')
                  ->join('products', 'sub_categories.id', '=', 'products.sub_category_id')
                  ->join('users', 'products.user_id', '=', 'users.id')
                  ->join('cities', 'users.city_id', '=', 'cities.id')
                  ->select('categories.*', 'sub_categories.*', 'products.*', 'cities.*')
                  ->where('products.status', 'publish')
                  ->where('cities.slug', $slug)
                  ->get();
        default:
            return DB::table('categories')
            ->join('sub_categories', 'categories.id', '=', 'sub_categories.category_id')
                  ->join('products', 'sub_categories.id', '=', 'products.sub_category_id')
                  ->join('users', 'products.user_id', '=', 'users.id')
                  ->join('cities', 'users.city_id', '=', 'cities.id')
                  ->select('categories.*', 'sub_categories.*', 'products.*', 'cities.*', 'products.slug as product_slug')
                  ->where('products.status', 'publish')
                  ->where('categories.slug', $slug)
                  ->get();
          }
    }
    public function getCity($cat_slug, $city_slug, $var = 'get')
    {
      switch ($var) {
      case 'count':
          return DB::table('categories')
          ->join('sub_categories', 'categories.id', '=', 'sub_categories.category_id')
                ->join('products', 'sub_categories.id', '=', 'products.sub_category_id')
                ->select('categories.*', 'sub_categories.*', 'products.*')
                ->join('users', 'products.user_id', '=', 'users.id')
                ->join('cities', 'users.city_id', '=', 'cities.id')
                ->select('categories.*', 'sub_categories.*', 'products.*', 'cities.*')
                ->where('products.status', 'publish')
                ->where('cities.slug', $city_slug)
                ->where('categories.slug', $cat_slug)
                ->count();
          break;
      default:
          return DB::table('categories')
          ->join('sub_categories', 'categories.id', '=', 'sub_categories.category_id')
                ->join('products', 'sub_categories.id', '=', 'products.sub_category_id')
                ->join('users', 'products.user_id', '=', 'users.id')
                ->join('cities', 'users.city_id', '=', 'cities.id')
                ->select('categories.*', 'sub_categories.*', 'products.*', 'cities.*')
                ->where('products.status', 'publish')
                ->where('cities.slug', $city_slug)
                ->where('categories.slug', $cat_slug)
                ->get();
      }
    }

    public function condition($con)
    {
      switch ($con) {
        case 0:
            return 'Bekas';
            break;
        case 1:
            return 'Baru';
            break;
        default:break;
          }
    }
    public function jam($time)
    {
        Carbon::setLocale('id');
        return  Carbon::createFromTimeStamp(strtotime($time))->diffForHumans();
    }
    public function fotoCount($f1,$f2,$f3,$f4,$f5)
    {
        $f1 = 1;
        if($f2 == null)
        {
          $f2 = 0;
        } else {
          $f2 = 1;
        }
        if($f3 == null)
        {
          $f3 = 0;
        } else {
          $f3 = 1;
        }
        if($f4 == null)
        {
          $f4 = 0;
        } else {
          $f4 = 1;
        }
        if($f5 == null)
        {
          $f5 = 0;
        } else {
          $f5 = 1;
        }
        $count = $f1 + $f2 + $f3 + $f4 + $f5;
        return $count;
    }

    public function harga($price, $nego)
    {
      $nego_data = '';
       if($nego == 1)
       {
       $nego_data = ' Nego';
        }
      $price_data = 'Rp. ' . number_format($price, 0, ',', '.') . $nego_data;
      return $price_data;
    }

    public function subCatLimit($id, $limit)
    {
      return SubCategory::where('category_id', $id)->take($limit);
    }

    public function count($get)
    {
      switch ($get) {
        case 'users':
            return User::count();
            break;
        case 'categories':
            return SubCategory::count();
            break;
        case 'cities':
            return City::count();
            break;
        case 'products':
            return Product::where('status', 'publish')->count();
            break;
        default:break;
          }
    }
    public function getCityAds($slug)
    {
      return DB::table('cities')
                  ->join('users', 'cities.id', '=', 'users.city_id')
                  ->join('products', 'users.id', '=', 'products.user_id')
                 ->select('cities.*', 'products.*', 'users.*')
                 ->where('products.status', 'publish')
                 ->where('cities.slug', $slug);
    }

    public function getAdsUser($id)
    {
      return DB::table('users')
            ->join('products', 'users.id', '=', 'products.user_id')
            ->join('sub_categories', 'sub_categories.id', '=', 'products.sub_category_id')
            ->join('categories', 'categories.id', '=', 'sub_categories.category_id')
            ->select('categories.*', 'sub_categories.*', 'products.*')
            ->where('users.id', $id);
    }

    public function getImage($string)
    {
      if(substr($string,0,3) == 'USR' || substr($string,0,3) == 'usr' || substr($string,0,3) == 'no-')
      {
        return '/images/user/' . $string;
      } else {
        return $string;
      }
    }
    // public function getCityAds($slug)
    // {
    //   return DB::table('cities')
    //               ->join('users', 'cities.id', '=', 'users.city_id')
    //               ->join('products', 'users.id', '=', 'products.user_id')
    //              ->select('cities.*', 'products.*', 'users.*')
    //              ->where('cities.slug', $slug)->get();
    // }
    // DB::table('products')
    //             ->join('users', 'products.user_id', '=', 'products.id')
    //             ->join('cities', 'users.city_id', '=', 'cities.id')
    //            ->select('cities.city', 'cities.slug', DB::raw('count(*) as total'))
    //            ->groupBy('cities.city','cities.slug')
    //            ->orderBy('sundul_at', 'desc')
    //            ->take(32)
    //            ->get();
}
