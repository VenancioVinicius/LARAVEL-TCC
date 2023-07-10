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
    public $fields;
    public $data;
    public $hide;
    public $info;
    public $remove;

    public function __construct($title, $crud, $header, $fields, $data, $hide, $info, $remove)
    {
        $this->title = $title;   
        $this->crud = $crud;   
        $this->header = $header;
        $this->fields = $fields;
        $this->data = $data;    
        $this->hide = $hide;
        $this->info = (array) $info;      
        $this->remove = $remove;
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
