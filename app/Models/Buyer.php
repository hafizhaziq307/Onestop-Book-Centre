<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Buyer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "pembeli";
    protected $primaryKey = "idPembeli";

    public static function getCommonInfo($buyerId)
    {
        return DB::table("pembeli")
            ->select("namaPembeli", "gambarPembeli")
            ->where("idPembeli", $buyerId)
            ->first();
    }
}
