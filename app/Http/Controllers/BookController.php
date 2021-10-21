<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\SellerCourier;
use App\Models\Genre;
use App\Models\Rate;
use App\Models\Seller;
use Carbon\Carbon;

class BookController extends Controller
{
    /**
     * Index List of Books
     */
    public function index()
    {
        $books = Book::getBooks(session("id"));
        return view("books.index", compact("books"));
    }

     /**
     * Create New Book
     */
    public function create()
    {
        $genres = Genre::getGenres();
        $sellers = Seller::getSellers();

        return view("books.create", compact("genres", "sellers"));
    }

    /**
     * Store Book
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->tajukBuku = $request->title;
        $book->isbnBuku = $request->isbn;
        $book->pengarangBuku = $request->author;
        $book->penerbitBuku = $request->publisher;
        $book->tarikhTerbitBuku = $request->publicationDate;
        $book->ukuranBuku = "$request->length x $request->width x $request->height";
        $book->mukaSuratBuku = $request->pages;
        $book->sinopsisBuku = $request->description;
        $book->tarikhCiptaBuku = now();
        $book->stokBuku = $request->qtyStock;
        $book->hargaBuku = $request->price;
        $book->jenisKulitBuku = "Paperback";

        $info = getimagesize($request->bookCover);
        $extension = image_type_to_extension($info[2]);
        $imageName = "S" . session("id") . time() . $extension;
        $request->bookCover->move(public_path("uploads/book"), $imageName);
        $book->gambarBuku = $imageName;

        $book->statusBuku = "available";
        $book->idGenre = $request->genre;
        $book->idPenjual = $request->seller;

        $book->save();

        return redirect()->route("books.index");
    }

    /**
     *  Show Book
     */
    public function show($id)
    {
        $book = Book::getBook($id);
        $couriers = SellerCourier::getSellerCouriers($book->idPenjual);

        $seller = Seller::getCommonInfo($book->idPenjual);

        $book->tarikhTerbitBuku = date(
            "F d, Y",
            strtotime($book->tarikhTerbitBuku)
        );
        $uploadTime = Carbon::parse(
            strtotime($book->tarikhCiptaBuku)
        )->diffForHumans();
        $joinedDate = Carbon::parse(
            strtotime($seller->tarikhDaftarPenjual)
        )->diffForHumans();

        $books = Seller::getBooksBySeller($book->idPenjual);
        $totalBook = $books->total();

        $totalRater = Rate::getTotalRaters($id);

        return view(
            "books.show",
            compact(
                "book",
                "uploadTime",
                "couriers",
                "totalRater",
                "totalBook",
                "joinedDate"
            )
        );
    }

    /**
     * Edit Book
     */
    public function edit($id)
    {
        $book = Book::getBook($id);
        $selectedGenre = Genre::getGenre($book->idGenre);
        $genres = Genre::getGenres();

        $book->ukuranBuku = str_replace(" ", "", $book->ukuranBuku);
        $book->ukuranBuku = preg_split("/[x]/", $book->ukuranBuku);
        $totalRater = Rate::getTotalRaters($id);

        return view(
            "books.edit",
            compact("book", "selectedGenre", "genres", "totalRater")
        );
    }

    /**
     * Update Book
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        switch ($request->button) {
            case "image":
                $file_path = public_path("uploads/book/$request->oldImage");
                if (file_exists($file_path)) {
                    unlink($file_path);
                }

                $info = getimagesize($request->image);
                $extension = image_type_to_extension($info[2]);

                $imageName = "S" . session("id") . time() . $extension;
                $request->image->move(public_path("uploads/book"), $imageName);
                $book->gambarBuku = $imageName;
                break;

            case "title":
                $book->tajukBuku = $request->title;
                break;

            case "price":
                $book->hargaBuku = $request->price;
                break;

            case "stock":
                $book->stokBuku = $request->qtyStock;
                if ($book->stokBuku <= 0) {
                    $book->statusBuku = "out of stock";
                }
                break;

            case "genre":
                $book->idGenre = $request->genre;
                break;

            case "book_details":
                $book->isbnBuku = $request->isbn;
                $book->pengarangBuku = $request->author;
                $book->penerbitBuku = $request->publisher;
                $book->mukaSuratBuku = $request->pages;
                $book->tarikhTerbitBuku = $request->publicationDate;
                $book->jenisKulitBuku = $request->format;
                $book->ukuranBuku = "$request->length x $request->width x $request->height";
                break;

            case "description":
                $book->sinopsisBuku = $request->description;
                break;

            default:
                dd("Error in BookController->update()");
                break;
        }
        $book->save();

        return redirect()
            ->route("books.edit", $id)
            ->with("msg", "Book sucessfully updated");
    }

    /**
     * Delete Book (Change status of book)
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        $book->statusBuku = "deleted";
        $book->save();

        return redirect()
            ->route("books.index", $id)
            ->with("msg", "Book sucessfully deleted");
    }

    /**
     * Search Book using Title of book
     */
    public function search(Request $request)
    {
        $books = Book::searchByTitleBook($request->q);
        $q = $request->q;

        return view("books.search", compact("books", "q"));
    }

    /**
     * Sort Book
     */
    public function sort(Request $request)
    {
        if ($request->sortby == "cheapest") {
            $books = Book::sortByPrice($request->q);
        } else {
            $books = Book::sortByMostSales($request->q);
        }
        $sortby = $request->sortby;
        $q = $request->q;

        return view("books.sort", compact("books", "sortby", "q"));
    }

   

    
}
