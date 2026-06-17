<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        "name",
        "price",
        "stock",
        "type_id",
        "category_id",
        "employee_id"
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function user() {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
