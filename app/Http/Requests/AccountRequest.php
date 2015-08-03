<?php namespace App\Http\Requests;


class AccountRequest extends Request {

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
        return [
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|unique:users',
            'password' =>'required|min:6|same:password'
        ];
    }

}
