<?php namespace App\Services;

use App\User;
use App\UserRole;
use Illuminate\Support\Facades\Mail;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
        User::unguard();
		$user = User::create([
			'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
			'password' => bcrypt($data['password']),
		]);
        User::reguard();
        $role = new UserRole();
        $role->user_id = $user->id;
        $role->role_id = 2;
        $role->save();
        Mail::send('emails.register', compact('user'), function($message) use ($user){
            $message->from(get_option('sent_from'), get_option('app'));
            $message->to($user->email, $user->name)->subject(get_option('app').' Registration Successful');
        });
        return $user;
	}

}
