<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SubCategory, App\Category;
use Session, Redirect, Response;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $subcategory = SubCategory::all();
      return view('dashboard.admin.sub-category.index', ['subcategory' => $subcategory]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::lists('category', 'id');
        return view('dashboard.admin.sub-category.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $subcategory = new SubCategory;
      $subcategory->category_id = $request->get('category_id');
      $subcategory->name = $request->get('name');
      $subcategory->slug = str_slug($request->name, "-");
      $subcategory->save();
      Session::flash('message', 'Menambah Sub-Kategori sukses!');
      return Redirect::to('dashboard/admin/sub-category');
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
      $subcategory = SubCategory::find($id);
      $category = Category::lists('category', 'id');
      return view('dashboard.admin.sub-category.edit', [
        'subcategory' => $subcategory,
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
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->category_id = $request->get('category_id');
        $subcategory->name = $request->get('name');
        $subcategory->slug = str_slug($request->name, "-");
        $subcategory->save();
        Session::flash('message', 'Mengganti Sub-Kategori sukses!');
        return Redirect::to('dashboard/admin/sub-category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $subcategory = SubCategory::find($id);
      $subcategory->delete();
      Session::flash('message', 'Menghapus Sub-Kategori Sukses');
      return Redirect::to('dashboard/admin/sub-category');
    }

    public function getSubCategoryApiID($category_id)
    {
      return Response::json(SubCategory::where('category_id', $category_id)->get());
    }
}
