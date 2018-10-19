<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MultiImageRequest extends FormRequest
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
        $file = count($this->input('file'));
          foreach(range(0, $file) as $index) {
              $rules['file.' . $index] = 'image|mimes:jpeg,bmp,png|max:2000';
          }

          return $rules;
    }
}
