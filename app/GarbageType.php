<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GarbageType extends Model {


    protected $fillable = ['name'];

    public static function search($q)
    {
        return DB::table('garbage_types')
            ->where('name', 'like', '%' . $q . '%');
    }

}
