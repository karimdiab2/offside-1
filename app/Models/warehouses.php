<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warehouses extends Model
{
    use HasFactory;
    protected $table = 'warehouses';
    protected $primaryKey = 'warehouse_id'; // Specify the actual primary key column name
    protected $fillable = ['warehouse_name', 'warehouse_address'];

}
