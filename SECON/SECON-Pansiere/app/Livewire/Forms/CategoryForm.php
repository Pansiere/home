<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Category;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class CategoryForm extends Form
{
    public ?Category $category = null;

    #[Validate('required', message: 'O nome é obrigatório')]
    #[Validate('min:3', message: 'O nome deve ter pelo menos 3 caracteres')]
    public $name = '';

    public function setCategory(?Category $category)
    {
        $this->category = $category;
        if ($category) {
            $this->name = $category->name;
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->category) {
            $this->category->update(['name' => $this->name]);
            $this->reset('name');
            return 'updated';
        } else {
            Auth::user()->categories()->create(['name' => $this->name]);
            $this->reset('name');
            return 'created';
        }
    }
}
