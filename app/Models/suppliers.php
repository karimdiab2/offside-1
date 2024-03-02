<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    protected $table = 'suppliers';
    protected $primaryKey = 'supplier_id'; // Specify the actual primary key column name
    protected $fillable = ['supplier_name', 'supplier_phone_number', 'supplier_address', 'supplier_email'];
}
