<?php

namespace RobertSeghedi\Autofetcher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RobertSeghedi\Autofetcher\Models\Autofetch;

class AutofetchController extends Controller
{
    public function test($y = null)
    {
        $x = Autofetch::test($y);
        return $x;
    }
}
