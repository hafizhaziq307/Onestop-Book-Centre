<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RatingStars extends Component
{
    public $ratingScore;
    public $ratingRemaining;
    public $class;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($ratingScore, $class)
    {
        $this->ratingScore = $ratingScore;
        $this->ratingRemaining = 5 - (int) $this->ratingScore;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view("components.rating-stars");
    }
}

