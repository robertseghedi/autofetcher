<?php

namespace RobertSeghedi\Autofetcher\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory, DB, Cache;
use Illuminate\Database\Eloquent\Model;

class Autofetch extends Model
{
    public static function database($a = 'users', $time = 1800)
    {
        Cache::forget("$a");
        $ao = Cache::remember("$a", $time, function () use ($a) {
            $ao = DB::table($a)->get();
            return (object) $ao;
        });
        return json_encode($ao);
    }
    public static function result($a = 'users', $type = 'last', $time = 1800)
    {
        if($type == 'last')
        {
            $x = 'desc';
        }
        else if($type == 'first')
        {
            $x = 'asc';
        }
        Cache::forget("$a");
        $ao = Cache::remember("$a", $time, function () use ($a) {
            $ao = DB::table($a)->orderby('id', $x)->first();
            return (object) $ao;
        });
        return json_encode($ao);
    }
    public static function select($a = 'users', $selects = 'id', $time = 1800)
    {
        if($selects == 'id')
        {
            return abort(404, 'No selected fields.');
        }
        else if($selects != 'id')
        {
            Cache::forget("$a");
            $ao = Cache::remember("$a", $time, function () use ($a, $selects) {
                $ao = DB::table($a)->select($selects)->get();
                return (object) $ao;
            });
            return json_encode($ao);
        }
    }
    public static function top($a = 'users', $orderby = 'id', $results = 10, $time = 1800, $type = 'private')
    {
        $string = "top_$a";
        if($type == 'public')
        {
            if(Cache::has($string))
            {
                $ao = Cache::get($string);
                return $ao;
            }
            else if(!Cache::has($string))
            {
                $ao = Cache::remember($string, $time, function () use ($orderby, $a, $results) {
                    $ao = DB::table($a)->orderby($orderby)->take($results)->get();
                    return (object) $ao;
                });
                return json_encode($ao);
            }
        }
        else if($type == 'private')
        {
            Cache::forget($string);
            $ao = Cache::remember($string, $time, function () use ($orderby, $a, $results) {
                $ao = DB::table($a)->orderby($orderby)->take($results)->get();
                return (object) $ao;
            });
            return json_encode($ao);
        }
    }
}
