<?php

namespace App\View\Components;

use App\Models\Announcement;
use Illuminate\View\Component;

class Card extends Component
{
    /**
    * Create a new component instance.
    *
    * @return void
    */
    public function __construct(Announcement $announcement)
    {
        $this -> announcement=$announcement;
    }
    
    /**
    * Get the view / contents that represent the component.
    *
    * @return \Illuminate\Contracts\View\View|string
    */
    public function render()
    {
        return view('components.card');
    }
}
