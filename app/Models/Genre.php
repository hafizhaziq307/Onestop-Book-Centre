<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Genre extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "genre";
    protected $primaryKey = "idGenre";

    public static function getGenre($genreId)
    {
        return DB::table("genre")
            ->where("idGenre", $genreId)
            ->first();
    }

    public static function getGenres()
    {
        return DB::table("genre")->get();
    }

    public static function getGenresSortByName()
    {
        return DB::table("genre")
            ->oldest("namaGenre")
            ->get();
    }

    public static function getBooksByGenre($genreId)
    {
        return DB::table("buku")
            ->select(
                "idBuku",
                "tajukBuku",
                "stokBuku",
                "hargaBuku",
                "gambarBuku"
            )
            ->where("idGenre", $genreId)
            ->whereIn('statusBuku', ['available'])
            ->paginate(6);
    }

    public static function sortByPrice($genreId)
    {
        return DB::table("buku")
            ->select(
                "idBuku",
                "tajukBuku",
                "stokBuku",
                "hargaBuku",
                "gambarBuku"
            )
            ->where("idGenre", $genreId)
            ->whereIn('statusBuku', ['available'])
            ->oldest("hargaBuku")
            ->paginate(6);
    }

    public static function sortByMostSales($genreId)
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
            ->where("idGenre", $genreId)
            ->whereIn('statusBuku', ['available'])
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

    public static function getRandomGenres()
    {
        return DB::table("genre")
            ->inRandomOrder()
            ->take(8)
            ->get();
    }
}
