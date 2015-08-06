<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Option extends Model
{

    public static function getOption($name)
    {
        $option = DB::table('options')
            ->where('name', $name)
            ->pluck('value');
        $value = json_decode($option,true);
        if(is_null($value)){
            return $option;
        }else{
            return $value;
        }
    }

    public static function setOption($name, $value)
    {
        if(is_array($value)){
            $value = json_encode($value);
        }
        if(Option::where('name',$name)->update(['value'=>$value,'updated_at'=>current_time()])){
            return true;
        }else{
            return false;
        }
    }

}
