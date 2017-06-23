<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GoodsPostRquest extends Request
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

        return [];
//        return [
//            'goodName'  => 'required',
//            'price' =>  'required',
//            'stockAll'  => 'required',
//            '风格'  => 'required',
//            '区域' => 'required',
//            'kind'  => 'required',
//            'pic'  => 'required',
//            'desr' => 'required',
//            'state'  => 'required'
//        ];

    }

}
