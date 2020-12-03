<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;
    protected $connection = "mysql-tradedata";
    protected $table = "seller";
    protected $primaryKey = "seller_id";
    public $incrementing = false;
    public $timestamps = false;

    public function offers(){
        return $this->hasMany("App\Models\Offer");
    }

    public function changes(){
        return $this->hasMany("App\Models\SellerChange");
    }
}
