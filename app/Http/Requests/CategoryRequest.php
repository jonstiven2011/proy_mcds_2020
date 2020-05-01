<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        if($this->method() == 'PUT'){
            return [
                    'name'          => 'required|min:10',
                    'description'   => 'required|min:10'
            ];
        }else{

            return [
                'name'          => 'required|min:10',
                'image'         => 'required|file|max:800',
                'description'   => 'required|min:10'
            ];
        }
    }
    //
    public function messages()
    {
        return[
            'name.required'         => 'El campo Nombre Categoria es obligatorio',
            'name.min'              => 'El campo Nombre Categoria debe contener al menos :min catacteres',
            'image.required'        => 'El campo Foto debe ser obligatorio',
            'image.max'             => 'El campo Foto no debe pesar más de :max kilobytes',
            'description.required'  => 'El campo Descripción es obligatorio',
            'description.min'       => 'El campo Descripción debe contener al menos :min catacteres',

        ];
        
    }

}
