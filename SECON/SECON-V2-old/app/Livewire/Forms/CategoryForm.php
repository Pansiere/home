<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;


class CategoryForm extends Form
{
    public ?Category $category;

    #[Validate('required', message: 'O campo nome é obrigatório')]
    #[Validate('min:3', message: 'O campo nome deve ter pelo menos 3 caracteres')]
    public $name = '';

    public function store()
    {
        $this->validate();

        Auth::user()->categories()->create($this->only(['name']));
    }

    public function update()
    {
        $this->validate();

        $this->category->update($this->all());
    }
}
