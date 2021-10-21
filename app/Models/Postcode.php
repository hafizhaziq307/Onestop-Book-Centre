<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Postcode extends Model
{
    use HasFactory;
    public $incrementing = false;
    public $timestamps = false;
    protected $table = "poskod";
    protected $primaryKey = "poskod";
    protected $keyType = "string";

    public static function getPostcodes()
    {
        return DB::table("poskod")->get();
    }
}
