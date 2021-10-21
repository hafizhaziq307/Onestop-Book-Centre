<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Index List of Genres
     */
    public function index()
    {
        $genres = Genre::getGenres();

        return view("genres.index", compact("genres"));
    }

    /**
     * Show Genre
     */
    public function show(Request $request, $genreId)
    {
        $books = Genre::getBooksByGenre($genreId);
        $genre = Genre::find($genreId);

        return view("genres.show", compact("books", "genre"));
    }

    /**
     * Sort Genre Book
     */
    public function sort(Request $request, $genreId)
    {
        if ($request->sortby == "cheapest") {
            $books = Genre::sortByPrice($genreId);
        } else {
            $books = Genre::sortByMostSales($genreId);
        }
        $genre = Genre::find($genreId);
        $sortby = $request->sortby;

        return view("genres.sort", compact("books", "genre", "sortby"));
    }
}
