<?php

namespace App\Http\Controllers;

use App\Models\main_categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class main_categoriesController extends Controller
{
    
    /**
     * Display the specified resource.
     */
    public function show()
    {
        $categories = DB::table('main_categories')->get();
        return view('sales.products', compact('categories'));
    }
    

   
}
