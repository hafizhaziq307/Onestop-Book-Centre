<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;
use App\Models\Seller;

class AccountController extends Controller
{
    /**
     * Login User
     */
    public function login(Request $request)
    {
        switch ($request->userType) {
            case "buyer":
                $buyer = Buyer::where("emelPembeli", $request->email)
                    ->where("kataLaluanPembeli", $request->password)
                    ->first();

                if ($buyer == null) {
                    return redirect()
                        ->route("login")
                        ->with("msg", "Email and/or password incorrect.");
                }
                session(["id" => $buyer->idPembeli]);
                session(["roles" => $buyer->watakPembeli]);

                return redirect()->route("landingPage");

            case "seller":
                $seller = Seller::where("emelPenjual", $request->email)
                    ->where("kataLaluanPenjual", $request->password)
                    ->first();

                if ($seller == null) {
                    return redirect()
                        ->route("login")
                        ->with("msg", "Email and/or password incorrect.");
                }
                session(["id" => $seller->idPenjual]);
                session(["roles" => $seller->watakPenjual]);

                return redirect()->route("sellers.dashboard");

            default:
                dd("Error AccountController->login");
                break;
        }
    }

    /**
     * Logout User
     */
    public function logout()
    {
        session()->forget("id");
        session()->forget("watak");

        if (session("cartIds") != null) {
            session()->forget("cartIds");
        }
        return redirect()->route("login");
    }
}
