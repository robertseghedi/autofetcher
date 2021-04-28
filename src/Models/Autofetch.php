<?php

namespace RobertSeghedi\Autofetcher\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory, DB, Cache;
use Illuminate\Database\Eloquent\Model;

class Autofetch extends Model
{
    public static function test($a = 1)
    {
        $ao = Cache::remember("$a", 1800, function () use ($a) {
            $ao = DB::table($a)->get();
            return (object) $ao;
        });
        return json_encode($ao);
    }
}
