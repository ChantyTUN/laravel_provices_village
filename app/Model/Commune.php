<?php

namespace App\Model;

use App\District;
use App\Province;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commune extends Model
{
    // use HasFactory;

    protected $table = "communes";

    protected $guarded =[];

    public function province(){
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function district(){
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

}
