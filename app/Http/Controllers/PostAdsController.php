<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category, App\Product;
use Auth, Input, Validator, Redirect;
use Storage, File, Image, Session;
use Carbon, Mail, Config;

class PostAdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::lists('category', 'id');
        return view('beranda.post-ads.index', [
          'category' => $category
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      if(!Input::hasFile('foto1'))
      {
          $rules = array(
          'foto1' => 'required|mimes:jpeg,bmp,png',
          );
          $messages = [
            'foto1.required' => 'Harap masukan Gambar Utama',
          ];
          $validator = Validator::make(Input::all(), $rules, $messages);
          if ($validator->fails())
          {
             return Redirect::to('post-ads')
            ->withErrors($validator);
          }
      }


      $product = new Product;
      $product->user_id = Auth::user()->id;
      $product->sub_category_id = str_replace(['+', '-'], '', filter_var(Input::get('sub_category_id'), FILTER_SANITIZE_NUMBER_INT));
      $product->product_title = Input::get('product_title');
      $product->condition = $request->condition;
      $product->product_description = Input::get('product_description');
      $product->product_price = str_replace(['+', '-'], '', filter_var($request->product_price, FILTER_SANITIZE_NUMBER_INT));
      if (Input::get('nego') === 'true') {
        $product->nego = true;
      } else {
        $product->nego = false;
      }
      $product->sundul_at = Carbon::now();
      $product->status = 'mod';


      // process upload foto1
      if(Input::hasFile('foto1')) {
        $file = $request->file('foto1');
        $fileName = uniqid('FT1_', true) . '.' . $file->getClientOriginalExtension();
        Storage::put('product/'.$fileName,  File::get($file));
        Storage::put('product/thumbnail/'.$fileName,  File::get($file));
        $img = Image::make(storage_path('app/product/' . $fileName));
        $thumbnail = Image::make(storage_path('app/product/thumbnail/' . $fileName));
        $background = Image::canvas(816, 460);
        $img->resize(816, 460, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        });
        $img->insert('betawaran/watermark.png', 'bottom-right');
        $thumbnail->resize(115, 115, function ($constraint) {
          $constraint->aspectRatio();
        });
        $background->insert($img, 'center');
        $product->foto1 = $fileName;
        $background->save(storage_path('app/product/' . $fileName));
        //$img->resizeCanvas(816, 460, 'center', false, array(255, 255, 255, 0));
        //$img->save();
        $thumbnail->resizeCanvas(115, 115, 'center', false, array(255, 255, 255, 0));
        $thumbnail->save();
      }
      // process upload foto2
      if(Input::hasFile('foto2')) {
        $file = $request->file('foto2');
        $fileName = 'FT2' . str_random(100) . '.' . $file->getClientOriginalExtension();
        Storage::put('product/'.$fileName,  File::get($file));
        $img = Image::make(storage_path('app/product/' . $fileName));
        //$background = Image::canvas(816, 460, '#ff0000');
        $img->resize(816, 460, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        });
        $img->insert('betawaran/watermark.png', 'bottom-right');
        //$background->insert($img, 'center');
        $product->foto2 = $fileName;
        //$background->save($fileName);
        $img->resizeCanvas(816, 460, 'center', false, array(255, 255, 255, 0));
        $img->save();
      }
      // process upload foto3
      if(Input::hasFile('foto3')) {
        $file = $request->file('foto3');
        $fileName = 'FT3' . str_random(100) . '.' . $file->getClientOriginalExtension();
        Storage::put('product/'.$fileName,  File::get($file));
        $img = Image::make(storage_path('app/product/' . $fileName));
        $img->resize(816, 460, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        });
        $img->insert('betawaran/watermark.png', 'bottom-right');
        $product->foto3 = $fileName;
        $img->resizeCanvas(816, 460, 'center', false, array(255, 255, 255, 0));
        $img->save();
      }
      // process upload foto4
      if(Input::hasFile('foto4')) {
        $file = $request->file('foto4');
        $fileName = 'FT4' . str_random(100) . '.' . $file->getClientOriginalExtension();
        Storage::put('product/'.$fileName,  File::get($file));
        $img = Image::make(storage_path('app/product/' . $fileName));
        $img->resize(816, 460, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        });
        $img->insert('betawaran/watermark.png', 'bottom-right');
        $product->foto4 = $fileName;
        $img->resizeCanvas(816, 460, 'center', false, array(255, 255, 255, 0));
        $img->save();
      }
      // process upload foto5
      if(Input::hasFile('foto5')) {
        $file = $request->file('foto5');
        $fileName = 'FT5' . str_random(100) . '.' . $file->getClientOriginalExtension();
        Storage::put('product/'.$fileName,  File::get($file));
        $img = Image::make(storage_path('app/product/' . $fileName));
        $img->resize(816, 460, function ($constraint) {
          $constraint->aspectRatio();
          $constraint->upsize();
        });
        $img->insert('betawaran/watermark.png', 'bottom-right');
        $product->foto5 = $fileName;
        $img->resizeCanvas(816, 460, 'center', false, array(255, 255, 255, 0));
        $img->save();
      }

        $product->save();
        $slug = Product::find($product->id);
        $search_slug = Product::where('slug', str_slug($product->product_title, "-"))->first();
        if($search_slug)
        {
          $slug->post_slug = str_slug($post->post_title, "-") . '-' . $post->id;
        } else {
          $slug->slug = str_slug($product->product_title, "-");
        }
        $slug->save();

        if(Config::get('myemail.myemail_active') == 'yes') {
        Mail::later(10, 'email.admin-notif', ['product_id' => $product->id, 'product_title' => $product->product_title], function($m) {
              $m->to(Config::get('myemail.myemail_email_to'), Config::get('myemail.myemail_email_name'))
                  ->subject('Produk terbaru sedang menunggu proses moderasi');
          });
        }

        Session::flash('message', 'Produk Anda telah kami terima, dan sedang dalam proses moderasi, produk Anda akan tampil setelah kami proses, terima kasih!');
        return Redirect::to('post-ads');

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
        //
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
        //
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
}
