<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LegalRequest extends Request
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
        return [
            'phone' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
        ];
      case 'PUT':
      case 'PATCH':
      default:break;
      }
    }

    public function messages()
    {
        return [
          'phone.required' => 'No. Telp tidak boleh kosong',
          'province_id.required' => 'Provinsi harus dipilih',
          'city_id.required' => 'Kota Harus dipilih'
        ];
    }

}
