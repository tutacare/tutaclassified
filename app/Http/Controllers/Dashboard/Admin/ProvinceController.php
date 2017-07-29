<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Province;
use Session, Redirect, Response;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $province = Province::all();
      return view('dashboard.admin.province.index', ['province' => $province]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.province.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $province = new Province;
      $province->province = $request->province;
      $province->save();
      Session::flash('message', 'Menambah provinsi sukses!');
      return Redirect::to('dashboard/admin/province');
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
      $province = Province::find($id);
      return view('dashboard.admin.province.edit', [
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
        $province = Province::findOrFail($id);
        $province->province = $request->get('province');
        $province->save();
        Session::flash('message', 'Mengganti provinsi sukses!');
        return Redirect::to('dashboard/admin/province');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $province = Province::find($id);
      $province->delete();
      Session::flash('message', 'Menghapus Provinsi Sukses');
      return Redirect::to('dashboard/admin/province');
    }

    public function getProvinceApi()
    {
      return Response::json(Province::all());
    }
}
