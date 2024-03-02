<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branches_details extends Model
{
    use HasFactory;
    protected $primaryKey = 'branche_details_id'; // Specify the actual primary key column name
    protected $table = 'branches_details';

}
