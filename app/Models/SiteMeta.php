<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteMeta extends Model
{
    protected $table = 'site_meta';
    protected $primarykey='id';

    protected $fillable= [
        'meta_key','meta_value'
    ];
}
