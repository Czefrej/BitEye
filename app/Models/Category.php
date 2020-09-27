<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "category";
    protected $primaryKey = "id";

    public $incrementing = false;
    public $timestamps = false;

    public function offers(){
        return $this->hasMany("App\Models\Offer");
    }

    public function parent(){
        return $this->hasOne("App\Models\Category",'id');
    }

    public function child(){
        return $this->hasMany("App\Models\Category",'parent-id');
    }
}
