<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public $placeHolder;
    public $name;
    public $type;
    public $id;
    public $value;
    public $class;
    public $errorMessage;
    public $required;
    public $autoComplete;

    public function __construct(
        string $name,
        string $placeHolder,
        string $id,
        string $type = "text",
        string $value = "",
        string $class = "",
        string $errorMessage = "error",
        bool $required = false,
        bool $autoComplete = false
    )
    {
        $this->name = $name;
        $this->placeHolder = $placeHolder;
        $this->type = $type;
        $this->id = $id;
        $this->value = $value;
        $this->class = $class;
        $this->errorMessage = $errorMessage;
        $this->required = $required;
        $this->autoComplete = $autoComplete;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}

