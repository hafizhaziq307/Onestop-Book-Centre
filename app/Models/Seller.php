<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Seller extends Model
{
    use HasFactory;
    protected $table = "penjual";
    protected $primaryKey = "idPenjual";
    public $timestamps = false;

    public static function getSellers()
    {
        return DB::table("penjual")->get();
    }

    public static function getSellerName($sellerId)
    {
        return DB::table("penjual")
            ->select("idPenjual", "namaPenjual")
            ->where("idPenjual", $sellerId)
            ->first();
    }

    public static function getCommonInfo($sellerId)
    {
        return DB::table("penjual")
            ->select("namaPenjual", "gambarPenjual", "tarikhDaftarPenjual")
            ->where("idPenjual", $sellerId)
            ->first();
    }

    public static function getBooksBySeller($sellerId)
    {
        return DB::table("buku")
            ->select(
                "idBuku",
                "tajukBuku",
                "stokBuku",
                "hargaBuku",
                "gambarBuku"
            )
            ->whereIn('statusBuku', ['available'])
            ->where("idPenjual", $sellerId)
            ->paginate(6);
    }

    public static function sortbyPrice($sellerId)
    {
        return DB::table("buku")
            ->select(
                "idBuku",
                "tajukBuku",
                "stokBuku",
                "hargaBuku",
                "gambarBuku"
            )
            ->whereIn('statusBuku', ['available'])
            ->where("idPenjual", $sellerId)
            ->oldest("hargaBuku")
            ->paginate(6);
    }

    public static function sortbyMostSales($sellerId)
    {
        return DB::table("butiran_pesanan")
            ->rightJoin("buku", "butiran_pesanan.idBuku", "=", "buku.idBuku")
            ->select(
                "buku.idBuku",
                "tajukBuku",
                "stokBuku",
                "hargaBuku",
                "gambarBuku",
                DB::raw("COUNT(butiran_pesanan.idButiranPesanan) AS soldBook")
            )
            ->whereIn('statusBuku', ['available'])
            ->where("idPenjual", $sellerId)
            ->groupBy(
                "buku.idBuku",
                "tajukBuku",
                "stokBuku",
                "hargaBuku",
                "gambarBuku"
            )
            ->latest("soldBook")
            ->paginate(6);
    }
}
