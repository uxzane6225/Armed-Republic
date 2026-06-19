<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'customer_id',
        'employee_id',
        'total_cost'
    ];

    public function customer() {
        return $this->belongsTo(User::class);
    }

    public function employee() {
        return $this->belongsTo(User::class);
    }

    public function sale_details() {
        return $this->hasMany(Sale::class);
    }
}
