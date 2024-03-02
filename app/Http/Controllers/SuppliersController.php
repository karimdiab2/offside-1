<?php
namespace App\Http\Controllers;

use App\Models\Suppliers; // Correct model namespace
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SuppliersController extends Controller
{
    public function index()
    {
        $suppliers = DB::table('suppliers')->get();
        $rowCount= count($suppliers);
        return view('suppliers.add_supplier', ['suppliers' => $suppliers], ['rowCount' => $rowCount]);
    }    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return your form view here
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'supplier_name' => 'required|string',
            'supplier_num' => 'required|regex:/^01[0-9]{9}$/',
            'supplier_address' => 'required|string',
            'supplier_email' => 'nullable|email',
        ]);

        Suppliers::create([
            'supplier_name' => $request->supplier_name,
            'supplier_phone_number' => $request->supplier_num,
            'supplier_address' => $request->supplier_address,
            'supplier_email' => $request->supplier_email
        ]);

        return redirect()->back()->with('success', 'تم إضافة مورد جديد بنجاح');

    }

    

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $suppliers = DB::table('suppliers')->get();
        $rowCount= count($suppliers);
        return view('suppliers.all_suppliers', ['suppliers' => $suppliers] , ['rowCount' => $rowCount]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(suppliers $suppliers)
    {
        return view('suppliers.all_suppliers', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
 
        public function update(Request $request, Suppliers $supplier)
        {
            $request->validate([
                'supplier_name' => 'required|string',
                'supplier_num' => 'required|string',
                'supplier_address' => 'required|string',
                'supplier_email' => 'nullable|email',
            ]);
        
            $supplier->update([
                'supplier_name' => $request->supplier_name,
                'supplier_phone_number' => $request->supplier_num,
                'supplier_address' => $request->supplier_address,
                'supplier_email' => $request->supplier_email
            ]);
        
            return redirect()->back()->with('success', 'تم تحديث بيانات المورد بنجاح');
        }
            

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suppliers $supplier)
    {
        $supplier->delete();
    
        return redirect()->back()->with('success', 'تم حذف المورد بنجاح');
    }
}
