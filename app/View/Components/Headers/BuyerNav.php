<?php

namespace App\View\Components\Headers;

use Illuminate\View\Component;
use App\Models\Buyer;
use App\Models\Cart;

class BuyerNav extends Component
{
    public $buyer;
    public $totalCart;
    public $query;

    public function __construct($query)
    {
        $this->buyer = Buyer::getCommonInfo(session('id'));
        $this->totalCart = Cart::where('idPembeli', session('id'))->count();
        $this->query = $query;
    }

    public function render()
    {
        return view('components.headers.buyer-nav', [
            'buyer' => $this->buyer,
            'totalCart' => $this->totalCart
        ]);
    }
}
