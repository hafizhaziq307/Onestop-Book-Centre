<?php

namespace App\View\Components\Progressbar;

use Illuminate\View\Component;

class OrderBuyer extends Component
{
    public $currentStatus;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($currentStatus)
    {
        $this->currentStatus = $currentStatus;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.progressbar.order-buyer');
    }
}
