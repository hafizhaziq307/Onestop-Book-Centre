<?php

namespace App\View\Components\Icons;

use Illuminate\View\Component;

class Logout extends Component
{
    public $class;

    public function __construct($class)
    {
        $this->class = $class;
    }


    public function render()
    {
        return view('components.icons.logout');
    }
}
