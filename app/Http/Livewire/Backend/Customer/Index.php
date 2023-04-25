<?php

namespace App\Http\Livewire\Backend\Customer;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.backend.customer.index');
    }
}
