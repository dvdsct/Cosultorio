<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class Receta extends Component
{
    use WithPagination;

    public function render()
    {
        return view('show-recetas', [
            'recetas' => Receta::paginate(10),
        ]);
    }
}
