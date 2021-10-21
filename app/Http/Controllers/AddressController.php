<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Postcode;

class AddressController extends Controller
{
    /**
     * Index List of Addresses
     */
    public function index()
    {
        $addresses = Address::getAddresses(session("id"));

        return view("addresses.index", compact("addresses"));
    }

    /**
     * Create New Address
     */
    public function create()
    {
        $postcodes = Postcode::getPostcodes();

        return view("addresses.create", compact("postcodes"));
    }

    /**
     * Store Address
     */
    public function store(Request $request)
    {
        $address = new Address();
        $address->namaPenerima = $request->fullName;
        $address->noTel = $request->phoneNumber;
        $address->butiranAlamat = $request->street;
        $address->poskod = $request->postcode;
        $address->idPembeli = session("id");
        $address->save();

        return redirect()
            ->route("addresses.index")
            ->with("msg", "Address Sucessfully Created.");
    }

    /**
     * Edit Address
     */
    public function edit($id)
    {
        $address = Address::getAddress($id);
        $postcodes = Postcode::getPostcodes();

        return view("addresses.edit", compact("address", "postcodes"));
    }

    /**
     * Update Address
     */
    public function update($id, Request $request)
    {
        $address = Address::find($id);
        $address->namaPenerima = $request->fullName;
        $address->noTel = $request->phoneNumber;
        $address->butiranAlamat = $request->street;
        $address->poskod = $request->postcode;
        $address->idPembeli = session("id");
        $address->save();

        return redirect()
            ->route("addresses.index")
            ->with("msg", "Address Sucessfully Updated.");
    }

    /**
     * Delete Address
     */
    public function destroy($id)
    {
        $address = Address::find($id);
        $address->delete();

        return redirect()
            ->route("addresses.index")
            ->with("msg", "Address Sucessfully Deleted.");
    }
}


