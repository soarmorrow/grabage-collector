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

    public function delete()
    {
        $this->attachments()->delete();
        parent::delete();
    }

}
