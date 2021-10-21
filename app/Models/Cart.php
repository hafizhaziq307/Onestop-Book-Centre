<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "troli";
    protected $primaryKey = "idTroli";

    public static function getCarts($userId, $sellerId)
    {
        return DB::table("troli")
            ->join("buku", "troli.idBuku", "=", "buku.idBuku")
            ->select(
                "troli.*",
                "idPenjual",
                "tajukBuku",
                "hargaBuku",
                "gambarBuku",
                "stokBuku"
            )
            ->where("idPenjual", $sellerId)
            ->where("idPembeli", $userId)
            ->latest("idTroli")
            ->get();
    }

    public static function getCheckCarts($cartIds)
    {
        return DB::table("troli")
            ->join("buku", "troli.idBuku", "=", "buku.idBuku")
            ->join("penjual", "buku.idPenjual", "=", "penjual.idPenjual")
            ->whereIn("idTroli", $cartIds)
            ->get();
    }

    public static function getCheckedCarts($sellerId, $cartIds)
    {
        return DB::table("troli")
            ->join("buku", "troli.idBuku", "=", "buku.idBuku")
            ->join("penjual", "buku.idPenjual", "=", "penjual.idPenjual")
            ->select(
                "troli.*",
                "buku.idPenjual",
                "tajukBuku",
                "hargaBuku",
                "gambarBuku",
                "namaPenjual"
            )
            ->where("buku.idPenjual", $sellerId)
            ->whereIn("idTroli", $cartIds)
            ->latest("idTroli")
            ->get();
    }

    public static function getTotalBooks($userId)
    {
        return DB::table("troli")
            ->join("buku", "buku.idBuku", "=", "troli.idBuku")
            ->join("penjual", "penjual.idPenjual", "=", "buku.idPenjual")
            ->select(
                "buku.idPenjual",
                "namaPenjual",
                DB::raw("count(*) as total")
            )
            ->groupBy("buku.idPenjual", "namaPenjual")
            ->where("idPembeli", $userId)
            ->get();
    }

    public static function getCheckedTotalBooks($cartIds)
    {
        return DB::table("troli")
            ->join("buku", "buku.idBuku", "=", "troli.idBuku")
            ->join("penjual", "penjual.idPenjual", "=", "buku.idPenjual")
            ->select(
                "noAkaunBankPenjual",
                "buku.idPenjual",
                "namaPenjual",
                DB::raw("count(*) as total"),
                DB::raw("sum(hargaTroli) as subPrice")
            )
            ->groupBy("buku.idPenjual", "namaPenjual", "noAkaunBankPenjual")
            ->whereIn("idTroli", $cartIds)
            ->get();
    }

    public static function getCheckedTotalBooksSeller($cartIds, $sellerId)
    {
        return DB::table("troli")
            ->join("buku", "buku.idBuku", "=", "troli.idBuku")
            ->join("penjual", "penjual.idPenjual", "=", "buku.idPenjual")
            ->select(
                "noAkaunBankPenjual",
                "buku.idPenjual",
                "namaPenjual",
                DB::raw("count(*) as total"),
                DB::raw("sum(hargaTroli) as subPrice")
            )
            ->groupBy("buku.idPenjual", "namaPenjual", "noAkaunBankPenjual")
            ->where("buku.idPenjual", $sellerId)
            ->whereIn("idTroli", $cartIds)
            ->first();
    }

    public static function deleteCheckedCarts($cartIds)
    {
        return DB::table("troli")
            ->whereIn("idTroli", $cartIds)
            ->delete();
    }
}
