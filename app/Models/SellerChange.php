<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerChange extends Model
{
    use HasFactory;
    use HasFactory;
    protected $connection = "mysql-tradedata";
    protected $table = "seller_change";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function seller(){
        return $this->belongsTo("App\Models\Seller");
    }
}
