<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Datalist extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $title;
    public $crud;
    public $header;
    public $data;
    public $hide;

    public function __construct($title, $crud, $header, $data, $hide)
    {
        $this->title = $title;   
        $this->crud = $crud;   
        $this->header = $header;
        $this->data = $data;    
        $this->hide = $hide;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.datalist');
    }
}
