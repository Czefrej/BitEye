<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APICredential extends Model
{
    use HasFactory;
    protected $connection = "mysql-tradedata";
    protected $table = "api-credentials";
    protected $primaryKey = "client-id";

    public $incrementing = false;
    public $timestamps = false;

}
