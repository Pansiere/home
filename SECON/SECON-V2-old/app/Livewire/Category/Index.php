<?php

namespace App\Livewire\Category;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Categorias')]
class Index extends Component
{
    public function render()
    {
        return view('category.index');
    }
}
