<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductHome extends Component
{
    public $row_category;
    public function __construct($rowcat)
    {
        $this->row_category = $rowcat;
    }

    public function render(): View|Closure|string
    {
        $row_cat = $this->row_category;
        return view('components.product-home', compact('row_cat'));
    }
}
