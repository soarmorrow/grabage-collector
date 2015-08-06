<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Status extends Model
{
    protected $fillable = ['name'];

    public static function search($q)
    {
        return DB::table('statuses')
            ->where('name', 'like', '%' . $q . '%');
    }

}
