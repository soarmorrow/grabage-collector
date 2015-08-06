<?php namespace App\Http\Controllers\Admin;

use App\User;
use App\UserRole;
use Illuminate\Http\Request;

class UsersController extends AdminController
{


    private $user_rule;

    public function __construct()
    {
        $this->user_rule = array(
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'name' => 'required|alpha_num',
            'password' => 'required|min:5',
            'confirm_password' => 'same:password',
            'address' => 'required|min:5',
            'roles' => 'required',
            'city' => 'required|alpha',
            'state' => 'required|alpha',
            'postcode' => 'required'
        );;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->has('q')) {
            $q = $request->input('q');
            return view('backend.users.inde')->withUsers(User::search($q)->paginate(5));
        }
        return view('backend.users.inde')->withUsers(User::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if ($request->method() == 'POST') {
            $this->validate($request, $this->user_rule);
            $user = $request->except('_token', 'confirm_password', 'roles');
            $user['password'] = bcrypt($request->input('password'));
            $user['created_at'] = current_time();
            $user['phone'] = remove_symbols($request->input('phone'));
            User::unguard();
            $addUser = User::create($user);
            User::reguard();
            if ($addUser) {
                $role = new UserRole();
                $role->user_id = $addUser->id;
                $role->role_id = $request->input('roles');
                $role->save();
                return redirect()->back()->with('success', 'New user added');
            } else {
                return redirect()->back()->with('error', 'Failed to add user');
            }
        } else
            return view('backend.users.add');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(User $user, Request $request)
    {
        if ($request->method() == 'POST') {
            $this->validate($request, [
                'password' => 'min:5',
                'confirm_password' => 'same:password'
            ]);
            $account_data = $request->except('_token', 'confirm_password', 'roles');
            foreach ($account_data as $k => $v) {
                if (!empty($k)) {
                    if ($k == 'phone') {
                        $v = remove_symbols($v);
                    }
                    if (!empty($v))
                        $user->{$k} = $v;
                }
            }
            if ($user->save()) {
                return redirect()->back()->with('success', 'User profile updated successfully');
            }
            return redirect()->back()->withInput($request->except('_token'))->with('error', Lang::get('account.update_error'));
        } else
            return view('backend.users.edit')->withUser($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }

}
