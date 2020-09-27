<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $table = "offer";
    protected $primaryKey = "id";
    protected $keyType = "bigint";
    public $incrementing = false;
    public $timestamps = false;

    public function seller(){
        return $this->belongsTo("App\Models\Seller");
    }

    public function category(){
        return $this->belongsTo("App\Models\Category");
    }

    public function changes(){
        return $this->hasMany("App\Models\OfferChange");
    }
}
