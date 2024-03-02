<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class branches extends Model
{
    use HasFactory;
    protected $table = 'branches';
    protected $primaryKey = 'branch_id'; // Specify the actual primary key column name
    protected $fillable = ['branch_name', 'branch_address', 'branch_phone', 'branch_manger'];
}
