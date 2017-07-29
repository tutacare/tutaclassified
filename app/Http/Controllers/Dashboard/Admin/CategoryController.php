<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use Input, Session, Redirect, Response;
use Storage, File, Image;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $category = Category::all();
    return view('dashboard.admin.category.index', ['category' => $category]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('dashboard.admin.category.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $category = new Category;
    $category->category = Input::get('category');
    $category->slug = str_slug(Input::get('category'), "-");


    // process upload product
    if(Input::hasFile('foto')) {
      $file = $request->file('foto');
      $fileName = 'CAT' . str_random(100) . '.' . $file->getClientOriginalExtension();
      Storage::put('category/'.$fileName,  File::get($file));
      $img = Image::make(storage_path('app/category/' . $fileName));
      $img->resize(160, null, function ($constraint) {
        $constraint->aspectRatio();
      });
      $category->foto = $fileName;
      $img->save();
      $category->save();
      Session::flash('message', 'Menambah kategori produk sukses!');
      return Redirect::to('dashboard/admin/category');
    }
    else
    {
      $category->save();
      Session::flash('message', 'Menambah kategori produk sukses!');
      return Redirect::to('dashboard/admin/category');
    }
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
    $category = Category::find($id);
    return view('dashboard.admin.category.edit', [
      'category' => $category
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
    $category = Category::findOrFail($id);


    $category->category = Input::get('category');
    $category->slug = str_slug(Input::get('category'), "-");

    // process image logo
    if(Input::hasFile('foto')) {
      $file = $request->file('foto');
      $fotoName = 'CAT' . $category->id . '.' . $file->getClientOriginalExtension();
      Storage::put('category/'.$fotoName,  File::get($file));
      $img = Image::make(storage_path('app/category/' . $fotoName));
      $img->resize(160, null, function ($constraint) {
        $constraint->aspectRatio();
      });
      $img->save();
      $category->foto = $fotoName;
    }

    $category->save();

    Session::flash('message', 'Ganti Kategori Produk Sukses');
    return Redirect::to('dashboard/admin/category');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $category = Category::find($id);
    $category->delete();
    Session::flash('message', 'Menghapus Kategori Produk Sukses');
    return Redirect::to('dashboard/admin/category');
  }

  public function getCategoryApi()
  {
    return Response::json(Category::all());
  }

}
