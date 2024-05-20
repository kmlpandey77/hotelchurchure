<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Btn extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $label,
        public string $type = 'submit',
        public string $color = 'bg-primary'
    )
    {}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.btn');
    }
}
