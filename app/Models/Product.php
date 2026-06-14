<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        "product_name",
        "type_id",
        "category_id",
        "employee_id"
    ];
}
