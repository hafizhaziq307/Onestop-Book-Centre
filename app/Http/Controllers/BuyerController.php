<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;

class BuyerController extends Controller
{
    /**
     * Store Buyer
     */
    public function store(Request $request)
    {
        $buyer = new Buyer();
        $buyer->namaPembeli = $request->username;
        $buyer->emelPembeli = $request->email;
        $buyer->namaPenuhPembeli = "";
        $buyer->kataLaluanPembeli = $request->password;
        $buyer->noTelPembeli = "";
        $buyer->watakPembeli = "buyer";
        $buyer->gambarPembeli = "default.jpg";
        $buyer->tarikhDaftarPembeli = date("Y-m-d", strtotime("now"));
        $buyer->save();

        return view("login");
    }

    /**
     * Edit Buyer
     */
    public function edit($userId)
    {
        $buyerInfo = Buyer::find($userId);

        return view("buyers.edit", compact("buyerInfo"));
    }

    /**
     * Update Buyer
     */
    public function update(Request $request, $id)
    {
        $buyer = Buyer::find($id);

        switch ($request->button) {
            case "username":
                $buyer->namaPembeli = $request->username;
                break;

            case "phoneNo":
                $buyer->noTelPembeli = $request->phoneNo;
                break;

            case "password":
                $buyer->kataLaluanPembeli = $request->password;
                break;

            case "image":
                $file_path = public_path("uploads/buyer/$request->oldImage");
                if (
                    file_exists($file_path) &&
                    $request->oldImage != "default.jpg"
                ) {
                    unlink($file_path);
                }

                $info = getimagesize($request->image);
                $extension = image_type_to_extension($info[2]);

                $imageName = "B" . session("id") . time() . $extension;
                $request->image->move(public_path("uploads/buyer"), $imageName);
                $buyer->gambarPembeli = $imageName;
                break;

            default:
                dd("error");
                break;
        }

        $buyer->save();

        return redirect()
            ->route("buyers.edit", [$id])
            ->with("msg", "Profile sucessfully updated");
    }
}
