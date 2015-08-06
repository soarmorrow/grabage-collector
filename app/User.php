<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    public function photos()
    {
        return $this->hasManyThrough('App\OrderAttachment', 'App\Order');
    }

    public function roles()
    {
        return $this->hasMany('App\UserRole');
    }

    public static function search($q)
    {
        return DB::table('users')->where('name', 'like', '%' . $q . '%')
            ->orWhere('first_name', 'like', '%' . $q . '%')
            ->orWhere('last_name', 'like', '%' . $q . '%')
            ->orWhere('email', 'like', '%' . $q . '%')
            ->orWhere('phone', 'like', '%' . $q . '%')
            ->orWhere('address', 'like', '%' . $q . '%')
            ->orWhere('city', 'like', '%' . $q . '%')
            ->orWhere('state', 'like', '%' . $q . '%')
            ->orWhere('postcode', 'like', '%' . $q . '%');
    }

    public function delete()
    {
        $this->orders()->delete();
        $this->roles()->delete();
        parent::delete();
    }

}
