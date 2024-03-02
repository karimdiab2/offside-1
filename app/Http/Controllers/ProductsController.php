<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $main_categories = DB::table('main_categories')->get();
        $sub_categories1  = DB::table('sub_categories1')->get();
        $sub_categories2 = DB::table('sub_categories2')->get();
        $products = DB::table('products')
        ->join('main_categories', 'products.main_category_id', '=', 'main_categories.main_category_id')
        ->join('sub_categories1', 'products.sub_category_1_id', '=', 'sub_categories1.sub_category_1_id')
        ->join('sub_categories2', 'products.sub_category_2_id', '=', 'sub_categories2.sub_category_2_id')
        ->select('products.*', 'main_categories.*', 'sub_categories1.*', 'sub_categories2.*')
        ->get();
        $rowCount = count($products);
    

        return view('products.add_products', compact('main_categories', 'sub_categories1' , 'sub_categories2' , 'products' , 'rowCount' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string',
            'main_category_id' => 'required|exists:main_categories,main_category_id',
            'sub_category1' => 'required|exists:sub_categories1,sub_category_1_id',
            'sub_category2' => 'required|exists:sub_categories2,sub_category_2_id',
            'product_price' => 'required|numeric',
            'quantity_in_stock' => 'required|integer',
            'product_description' => 'required|string',
        ]);

        Products::create([
            'product_name' => $request->product_name,
            'main_category_id' => $request->main_category_id,
            'sub_category_1_id' => $request->sub_category1,
            'sub_category_2_id' => $request->sub_category2,
            'price' => $request->product_price,
            'quantity_in_stock' => $request->quantity_in_stock,
            'product_description' => $request->product_description,
        ]);

        return redirect()->back()->with('success', 'تم إضافة منتج جديد بنجاح');
    }

     /**
     * Store a newly created resource in storage.
     */
    public function addMainCategory(Request $request)
    {
        $request->validate([
            'main_category_name' => 'required|string',
            'main_category_name_description' => 'required|string',
        ]);
    
        MainCategory::create([
            'main_category_name' => $request->main_category_name,
            'description' => $request->main_category_name_description,
        ]);
    
        return view('products.add_products')->with('success', 'تم إضافة تصنيف رئيسي جديد بنجاح');
    }
    
    
    /**
     * Display the specified resource.
     */
    public function show(products $products)
    {
        $main_categories = DB::table('main_categories')->get();
        $sub_categories1  = DB::table('sub_categories1')->get();
        $sub_categories2 = DB::table('sub_categories2')->get();
        $products = DB::table('products')
        ->join('main_categories', 'products.main_category_id', '=', 'main_categories.main_category_id')
        ->join('sub_categories1', 'products.sub_category_1_id', '=', 'sub_categories1.sub_category_1_id')
        ->join('sub_categories2', 'products.sub_category_2_id', '=', 'sub_categories2.sub_category_2_id')
        ->select('products.*', 'main_categories.*', 'sub_categories1.*', 'sub_categories2.*')
        ->get();
        $rowCount = count($products);
    

        return view('products.all_products', compact('main_categories', 'sub_categories1' , 'sub_categories2' , 'products' , 'rowCount' ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(products $products)
    {
        return view('products.all_products', compact('products'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $products)
    {
        $request->validate([
            'product_name' => 'required|string',
            'main_category_id' => 'required|exists:main_categories,main_category_id',
            'sub_category1' => 'required|exists:sub_categories1,sub_category_1_id',
            'sub_category2' => 'required|exists:sub_categories2,sub_category_2_id',
            'price' => 'required|numeric',
            'quantity_in_stock' => 'required|integer',
            'product_description' => 'required|string',
        ]);
        

        $products->update([
            'product_name' => $request->product_name,
            'main_category_id' => $request->main_category_id,
            'sub_category_1_id' => $request->sub_category1,
            'sub_category_2_id' => $request->sub_category2,
            'price' => $request->price,
            'quantity_in_stock' => $request->quantity_in_stock,
            'product_description' => $request->product_description,
        ]);
    
        return redirect()->back()->with('success', 'تم تحديث بيانات المنتج بنجاح');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(products $products)
    {
        $products->delete();
    
        return redirect()->back()->with('success', 'تم حذف المورد بنجاح');
    }
}
