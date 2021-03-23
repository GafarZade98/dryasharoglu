<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Category extends Component
{
    protected $category;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->category = \App\Models\Category::whereFeatured(true)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $footer_categories = $this->category;
        return view('components.category',compact('footer_categories'));
    }
}
