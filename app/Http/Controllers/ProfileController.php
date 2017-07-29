<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth, Input, Session, Redirect;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ChangePasswordRequest;
use Storage, File, Image, Hash;
use App\Province, App\City;
use DB, Ads;

class ProfileController extends Controller
{

    public function index()
    {
      $ads_count = DB::table('products')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select('products.*')
            ->where('users.id', Auth::user()->id)
            ->where('products.status', 'publish')
            ->count();
      $ads_pending = DB::table('products')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select('products.*')
            ->where('users.id', Auth::user()->id)
            ->where('products.status', 'mod')
            ->get();
      $ads_pending_count = DB::table('products')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select('products.*')
            ->where('users.id', Auth::user()->id)
            ->where('products.status', 'mod')
            ->count();
        $user = User::findOrFail(Auth::user()->id);
        $province = Province::lists('province', 'id');
        $city = City::lists('city', 'id');
        return view('beranda.profile.index', [
          'user' => $user,
          'province' => $province,
          'city' => $city,
          'myads_count' => $ads_count,
          'myads_pending_count' => $ads_pending_count
          ]);
    }

    public function update(UserRequest $request, $id)
    {
      $users = User::find($id);
      $users->name = $request->input('name');
      $users->email = $request->input('email');
      $users->phone = $request->input('phone');
      $users->city_id = str_replace(['+', '-'], '', filter_var($request->input('city_id'), FILTER_SANITIZE_NUMBER_INT));
      if (Input::has('address'))
      {
      $users->address = Input::get('address');
      }
      if (Input::has('username'))
      {
      $users->username = Input::get('username');
      }
      // process image logo
      if(Input::hasFile('foto')) {
        $file = $request->file('foto');
        $fotoName = 'usr' . $users->id . '.' .
        $file->getClientOriginalExtension();
        Storage::put('user/'.$fotoName,  File::get($file));
        $img = Image::make(storage_path('app/user/' . $fotoName));
        $img->resize(256, null, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->save();
        $users->foto = $fotoName;
      }
      $users->save();

      Session::flash('message', 'Berhasil mengganti profil');
      return Redirect::to('user/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changePassword(ChangePasswordRequest $request, $id)
    {
      if(Input::has('password'))
      {
        $users = User::find($id);
        $users->password = Hash::make(Input::get('password'));
        $users->save();
        // redirect
        Session::flash('message', 'Berhasil mengganti password');
        return Redirect::to('user/profile');
      }
      else {
        Session::flash('message', 'Anda tidak mengganti password');
        Session::flash('alert-class', 'alert-warning');
        return Redirect::to('user/profile');
      }
    }

    public function getUser($username)
    {
      $user = User::where('username', $username)->first();
      $product = Ads::getAdsUser($user->id);
      return view('beranda.profile.show',
      [
        'user' => $user,
        'product' => $product
      ]);
    }

    public function ads()
    {
      $ads_count = DB::table('products')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select('products.*')
            ->where('users.id', Auth::user()->id)
            ->where('products.status', 'publish')
            ->count();
      $ads_pending = DB::table('products')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select('products.*')
            ->where('users.id', Auth::user()->id)
            ->where('products.status', 'mod')
            ->get();
      $ads_pending_count = DB::table('products')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select('products.*')
            ->where('users.id', Auth::user()->id)
            ->where('products.status', 'mod')
            ->count();
      $ads = DB::table('products')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select('products.*')
            ->orderBy('sundul_at', 'desc')
            ->where('users.id', Auth::user()->id)
            ->where('products.status', 'publish')
            ->get();
      return view('beranda.profile.ads',
      [
        'myads' => $ads,
        'myads_count' => $ads_count,
        'myads_pending' => $ads_pending,
        'myads_pending_count' => $ads_pending_count
      ]);
      // dd($ads);
    }

    public function adsPending()
    {
      $ads_count = DB::table('products')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select('products.*')
            ->where('users.id', Auth::user()->id)
            ->where('products.status', 'publish')
            ->count();
      $ads_pending = DB::table('products')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select('products.*')
            ->where('users.id', Auth::user()->id)
            ->where('products.status', 'mod')
            ->get();
      $ads_pending_count = DB::table('products')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select('products.*')
            ->where('users.id', Auth::user()->id)
            ->where('products.status', 'mod')
            ->count();
      $ads = DB::table('products')
            ->join('users', 'products.user_id', '=', 'users.id')
            ->select('products.*')
            ->where('users.id', Auth::user()->id)
            ->where('products.status', 'publish')
            ->get();
      return view('beranda.profile.ads',
      [
        //'myads' => $ads,
        'myads_count' => $ads_count,
        'myads' => $ads_pending,
        'myads_pending_count' => $ads_pending_count
      ]);
      // dd($ads);
    }
}
