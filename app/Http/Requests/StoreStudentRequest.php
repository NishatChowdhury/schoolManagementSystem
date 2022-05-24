<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'session_id'=>'required',
            'class_id'=>'required',
            'name'=>'required',
            'rank' => 'required|numeric',
            'studentId' => 'required',
            //'mobile'=>'required|unique:students',
            'status'=>'required',
        ];
    }
}
