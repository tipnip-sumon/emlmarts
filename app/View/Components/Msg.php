<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\HtmlString;
use Illuminate\View\Component;

class Msg extends Component
{
    /**
     * Create a new component instance.
     */
    public $type;
    public $slot;

    protected $types = [
        'success','info','warning'
    ];
    public function __construct(string $type, string $slot="Hi")
    {
        $this->type = $type;
        $this->slot = $slot;
    }
    public function validType()
    {
        return in_array($this->type, $this->types)? $this->type : 'danger';
    }

    public function link($text,$target = "#"){
        return new HtmlString('<a href="'.$target.'" class="alert-link">'.$text.'</a>');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.msg');
    }
}
