<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\City, App\Province;
use Session, Redirect, Response;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $city = City::all();
      return view('dashboard.admin.city.index', ['city' => $city]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $province = Province::lists('province', 'id');
        return view('dashboard.admin.city.create', ['province' => $province]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $city = new City;
      $city->province_id = $request->get('province_id');
      $city->city = $request->get('city');
      $city->slug = str_slug($request->city, "-");
      $city->save();
      Session::flash('message', 'Menambah Kota sukses!');
      return Redirect::to('dashboard/admin/city');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $city = City::find($id);
      $province = Province::lists('province', 'id');
      return view('dashboard.admin.city.edit', [
        'city' => $city,
        'province' => $province
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);
        $city->province_id = $request->get('province_id');
        $city->city = $request->get('city');
        $city->slug = str_slug($request->city, "-");
        $city->save();
        Session::flash('message', 'Mengganti kota sukses!');
        return Redirect::to('dashboard/admin/city');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $city = City::find($id);
      $city->delete();
      Session::flash('message', 'Menghapus Kota Sukses');
      return Redirect::to('dashboard/admin/city');
    }

    public function getCityApiID($province_id)
    {
      return Response::json(City::where('province_id', $province_id)->get());
    }
}
