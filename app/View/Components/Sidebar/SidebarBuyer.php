<?php

namespace App\View\Components\Sidebar;

use Illuminate\View\Component;

class SidebarBuyer extends Component
{
    public $userId;
    public $active;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($active = null)
    {
        $this->userId = session('id');
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.sidebar.sidebar-buyer');
    }
}
