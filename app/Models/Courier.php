<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Courier extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "kurier";
    protected $primaryKey = "idKurier";

    public static function getCourier($courierId)
    {
        return DB::table("kurier")
            ->where("idKurier", $courierId)
            ->first();
    }
}
