<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transactions';

    // protected $fillable = [
    //     'name', 'monthly_price', 'yearly_price', 'description', 'button_text', 'currency'
    // ];
    
}
