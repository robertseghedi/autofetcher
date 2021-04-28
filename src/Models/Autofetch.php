<?php

namespace RobertSeghedi\Autofetcher\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory, DB, Cache;
use Illuminate\Database\Eloquent\Model;

class Autofetch extends Model
{
    public static function fetch_full_database($a = 1)
    {
        $ao = Cache::remember("$a", 1800, function () use ($a) {
            $ao = DB::table($a)->get();
            return (object) $ao;
        });
        return json_encode($ao);
    }
    public static function fetch_fl_result($a = 1, $type)
    {
        if($type == 'last')
        {
            $x = 'desc';
        }
        else if($type == 'first')
        {
            $x = 'asc';
        }
        $ao = Cache::remember("$a", 1800, function () use ($a) {
            $ao = DB::table($a)->orderby('id', $x)->first();
            return (object) $ao;
        });
        return json_encode($ao);
    }
}
