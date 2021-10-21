<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "pesanan";
    protected $primaryKey = "idPesanan";

    public static function getOrders($buyerId, $status)
    {
        return DB::table("pesanan")
            ->join("penjual", "pesanan.idPenjual", "=", "penjual.idPenjual")
            ->select("pesanan.*", "namaPenjual", "gambarPenjual")
            ->where("idPembeli", $buyerId)
            ->where("statusPesanan", $status)
            ->latest("tarikhWaktuPesanan")
            ->get();
    }

    public static function getOrdersForSeller($sellerId, $status)
    {
        return DB::table("pesanan")
            ->join("pembeli", "pesanan.idPembeli", "=", "pembeli.idPembeli")
            ->select("pesanan.*", "namaPembeli", "gambarPembeli")
            ->where("pesanan.idPenjual", $sellerId)
            ->where("statusPesanan", $status)
            ->latest("tarikhWaktuPesanan")
            ->get();
    }

    public static function getOrder($orderId)
    {
        return DB::table("pesanan")
            ->join("penjual", "pesanan.idPenjual", "=", "penjual.idPenjual")
            ->where("idPesanan", $orderId)
            ->select("pesanan.*", "namaPenjual", "gambarPenjual")
            ->latest("tarikhWaktuPesanan")
            ->first();
    }

    public static function getOrderForSeller($orderId)
    {
        return DB::table("pesanan")
            ->join("pembeli", "pesanan.idPembeli", "=", "pembeli.idPembeli")
            ->where("idPesanan", $orderId)
            ->select("pesanan.*", "namaPembeli", "gambarPembeli")
            ->latest("tarikhWaktuPesanan")
            ->first();
    }

    public static function updateOrderStatus($orderId, $status)
    {
        return DB::table("pesanan")
            ->where("idPesanan", $orderId)
            ->update([
                "statusPesanan" => $status,
            ]);
    }

    public static function getTotalOrders($statusOrder, $sellerId)
    {
        return DB::table("pesanan")
            ->where("statusPesanan", $statusOrder)
            ->where("idPenjual", $sellerId)
            ->count();
    }
}
