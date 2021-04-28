<?php

namespace RobertSeghedi\Autofetcher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RobertSeghedi\Autofetcher\Models\Autofetch;

class AutofetchController extends Controller
{
    public function test($table = null)
    {
        $x = Autofetch::fetch_full_database($table);
        return $x;
    }
}
