<?php

use App\Livewire\CreateCategory;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(CreateCategory::class)
        ->assertStatus(200);
});
