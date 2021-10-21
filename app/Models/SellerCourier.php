<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SellerCourier extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "penjual_kurier";
    protected $primaryKey = "idPenjualKurier";

    /**
     * get list of couriers information based on sellerId
     */
    public static function getSellerCouriers($sellerId)
    {
        return DB::table("penjual_kurier")
            ->join("kurier", "penjual_kurier.idKurier", "=", "kurier.idKurier")
            ->select("kurier.*")
            ->where("idPenjual", $sellerId)
            ->get();
    }

    /**
     * get courier first row value that act as a default in the database
     */
    public static function getSellerCourier($sellerId)
    {
        return DB::table("penjual_kurier")
            ->join("kurier", "penjual_kurier.idKurier", "=", "kurier.idKurier")
            ->select("kurier.*")
            ->where("idPenjual", $sellerId)
            ->first();
    }
}
