<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\SuppliersController;

use App\Http\Controllers\WarehousesController;

use App\Http\Controllers\branchesController;

use App\Http\Controllers\ProductsController;


use App\Http\Controllers\purchase_invoicesController;
use App\Http\Controllers\main_categoriesController;
use App\Http\Controllers\showController;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{page}', 'App\Http\Controllers\AdminController@index');


// supplier routes 
Route::post('/add-supplier', [SuppliersController::class, 'store'])->name('add-supplier');
Route::get('suppliers/add_suppliers', [SuppliersController::class, 'index'])->name('suppliers.add_suppliers');
Route::get('suppliers/all_suppliers', [SuppliersController::class, 'show'])->name('suppliers.all_suppliers');
Route::get('suppliers/{supplier}/edit', [SuppliersController::class, 'edit'])->name('suppliers.edit');
Route::delete('suppliers/{supplier}', [SuppliersController::class, 'destroy'])->name('suppliers.destroy');
Route::put('suppliers/{supplier}', [SuppliersController::class, 'update'])->name('suppliers.update');


//wearhouses routes
Route::post('/add-warehouses', [WarehousesController::class, 'store'])->name('add-warehouses');
Route::get('warehouses/add_warehouses', [WarehousesController::class, 'index'])->name('warehouses.add_warehouses');
Route::get('warehouses/all_warehouses', [WarehousesController::class, 'show'])->name('warehouses.all_warehouses');
Route::get('warehouses/{warehouses}/edit', [WarehousesController::class, 'edit'])->name('warehouses.edit');
Route::delete('warehouses/{warehouses}', [WarehousesController::class, 'destroy'])->name('warehouses.destroy');
Route::put('warehouses/{warehouses}', [WarehousesController::class, 'update'])->name('warehouses.update');


//branches routes
Route::post('/add-branches', [branchesController::class, 'store'])->name('add-branches');
Route::get('branches/add_branches', [branchesController::class, 'index'])->name('branches.add_branches');
Route::get('branches/all_branches', [branchesController::class, 'show'])->name('branches.all_branches');
Route::get('branches/{branches}/edit', [branchesController::class, 'edit'])->name('branches.edit');
Route::delete('branches/{branches}', [branchesController::class, 'destroy'])->name('branches.destroy');
Route::put('branches/{branches}', [branchesController::class, 'update'])->name('branches.update');


//products routes
Route::post('/add-products', [ProductsController::class, 'store'])->name('add-products');
Route::get('products/add_products', [ProductsController::class, 'index'])->name('products.add_products');
Route::get('products/all_products', [ProductsController::class, 'show'])->name('products.all_products');
Route::get('products/{products}/edit', [ProductsController::class, 'edit'])->name('products.edit');
Route::delete('products/{products}', [ProductsController::class, 'destroy'])->name('products.destroy');
Route::put('products/{products}', [ProductsController::class, 'update'])->name('products.update');
Route::post('products/add_products', [ProductsController::class, 'addMainCategory'])->name('add_main_category');



//add invoice purchase routes
Route::post('/add_purchase', [purchase_invoicesController::class, 'store'])->name('add_purchase');
Route::get('/purchase', 'purchaseController@index');


//get main catigory to sale 
Route::get('sales/products', [main_categoriesController::class, 'show'])->name('sales.products');
