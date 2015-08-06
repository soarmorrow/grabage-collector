<?php namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id'];

    public function scopeSearch($query, $q)
    {
        return $query->where(function($queryGroup) use ($q){
           $queryGroup->orWhere('first_name', 'like', '%' . $q . '%')
               ->orWhere('last_name', 'like', '%' . $q . '%')
               ->orWhere('phone', 'like', '%' . $q . '%')
               ->orWhere('address', 'like', '%' . $q . '%')
               ->orWhere('city', 'like', '%' . $q . '%')
               ->orWhere('state', 'like', '%' . $q . '%')
               ->orWhere('order_number', 'like', '%' . $q . '%')
               ->orWhere('transaction_id', 'like', '%' . $q . '%')
               ->orWhere('quantity', 'like', '%' . $q . '%')
               ->orWhere('created_at', 'like', '%' . $q . '%')
               ->orWhere('amount', 'like', '%' . $q . '%')
               ->orWhere('postcode', 'like', '%' . $q . '%');
        });
    }

    public function attachments()
    {
        return $this->hasMany('App\OrderAttachment');
    }

    public function customer()
    {
        return $this->belongsTo('App\User');
    }

    public function types()
    {
        return $this->hasMany('App\OrderGarbageType');
    }

    public function status()
    {
        return $this->hasOne('App\Status');
    }

    public function delete()
    {
        $this->attachments()->delete();
        parent::delete();
    }

}
