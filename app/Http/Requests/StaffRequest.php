<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CurrentPasswordCheckRule;

class StaffRequest extends FormRequest
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
        $validate = [
            'name'                  => ['required', 'min:3'],
            'email'                 => 'required|email|unique:users,email',
        ];
        if($this->user){
            $validate['name']                   = ['required', 'min:3'];
            $validate['email']                  = 'required|email|unique:users,email,'.$this->user->id;
        }
        return $validate;
    }
}
