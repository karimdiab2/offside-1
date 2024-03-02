<?php

namespace App\Http\Controllers;

use App\Models\Warehouses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class WarehousesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouses = DB::table('warehouses')->get();
        $rowCount = count($warehouses);
        return view('warehouses\add_warehouses', ['warehouses' => $warehouses], ['rowCount' => $rowCount]);
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
            'warehouse_name' => 'required|string',
            'warehouse_addresss' => 'required|string',
        ]);

         warehouses::create([
            'warehouse_name' => $request->warehouse_name,
            'warehouse_address' => $request->warehouse_addresss,
        ]);

        return redirect()->back()->with('success', 'تم إضافة مخزن جديد بنجاح');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(warehouses $warehouses)
    {
        $warehouses = DB::table('warehouses')->get();
        $rowCount = count($warehouses);
        return view('warehouses\all_warehouses', compact('warehouses', 'rowCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(warehouses $warehouses)
    {
        return view('warehouses\all_warehouses', compact('supplier'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, warehouses $warehouses)
    {
        $request->validate([
            'warehouse_name' => 'required|string',
            'warehouse_address' => 'required|string',
        ]);
    
        $warehouses->update([
            'warehouse_name' => $request->warehouse_name,
            'warehouse_address' => $request->warehouse_address
        ]);
    
        return redirect()->back()->with('success', 'تم تحديث بيانات المخزن بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(warehouses $warehouses)
    {
        $warehouses->delete();
    
        return redirect()->back()->with('success', 'تم حذف المخزن بنجاح');
    }
}
