<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderDetails extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "butiran_pesanan";
    protected $primaryKey = "idButiranPesanan";

    public static function getOrderDetails($orderDetailId)
    {
        return DB::table("butiran_pesanan")
            ->join("buku", "butiran_pesanan.idBuku", "=", "buku.idBuku")
            ->select(
                "butiran_pesanan.*",
                "tajukBuku",
                "hargaBuku",
                "gambarBuku"
            )
            ->where("idPesanan", $orderDetailId)
            ->get();
    }

    public static function getTotalSoldBook($bookId)
    {
        return DB::table("butiran_pesanan")
            ->where("idBuku", $bookId)
            ->count();
    }
}
