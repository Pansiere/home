<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Livewire\Forms\CategoryForm;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public CategoryForm $form;

    public function save()
    {
        $this->form->store();

        $this->redirect('/categorias', navigate: true);
    }

    public function render()
    {
        return view('category.create');
    }
}


