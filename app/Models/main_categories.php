<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class main_categories extends Model
{
    use HasFactory;
    protected $table = 'main_categories';
    protected $primaryKey = 'main_category_id'; // Specify the actual primary key column name
    protected $fillable = ['main_category_id', 'main_category_name', 'description'];

}
