<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Address;
use App\Models\SellerCourier;
use App\Models\Cart;
use Illuminate\Queue\Events\Looping;

class CheckoutController extends Controller
{
    /**
     * Index List of Checked Cart
    */
    public static function index(Request $request)
    {
        $containers = Checkout::getContainerCheckouts(session("id"));
        $addresses = Address::getAddresses(session("id"));
        $deliveryAddress = Address::getAddress($containers[0]->idAlamat);

        $totalPrice = 0;
        foreach ($containers as $container) {
            $totalPrice =
                $totalPrice + ($container->hargaKurier + $container->subHarga);
        }

        return view(
            "checkouts.index",
            compact("containers", "addresses", "totalPrice", "deliveryAddress")
        );
    }

    /**
     * Store Checked Cart
     */
    public static function store(Request $request)
    {
        // Reset session and remove existing checkout items
        if (session("cartIds") != null) {
            session()->forget("cartIds");
            Checkout::deleteAllCheckouts(session("id"));
        }
        session(["cartIds" => $request->carts]);

        $address = Address::getFirstAddress(session("id"));
        $carts = Cart::getCheckCarts($request->carts);

        foreach ($carts as $cart) {
            $courier = SellerCourier::getSellerCourier($cart->idPenjual);
            $checkout = new Checkout();

            $checkout->idBuku = $cart->idBuku;
            $checkout->idPenjual = $cart->idPenjual;
            $checkout->idAlamat = $address->idAlamat;
            $checkout->idKurier = $courier->idKurier;
            $checkout->kuantitiBuku = $cart->kuantitiTroli;
            $checkout->jumlahHargaBuku = $cart->hargaTroli;

            $checkout->save();
        }

        return redirect()->route("checkouts.index");
    }

    /**
     * Update Checked Cart
     */
    public static function update(Request $request, $id)
    {
        switch ($request->updateType) {
            case "address":
                $output = Checkout::updateDeliveryAddress(
                    session("id"),
                    $request->addressId
                );
                break;
            case "shipping":
                $book = Cart::getCheckedTotalBooksSeller(
                    session("cartIds"),
                    $id
                );
                Checkout::updateShipping(
                    session("id"),
                    $id,
                    $request->courierId
                );
                break;
            default:
                dd("Error in CheckoutController->update()");
                break;
        }
        return redirect()->route("checkouts.index");
    }
}
