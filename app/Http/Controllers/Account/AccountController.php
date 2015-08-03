<?php namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\PasswordChangeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class AccountController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($username = null)
	{
        if(is_null($username) || $username != Auth::user()->name){
            abort(401, 'Unauthorized access');
        }
		return view('frontend.user.account.inde')->withUser(Auth::user());
	}

	/**
	 * Change password view
	 *
	 * @return Response
	 */
	public function change_password($username = null)
	{
        return view('frontend.user.account.change_password');
	}

    public function update_password($username, PasswordChangeRequest $request){

        if(Auth::validate(['phone'=>Auth::user()->phone,'password'=>$request->input('old_password')])){
            Auth::user()->password = bcrypt($request->input('password'));
            Auth::user()->save();
            return redirect()->back()->with('success','Password updated successfully');
        }else{
            return redirect()->back()->with('error','Current password do not match with one in our record!');
        }
    }

	/**
	 * Show the form for editing the specified resource.
	 *
     * @param $username
     * @return mixed
     */
	public function edit($username)
	{
        if(is_null($username) || $username != Auth::user()->name){
            abort(401, 'Unauthorized access');
        }
        return view('frontend.user.account.edit')->withUser(Auth::user());
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($username, Request $request)
	{
        $account_data = $request->except('_token');
        foreach($account_data as $k => $v){
            if($k == 'phone'){
                $v = remove_symbols($v);
            }
            Auth::user()->{$k} = $v;
        }
        if(Auth::user()->save()){
            return redirect()->back()->with('success', Lang::get('account.update_success'));
        }
        return redirect()->back()->withInput($request->except('_token'))->with('error',Lang::get('account.update_error'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
