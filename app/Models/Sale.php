<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillables = [
        'customer_id',
        'employee_id',
        'total_cost'
    ];

    public function user() {
        return $this->belongsTo(User::class, ['customer_id','employee_id']);
    }

    public function sale_details() {
        return $this->hasMany(Sale::class);
    }
}
