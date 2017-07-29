<?php

namespace App\Http\Controllers\Dashboard\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserPanelRequest;
use App\User;
use Session, Redirect, Response;
use Storage, File, Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = User::where('phone', '<>', 'null')->get();
      return view('dashboard.admin.user.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserPanelRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->city_id = str_replace(['+', '-'], '', filter_var($request->city_id, FILTER_SANITIZE_NUMBER_INT));
        $user->password = bcrypt($request->password);
        if ($request->has('address')) {
          $user->address = $request->address;
        }
        if ($request->hasFile('foto')) {
          $file = $request->file('foto');
          $fileName = 'USR' . str_random(100) . '.' . $file->getClientOriginalExtension();
          Storage::put('user/'.$fileName,  File::get($file));
          $img = Image::make(storage_path('app/user/' . $fileName));
          $img->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
          });
          $img->save();
          $user->foto = $fileName;
        }
          $user->save();
          Session::flash('message', 'Menambah Pengguna sukses!');
          return Redirect::to('dashboard/admin/user');
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
      $user = User::find($id);
      return view('dashboard.admin.user.edit', [
        'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserPanelRequest $request, $id)
    {
      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->username = $request->username;
      $user->phone = $request->phone;
      $user->role = $request->role;
      $user->city_id = str_replace(['+', '-'], '', filter_var($request->city_id, FILTER_SANITIZE_NUMBER_INT));
      if ($request->has('password')) {
        $user->password = bcrypt($request->password);
      }
      if ($request->has('address')) {
        $user->address = $request->address;
      }
      if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $fileName = 'USR' . str_random(100) . '.' . $file->getClientOriginalExtension();
        if($user->foto <> 'no-foto.png')
        {
        Storage::delete('user/' . $user->foto);
        }
        Storage::put('user/'.$fileName,  File::get($file));
        $img = Image::make(storage_path('app/user/' . $fileName));
        $img->resize(500, null, function ($constraint) {
          $constraint->aspectRatio();
        });
        $img->save();
        $user->foto = $fileName;
      }
        $user->save();
        Session::flash('message', 'Mengganti Data Pengguna sukses!');
        return Redirect::to('dashboard/admin/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::find($id);
      $user->delete();
      Session::flash('message', 'Menghapus Pengguna Sukses');
      return Redirect::to('dashboard/admin/user');
    }

    public function getData(Request $request)
    {
      //return Response::json(User::find($request->id));
      $user = User::find($request->id);
      return view('dashboard.admin.user.show', ['user' => $user]);
    }
}
