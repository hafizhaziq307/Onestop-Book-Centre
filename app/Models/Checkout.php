<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Checkout extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "keluar";
    protected $primaryKey = "idKeluar";

    public static function getCheckouts($buyerId, $sellerId)
    {
        return DB::table("keluar")
            ->join("alamat", "keluar.idAlamat", "=", "alamat.idAlamat")
            ->join("buku", "keluar.idBuku", "=", "buku.idBuku")
            ->where("idPembeli", $buyerId)
            ->where("keluar.idPenjual", $sellerId)
            ->get();
    }

    public static function getContainerCheckouts($buyerId)
    {
        return DB::table("keluar")
            ->join("alamat", "keluar.idAlamat", "=", "alamat.idAlamat")
            ->join("buku", "keluar.idBuku", "=", "buku.idBuku")
            ->join("penjual", "buku.idPenjual", "=", "penjual.idPenjual")
            ->join("kurier", "keluar.idKurier", "=", "kurier.idKurier")
            ->select(
                "keluar.idPenjual",
                "namaPenjual",
                "keluar.idKurier",
                "namaKurier",
                "hargaKurier",
                "keluar.idAlamat",
                DB::raw("sum(jumlahHargaBuku) as subHarga")
            )
            ->where("idPembeli", $buyerId)
            ->groupBy(
                "keluar.idPenjual",
                "namaPenjual",
                "keluar.idKurier",
                "namaKurier",
                "hargaKurier",
                "keluar.idAlamat"
            )
            ->get();
    }

    public static function updateDeliveryAddress($id, $addressId)
    {
        return DB::table("keluar")
            ->join("alamat", "alamat.idAlamat", "=", "keluar.idAlamat")
            ->where("idPembeli", $id)
            ->update([
                "keluar.idAlamat" => $addressId,
            ]);
    }

    public static function updateShipping($buyerId, $sellerId, $courierId)
    {
        return DB::table("keluar")
            ->join("alamat", "alamat.idAlamat", "=", "keluar.idAlamat")
            ->where("idPembeli", $buyerId)
            ->where("idPenjual", $sellerId)
            ->update([
                "idKurier" => $courierId,
            ]);
    }

    public static function deleteAllCheckouts($buyerId)
    {
        return DB::table("keluar")
            ->join("alamat", "keluar.idAlamat", "=", "alamat.idAlamat")
            ->where("idPembeli", $buyerId)
            ->delete();
    }
}
