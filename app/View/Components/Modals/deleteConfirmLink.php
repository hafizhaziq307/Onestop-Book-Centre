<?php

namespace App\View\Components\Modals;

use Illuminate\View\Component;

class deleteConfirmLink extends Component
{
    public $href;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href)
    {
        $this->$href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.modals.delete-confirm-link');
    }
}
