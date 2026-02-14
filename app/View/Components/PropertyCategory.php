<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Property\PropertyCategory as PropertyCategoryModel;

class PropertyCategory extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $propertyCategories;

    public function __construct($propertyCategories)
    { 
        $this->propertyCategories = $propertyCategories;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.property-category');
    }
}
