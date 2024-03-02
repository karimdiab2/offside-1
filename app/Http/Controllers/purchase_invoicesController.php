<?php

namespace App\Http\Controllers;

use App\Models\purchase_invoices;
use App\Models\PurchaseInvoiceDetail;
use App\Models\warehouses_details;
use App\Models\branches_details;


use Illuminate\Http\Request;

class purchase_invoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            // Insert data into purchase_invoices table
            $purchaseInvoice = new purchase_invoices();
            $purchaseInvoice->invoice_id = $request->input('purchase_invoices_no');
            $purchaseInvoice->invoice_date = $request->input('purchase_invoices_date');
            $purchaseInvoice->supplier_id = $request->input('purchase_invoices_supplier');
            $purchaseInvoice->total_amount = $request->input('purchase_invoices_amount');
            $purchaseInvoice->purchase_invoices_note = $request->input('purchase_invoices_note');
            $purchaseInvoice->save();
    
            // Insert data into purchase_invoices_details table
            $productIds = $request->input('product_id');
            $quantities = $request->input('quantity');
            $prices = $request->input('price');
            $totals = $request->input('total');
    
            foreach ($productIds as $key => $productId) {
                $purchaseInvoiceDetail = new PurchaseInvoiceDetail();
                $purchaseInvoiceDetail->invoice_id = $request->input('purchase_invoices_no');
                $purchaseInvoiceDetail->product_id = $productId;
                $purchaseInvoiceDetail->quantity = $quantities[$key];
                $purchaseInvoiceDetail->purchase_price = $prices[$key];
                $purchaseInvoiceDetail->total_price = $totals[$key];
                $purchaseInvoiceDetail->save();

                if ($request->input('warehouse_branche')[$key] === 'مخزن') {
                    $warehouseDetail = warehouses_details::where('warehouse_id', $request->input('save_place')[$key])
                        ->where('products_id', $productId)
                        ->first();
                
                    if ($warehouseDetail) {
                        $oldQuantity = $warehouseDetail->Quantity;
                        $newQuantity = $oldQuantity + $quantities[$key]; // Sum old quantity with new quantity
                        $warehouseDetail->Quantity = $newQuantity; // Update the quantity with the new sum
                        $warehouseDetail->save();
                    }
                }elseif ($request->input('warehouse_branche')[$key] === 'فرع') {
                    $branchDetail = branches_details::where('branche_id', $request->input('save_place')[$key])
                        ->where('products_id', $productId)
                        ->first();
                
                    if ($branchDetail) {
                        $oldQuantity = $branchDetail->Quantity;
                        $newQuantity = $oldQuantity + $quantities[$key]; // Sum old quantity with new quantity
                        $branchDetail->Quantity = $newQuantity; // Update the quantity with the new sum
                        $branchDetail->save();
                    }
                }
                
                
                


                
        }
    
            return redirect()->back()->with('success', 'Purchase invoice added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(purchase $purchase)
    {
        //
    }
}
