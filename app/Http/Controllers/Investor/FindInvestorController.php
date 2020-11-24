<?php

namespace App\Http\Controllers\Investor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FindInvestorController extends Controller
{
    //
    public function searchProductInvestor() {


        return response()->json([
            "status" => true,
            "message" => "Investor found",

        ])
    }
}
