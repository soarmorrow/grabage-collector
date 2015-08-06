<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class SettingsRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return (Auth::user()->roles()->first()->role_id == 1);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'rate' => 'required',
            'app' => 'required',
            'language' => 'required|alpha',
            'sent_from' => 'required|email',
            'facebook' => 'required|url',
            'google_plus' => 'required|url',
            'twitter' => 'required|url',
            'about_title' => 'required|min:4',
            'about' => 'required|min:10',
            'legal_title' => 'required|min:4',
            'legal' => 'required|min:10',
            'contact' => 'required'
		];
	}

}
