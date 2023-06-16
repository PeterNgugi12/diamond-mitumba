<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WishlistCountComponent extends Component
{
    protected $listeners = ['refreshcomponent'=>'$refresh'];
    public function render()
    {
        return view('livewire.wish-list-count-component');
    }
}