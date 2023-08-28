<?php

namespace App\Model;

use App\Province;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class District extends Model
{
    // use HasFactory;

    protected $table = "districts";

    protected $guarded =[];

    public function province(){
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }
}
