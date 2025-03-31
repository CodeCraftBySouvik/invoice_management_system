<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';

    protected $fillable = [
        'user_id', 'package_id', 'attempt_package_type', 'attempt_package_amount', 'purchase_package_type', 'purchase_package_amount', 'attempt_date_time', 'purchase_date_time', 'status', 'stripe_payment_intent_id'
    ];

    public function package(){
        return $this->belongsTo(Package::class,'package_id');
    }
    
}
