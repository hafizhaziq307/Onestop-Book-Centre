<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Book extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "buku";
    protected $primaryKey = "idBuku";

    public static function getBooks($sellerId)
    {
        return DB::table("buku")
            ->where("idPenjual", $sellerId)
            ->whereIn('statusBuku', ['out of stock', 'available'])
            ->latest('idBuku')
            ->get(); 
    }

    public static function getTopBestsellingBooks($sellerId)
    {
        return DB::table("pesanan")
            ->join(
                "butiran_pesanan",
                "pesanan.idPesanan",
                "=",
                "butiran_pesanan.idPesanan"
            )
            ->join("buku", "butiran_pesanan.idBuku", "=", "buku.idBuku")
            ->select(
                "buku.idBuku",
                "tajukBuku",
                "gambarBuku",
                "hargaBuku",
                "statusBuku",
                DB::raw("count(butiran_pesanan.idButiranPesanan) AS count")
            )
            ->groupBy("buku.idBuku", "tajukBuku", "gambarBuku", "hargaBuku", "statusBuku")
            ->where("pesanan.idPenjual", $sellerId)
            ->whereIn('statusBuku', ['out of stock', 'available'])
            ->orderBy("count")
            ->take(5)
            ->get();
    }

    public static function getBook($bookId)
    {
        return DB::table("buku")
            ->join("genre", "buku.idGenre", "=", "genre.idGenre")
            ->join("penjual", "buku.idPenjual", "=", "penjual.idPenjual")
            ->select("buku.*", "namaGenre", "namaPenjual", "gambarPenjual")
            ->where("idBuku", $bookId)
            ->first();
    }

    public static function searchByTitleBook($query)
    {
        return DB::table("buku")
            ->select(
                "idBuku",
                "tajukBuku",
                "stokBuku",
                "hargaBuku",
                "gambarBuku"
            )
            ->where("tajukBuku", "like", "%" . $query . "%")
            ->whereIn('statusBuku', ['available'])
            ->paginate(6);
    }

    public static function sortByPrice($query)
    {
        return DB::table("buku")
            ->select(
                "idBuku",
                "tajukBuku",
                "stokBuku",
                "hargaBuku",
                "gambarBuku"
            )
            ->where("tajukBuku", "like", "%" . $query . "%")
            ->whereIn('statusBuku', ['available'])
            ->oldest("hargaBuku")
            ->paginate(6);
    }

    public static function sortByMostSales($query)
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
            ->where("tajukBuku", "like", "%" . $query . "%")
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

    public static function getLatestBook()
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
            ->latest("idBuku")
            ->paginate(6);
    }
}

