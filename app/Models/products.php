<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'product_id'; // Specify the actual primary key column name
    protected $fillable = ['product_name', 'main_category_id', 'sub_category_1_id', 'sub_category_2_id', 'price' , 'quantity_in_stock' , 'product_description'];
}
