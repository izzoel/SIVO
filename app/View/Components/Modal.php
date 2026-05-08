<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    public function __construct(
        public string $name,
        public string $title = '',
        public string $description = '',
        public string $maxWidth = '2xl',
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
