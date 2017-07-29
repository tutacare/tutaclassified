<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator, Config, Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Input, Session, Redirect, Socialite;
use App\Province, App\City;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /* public function showRegistrationForm() {
       $province = Province::lists('province', 'id');
       $city = City::lists('city', 'id');
       return view('auth.register', [
         'province' => $province,
         'city' => $city
         ]);
    } */

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        //$user = Socialite::driver('facebook')->user();
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('auth/facebook');
        }


            $authUser = $this->findOrCreateUser($user);

            Auth::login($authUser, true);

            return Redirect::to('/');


          //$authUser = $this->findOrConnectUser($user);

          //Auth::login($authUser, true);


        //}

        // $user->token;
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $facebookUser
     * @return User
     */
    private function findOrCreateUser($facebookUser)
    {
        $authUser = User::where('facebook_id', $facebookUser->id)->first();

        if ($authUser){
            return $authUser;
        }

        if($facebookUser->getEmail())
        {
          $email = $facebookUser->getEmail();
        } else {
          $email = $facebookUser->getId() . '@facebook.com';
        }
        $username = $facebookUser->getId() . str_random(5);

        return User::create([
            'name' => $facebookUser->getName(),
            'email' => $email,
            'username' => $username,
            'facebook_id' => $facebookUser->getId(),
            'foto' => $facebookUser->getAvatar()
        ]);
    }

    // private function findOrConnectUser($facebookUser)
    // {
    //     $authUser = User::where('facebook_id', $facebookUser->id)->first();
    //
    //     if ($authUser){
    //       return Redirect::to('user/profile');
    //     }
    //
    //         $find = User::find(Auth::user()->id);
    //       return $find->update(array('facebook_id' => $facebookUser->getId()));
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      $messages = [
        'g-recaptcha-response.required' => 'Kode Keamanan harus diisi!',
        'name.required' => 'Nama tidak boleh kosong',
        'email.required' => 'Email tidak boleh kosong',
        'email.email' => 'Email harus benar',
        'username.required' => 'Username tidak boleh kosong',
        'password.required' => 'Password tidak boleh kosong',
        'password.min' => 'Minimal password 6 karakter',
        'phone.required' => 'No. Telp tidak boleh kosong',
        'province_id.required' => 'Provinsi harus dipilih',
        'city_id.required' => 'Kota Harus dipilih'
      ];
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|min:3|max:20|alpha_dash|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'g-recaptcha-response' => 'required',
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
      $recaptcha = new \ReCaptcha\ReCaptcha(Config::get('recaptcha.recaptcha_secret_key'));
      $resp = $recaptcha->verify(Input::get('g-recaptcha-response'), $_SERVER['REMOTE_ADDR']);
      if ($resp->isSuccess())
      {
        Session::flash('message', 'Selamat Datang ' . $data['name'] . ', Anda kini dapat berjualan di Betawaran!');
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'city_id' => str_replace(['+', '-'], '', filter_var($data['city_id'], FILTER_SANITIZE_NUMBER_INT)),
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
        }
        else
        {
            //$errors = $resp->getErrorCodes();
            Session::flash('message', 'Kode Keamanan Salah');
            return Redirect::to('register');
        }
    }
}
