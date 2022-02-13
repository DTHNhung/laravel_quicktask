<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
        if ($this->route()->getName() == 'cars.update') {
            $rules = [
                'name' => 'bail|required|alpha|min:2|unique:cars,id,:id',
                'founded' => 'bail|required|numeric|min:1500|max:' . date('Y'),
                'description' => 'bail|required',
            ];
        } else {
            $rules = [
                'name' => 'bail|required|alpha|min:2|unique:cars',
                'founded' => 'bail|required|numeric|min:1500|max:' . date('Y'),
                'description' => 'bail|required',
            ];
        }
        return $rules;
    }
}
