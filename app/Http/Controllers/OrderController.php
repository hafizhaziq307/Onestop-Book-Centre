<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Checkout;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Address;
use App\Models\Courier;
use App\Models\Rate;

class OrderController extends Controller
{
    /**
     * Index Lists of Order
     */
    public function index()
    {
        switch (session("roles")) {
            case "buyer":
                $orders = Order::getOrders(session("id"), "ship");
                return view("orders.index", compact("orders"));

            case "seller":
                $orders = Order::getOrdersForSeller(session("id"), "ship");
                return view("orders.index-seller", compact("orders"));

            default:
                dd("Error in OrderController->index()");
                break;
        }
    }

    /**
     * Store Order
     */
    public function store(Request $request)
    {
        $containers = Checkout::getContainerCheckouts(session("id"));

        // create pesanan
        foreach ($containers as $container) {
            $timestamp = time();
            $timestamp_id =
                "B" . session("id") . "S" . $container->idPenjual . $timestamp;

            $order = new Order();
            $order->idPesanan = $timestamp_id;
            $order->idAlamat = $container->idAlamat;
            $order->idKurier = $container->idKurier;
            $order->idPembeli = session("id");
            $order->idPenjual = $container->idPenjual;
            $order->subHargaPesanan = $container->subHarga;
            $order->hargaPesanan =
                $order->subHargaPesanan + $container->hargaKurier;
            $order->statusPesanan = "ship";
            $order->tarikhWaktuPesanan = $timestamp;

            $documentName = time() . ".pdf";
            $request->transaction->move(
                public_path("uploads/transaction"),
                $documentName
            );
            $order->gambarTransaksi = $documentName;

            $order->save();

            $checkouts = Checkout::getCheckouts(
                session("id"),
                $order->idPenjual
            );

            // create butiran_pesanan
            foreach ($checkouts as $checkout) {
                $orderDetails = new OrderDetails();
                $orderDetails->idPesanan = $timestamp_id;
                $orderDetails->idBuku = $checkout->idBuku;
                $orderDetails->kuantitiPesanan = $checkout->kuantitiBuku;
                $orderDetails->jumlahHargaBuku = $checkout->jumlahHargaBuku;
                $orderDetails->save();

                // create rating (default value)
                $rate = new Rate();
                $rate->idPembeli = session("id");
                $rate->idPesanan = $timestamp_id;
                $rate->idBuku = $checkout->idBuku;
                $rate->markahPenilaian = 0;
                $rate->save();
            }
        }

        // Reset value
        Checkout::deleteAllCheckouts(session("id"));
        Cart::deleteCheckedCarts(session("cartIds"));

        return redirect()
            ->route("orders.index")
            ->with("msg", "Your books has been ordered.");
    }

    /**
     * Show Order
     */
    public function show($id)
    {
        switch (session("roles")) {
            case "buyer":
                $order = Order::getOrder($id);
                $address = Address::getAddress($order->idAlamat);
                $courier = Courier::getCourier($order->idKurier);
                $orderDetails = OrderDetails::getOrderDetails($id);
                $rating = Rate::ratingExist($id);
                return view(
                    "orders.show",
                    compact(
                        "order",
                        "address",
                        "courier",
                        "orderDetails",
                        "rating"
                    )
                );

            case "seller":
                $order = Order::getOrderForSeller($id);
                $address = Address::getAddress($order->idAlamat);
                $courier = Courier::getCourier($order->idKurier);
                $orderDetails = OrderDetails::getOrderDetails($id);
                $orderTime = Carbon::parse(
                    $order->tarikhWaktuPesanan
                )->diffForHumans();
                return view(
                    "orders.show-seller",
                    compact(
                        "order",
                        "address",
                        "courier",
                        "orderDetails",
                        "orderTime"
                    )
                );
                break;

            default:
                dd("Error in OrderController->show()");
                break;
        }
    }

    /**
     * Update Order
     */
    public function update($id)
    {
        switch (session("roles")) {
            case "buyer":
                Order::updateOrderStatus($id, "completed");
                return redirect()->route("orders.index");

            case "seller":
                Order::updateOrderStatus($id, "receive");
                return redirect()->route("orders.index");
                break;

            default:
                dd("Error in OrderController->update()");
                break;
        }
    }

    /**
     * Sort Order 
     */
    public function sort(Request $request)
    {
        switch (session("roles")) {
            case "buyer":
                $orders = Order::getOrders(session("id"), "receive");
                return view("orders.sort", compact("orders"));

            case "seller":
                $orders = Order::getOrdersForSeller(session("id"), "receive");
                return view("orders.sort-seller", compact("orders"));

            default:
                dd("Error in OrderController->sort()");
                break;
        }
    }

    /**
     * History Order
     */
    public function history()
    {
        $orders = Order::getOrders(session("id"), "completed");

        return view("orders.history", compact("orders"));
    }
}
