<?php

namespace Obelaw\NameModule\Views;


use Illuminate\View\Component;
use Illuminate\View\View;

class Layout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('obelaw-namemodule::layout');
    }
}
