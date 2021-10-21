<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Book;

class PageController extends Controller
{
    /**
     * LandingPage
     */
    public function landingPage(Request $request)
    {
        $showedGenres = Genre::getRandomGenres();
        $books = Book::getLatestBook();
        $genres = Genre::getGenresSortByName();
        $q = $request->q;

        return view(
            "landingPage",
            compact("showedGenres", "books", "q", "genres")
        );
    }

    /**
     * Sort Books LandingPage
     */
    public function landingPageSort(Request $request)
    {
        if ($request->sortby == "cheapest") {
            $books = Book::sortByPrice($request->q);
        } else {
            $books = Book::sortByMostSales($request->q);
        }
        $showedGenres = Genre::getRandomGenres();
        $genres = Genre::getGenresSortByName();
        $sortby = $request->sortby;
        $q = $request->q;
        
        return view(
            "landingPageSort",
            compact("books", "sortby", "q", "showedGenres", "genres")
        );
    }
}
