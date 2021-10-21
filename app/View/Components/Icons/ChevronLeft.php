<?php

namespace App\View\Components\Icons;

use Illuminate\View\Component;

class ChevronLeft extends Component
{
    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.icons.chevron-left');
    }
}
