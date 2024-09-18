<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    protected $types = [
        'success','info','warning'
    ];
    /**
     * Create a new component instance.
     */
    public function __construct(public string $type, public string $message="Hello")
    {
        //
    }
    public function validType()
    {
        return in_array($this->type, $this->types)? $this->type : 'danger';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
