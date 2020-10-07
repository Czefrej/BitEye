<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferChange extends Model
{
    use HasFactory;
    protected $connection = "mysql-tradedata";
    protected $table = "offer_change";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function offer(){
        return $this->belongsTo("App\Models\Offer");
    }
}
