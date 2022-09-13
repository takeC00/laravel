<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreRoomRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
      return [
        'name'=>'required|string|max: 20',
        'price'=>'required|integer|max: 99999',
        'introduction'=>'required|max: 140',
        'adress'=>'required',
        'image'=>'required|image',
      ];
    }
}
