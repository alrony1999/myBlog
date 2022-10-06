<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class CategoryFilter extends Component
{
    public function render()
    {
        $categories=Category::all();
        return view('components.category-filter', ['categories'=>$categories]);
    }
}
