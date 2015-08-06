<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    protected $fillable = ['user_id'];

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
