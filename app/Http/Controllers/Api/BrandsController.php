<?php

namespace App\Http\Controllers\Api;

use App\Models\Brands;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandsController extends Controller
{
    public function index()
    {       
        $brands = Brands::all();
        return response()->json([        
        "data" =>$brands
        ]);
        }
    
}
