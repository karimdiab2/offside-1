<?php

namespace App\Http\Controllers;

use App\Models\branches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BranchesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = DB::table('branches')->get();
        $warehouses = DB::table('warehouses')->get();
        $warehouses2 = DB::table('warehouses')
        ->join('branche_warehouse', 'warehouses.warehouse_id', '=', 'branche_warehouse.warehouse_id')
        ->join('branches', 'branche_warehouse.branches_id', '=', 'branches.branch_id')
        ->get();
        $rowCount = count($branches);
        return view('branches.add_branches', compact('branches', 'rowCount' , 'warehouses' , 'warehouses2'));
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
        'branche_name' => 'required|string',
        'branche_address' => 'required|string',
        'branche_mobile' => 'required|string',
        'branche_manger' => 'nullable|string',
        'warehouse_branches' => 'required|array',
        'warehouse_branches.*' => 'exists:warehouses,warehouse_id',
    ]);
    
    $branch = Branches::create([
        'branch_name' => $request->branche_name,
        'branch_address' => $request->branche_address,
        'branch_phone' => $request->branche_mobile,
        'branch_manger' => $request->branche_manger
    ]);

    foreach ($request->warehouse_branches as $warehouseId) {
        DB::table('branche_warehouse')->insert([
            'branches_id' => $branch->branch_id,
            'warehouse_id' => $warehouseId,
        ]);
    }

    return redirect()->back()->with('success', 'تم إضافة فرع جديد بنجاح');
}
    /**
     * Display the specified resource.
     */
    public function show(branches $branches)
    {
        $branches = DB::table('branches')->get();
        $warehouses = DB::table('warehouses')->get();
        $warehouses2 = DB::table('warehouses')
        ->join('branche_warehouse', 'warehouses.warehouse_id', '=', 'branche_warehouse.warehouse_id')
        ->join('branches', 'branche_warehouse.branches_id', '=', 'branches.branch_id')
        ->get();

        $rowCount = count($branches);
        return view('branches.all_branches', compact('branches', 'rowCount' , 'warehouses' , 'warehouses2'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(branches $branches)
    {
        return view('branches.all_branches', compact('branches'));
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, $branchId)
     {
        $request->validate([
            'branche_name' => 'string',
            'branche_address' => 'required|string',
            'branche_mobile' => 'string',
            'branche_manger' => 'nullable|string',
            'warehouse_branches' => 'array',
            'warehouse_branches.*' => 'exists:warehouses,warehouse_id',
        ]);
        
         
         // Update the branch record
         Branches::where('branch_id', $branchId)->update([
             'branch_name' => $request->branche_name,
             'branch_address' => $request->branche_address,
             'branch_phone' => $request->branche_mobile,
             'branch_manger' => $request->branche_manger
         ]);
     
         // Remove existing relationships
         DB::table('branche_warehouse')->where('branches_id', $branchId)->delete();
     
         // Insert new relationships
         foreach ($request->warehouse_branches as $warehouseId) {
             DB::table('branche_warehouse')->insert([
                 'branches_id' => $branchId,
                 'warehouse_id' => $warehouseId,
             ]);
         }
     
         return redirect()->back()->with('success', 'تم تحديث بيانات الفرع بنجاح');
     }
     


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(branches $branches)
    {
        $branches->delete();
    
        return redirect()->back()->with('success', 'تم حذف الفرع بنجاح');
    }
}
