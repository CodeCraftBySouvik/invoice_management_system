<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompaniesData extends Model
{
    use HasFactory;
    protected $table = 'user_companies_data';

    protected $fillable = [
        'company_name', 'address', 'area', 'emirates', 'phone_number',
    ];
    
    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }
}
