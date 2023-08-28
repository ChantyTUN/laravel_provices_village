<?php

namespace App\Model;


use App\Model\Commune;
use App\Model\District;
use App\Model\Province;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class Village extends Model
{
    // use HasFactory;

    protected $table = "villages";
    
    protected $guarded =[];

    public function province(){
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function district(){
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
    public function commune(){
        return $this->belongsTo(Commune::class, 'commune_id', 'id');
    }
}
