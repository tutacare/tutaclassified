<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class UserRequest extends Request
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
      return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    switch($this->method())
    {
    case 'GET':
    case 'DELETE':
    {
        return [];
    }
    case 'POST':
    case 'PUT':
      return [
          'name' => 'required',
          'email' => 'required|email|unique:users,email,' . Auth::id(),
          'username' => 'required|min:3|max:20|alpha_dash|unique:users,username,' . Auth::id(),
          'foto' => 'image|max:10024|mimes:jpeg,bmp,png',
          'phone' => 'required',
      ];
    case 'PATCH':
    default:break;
}
  }

  public function messages()
  {
      return [
          'foto.image' => 'Foto harus berjenis gambar',
          'foto.mimes' => 'Foto harus berjenis jpeg, bmp dan png.',
          'foto.max' => 'Ukuran Foto Maksimal 10MB',
          'name.required' => 'Nama tidak boleh kosong!',
          'email.required' => 'Email tidak boleh kosong!',
          'username.required' => 'Username tidak boleh kosong!',
          'phone' => 'No. Telp tidak boleh kosong'
      ];
  }
}
