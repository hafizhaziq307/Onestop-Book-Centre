<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Address extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "alamat";
    protected $primaryKey = "idAlamat";

    public static function getAddresses($buyerId)
    {
        return DB::table("alamat")
            ->join("poskod", "alamat.poskod", "=", "poskod.poskod")
            ->where("idPembeli", $buyerId)
            ->oldest("idAlamat")
            ->get();
    }

    public static function getAddress($addressId)
    {
        return DB::table("alamat")
            ->join("poskod", "alamat.poskod", "=", "poskod.poskod")
            ->where("idAlamat", $addressId)
            ->first();
    }

    public static function getFirstAddress($buyerId)
    {
        return DB::table("alamat")
            ->join("poskod", "alamat.poskod", "=", "poskod.poskod")
            ->where("idPembeli", $buyerId)
            ->first();
    }
}
