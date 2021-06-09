<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Contact extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $entries = 10;

    public function mount()
    {
        //
    }

    public function render()
    {
        $contacts = \App\Models\Contact::withCount(['emails', 'mobile_numbers'])
            ->where('name', 'like', $this->search . '%')
            ->paginate($this->entries);

        return view('livewire.contact', compact('contacts'));
    }
}
