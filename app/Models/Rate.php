<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rate extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "penilaian";
    protected $primaryKey = "idPenilaian";

    public static function ratingExist($orderId)
    {
        return DB::table("penilaian")
            ->select("markahPenilaian")
            ->where("idPesanan", $orderId)
            ->first();
    }

    public static function getOrderRatings($orderId, $bookIds)
    {
        return DB::table("penilaian")
            ->join("buku", "penilaian.idBuku", "=", "buku.idBuku")
            ->select(
                "tajukBuku",
                "hargaBuku",
                "gambarBuku",
                "idPenilaian",
                "penilaian.idBuku"
            )
            ->where("idPesanan", $orderId)
            ->whereIn("penilaian.idBuku", $bookIds)
            ->get();
    }

    public static function getAvgRating($bookId)
    {
        return DB::table("penilaian")
            ->select(DB::raw("ROUND(AVG(markahPenilaian), 1) as average"))
            ->where("idBuku", $bookId)
            ->whereBetween("markahPenilaian", [1, 5])
            ->first();
    }

    public static function getTotalRaters($bookId)
    {
        return DB::table("penilaian")
            ->where("idBuku", $bookId)
            ->count();
    }

    public static function getRatingsPerGroup($bookId, $rateScore)
    {
        return DB::table("penilaian")
            ->where("idBuku", $bookId)
            ->where("markahPenilaian", $rateScore)
            ->count();
    }
}
