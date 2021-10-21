<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Book;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class SellerController extends Controller
{
    /**
     * Show Seller
     */
    public function show($id)
    {
        $books = Seller::getBooksBySeller($id);
        $seller = Seller::find($id);
        $totalBook = $books->total();
        $joinedDate = Carbon::parse(
            strtotime($seller->tarikhDaftarPenjual)
        )->diffForHumans();

        return view(
            "sellers.show",
            compact("books", "seller", "totalBook", "joinedDate")
        );
    }

    /**
     * Edit Seller
     */
    public function edit($id)
    {
        $sellerInfo = Seller::find($id);

        return view("sellers.edit", compact("sellerInfo"));
    }

    /**
     * Update Seller
     */
    public function update($id, Request $request)
    {
        $seller = Seller::find($id);

        switch ($request->button) {
            case "username":
                $seller->namaPenjual = $request->username;
                break;

            case "phoneNo":
                $seller->noTelPenjual = $request->phoneNo;
                break;

            case "password":
                $seller->kataLaluanPenjual = $request->password;
                break;

            case "image":
                $file_path = public_path("uploads/seller/$request->oldImage");
                if (
                    file_exists($file_path) &&
                    $request->oldImage != "default.jpg"
                ) {
                    unlink($file_path);
                }

                $info = getimagesize($request->image);
                $extension = image_type_to_extension($info[2]);

                $imageName = "S" . session("id") . time() . $extension;
                $request->image->move(
                    public_path("uploads/seller"),
                    $imageName
                );
                $seller->gambarPenjual = $imageName;
                break;

            default:
                dd("error");
                break;
        }

        $seller->save();

        return redirect()
            ->route("sellers.edit", $id)
            ->with("msg", "Profile sucessfully updated");
    }

    /**
     * Sort Seller Books
     */
    public function sort(Request $request, $id)
    {
        if ($request->sortby == "cheapest") {
            $books = Seller::sortbyPrice($id);
        } else {
            $books = Seller::sortbyMostSales($id);
        }
        $seller = Seller::find($id);
        $sortby = $request->sortby;
        $totalBook = $books->total();
        $joinedDate = Carbon::parse(
            strtotime($seller->tarikhDaftarPenjual)
        )->diffForHumans();

        return view(
            "sellers.sort",
            compact("books", "seller", "totalBook", "sortby", "joinedDate")
        );
    }

     /**
     * Dashboard Page
     */
    public function dashboard()
    {
        $orderShip = Order::getTotalOrders("ship", session("id"));
        $orderReceive = Order::getTotalOrders("receive", session("id"));
        $orderComplete = Order::getTotalOrders("completed", session("id"));

        $bestsellingBooks = Book::getTopBestsellingBooks(session("id"));

        $xRaws = CarbonPeriod::create(
            now()->subDays(24),
            "3 days",
            date("Y-m-d", time())
        );
        $xValues = [];
        foreach ($xRaws as $xRaw) {
            array_push($xValues, $xRaw->format("d F"));
        }

        return view(
            "sellers.dashboard",
            compact(
                "orderShip",
                "orderReceive",
                "orderComplete",
                "bestsellingBooks",
                "xValues"
            )
        );
    }
}
