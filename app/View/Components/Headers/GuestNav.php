<?php

namespace App\View\Components\Headers;

use Illuminate\View\Component;

class GuestNav extends Component
{
    public $query;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.headers.guest-nav');
    }
}
