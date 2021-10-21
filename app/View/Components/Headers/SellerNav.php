<?php

namespace App\View\Components\Headers;

use Illuminate\View\Component;
use App\Models\Seller;

class SellerNav extends Component
{
    public $seller;

    public function __construct()
    {
        $this->seller = Seller::getCommonInfo(session('id'));
    }

    public function render()
    {
        return view('components.headers.seller-nav', [
            'seller' => $this->seller
        ]);
    }
}
