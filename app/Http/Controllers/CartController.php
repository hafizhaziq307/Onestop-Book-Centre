<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Book;

class CartController extends Controller
{
    /**
     * Index List of Carts
     */
    public function index()
    {
        $sellers = Cart::getTotalBooks(session("id"));

        return view("carts.index", compact("sellers"));
    }

    /**
     * Store Cart
     */
    public function store(Request $request)
    {
        //check existing book in cart
        $cart = Cart::where("idBuku", $request->book)
            ->where("idPembeli", session("id"))
            ->first();

        $book = Book::find($request->book);

        // Update Cart
        if ($cart != null) {
            $item = Cart::find($cart->idTroli);
            $item->kuantitiTroli = $cart->kuantitiTroli + $request->qty;
            $item->hargaTroli = $book->hargaBuku * $cart->kuantitiTroli;
            $item->save();

            return redirect()->route("carts.index");
        }

        // Create New Cart
        $item = new Cart();
        $item->idBuku = $request->book;
        $item->kuantitiTroli = $request->qty;
        $item->hargaTroli = $request->qty * $book->hargaBuku;
        $item->idPembeli = session("id");
        $item->save();

        return redirect()->route("carts.index");
    }

    /**
     * Update Cart
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        $book = Book::find($cart->idBuku);

        if ($request->button == "plus") {
            $request->qty++;
        } elseif ($request->button == "minus") {
            $request->qty--;
        }

        $cart->kuantitiTroli = $request->qty;
        $cart->hargaTroli = $book->hargaBuku * $request->qty;
        $cart->save();

        return redirect()->route("carts.index");
    }

    /**
     * Destroy Cart
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);

        $cart->delete();

        return redirect()->route("carts.index");
    }

    
}
