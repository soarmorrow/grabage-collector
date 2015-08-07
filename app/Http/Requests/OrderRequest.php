<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class OrderRequest extends Request {

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
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'address' => 'required|min:5',
            'city' => 'required|alpha',
            'state' => 'required|alpha',
            'phone' => 'required',
            'quantity' => 'required',
            'types' => 'required',
		];
	}

}
