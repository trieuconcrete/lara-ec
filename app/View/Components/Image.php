<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Image extends Component
{
    public $path = null;
    public $width = null;
    public $height = null;
    public $class = null;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($path = null, $width = null, $height = null, $class = null)
    {
        $this->path = $path;
        $this->width = $width;
        $this->height = $height;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.image');
    }
}
