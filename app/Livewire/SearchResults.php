<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\NpiSearch;

class SearchResults extends Component
{
    public $data;

    public function mount()
    {
        $sentData = session()->get('data');

        if (isset($sentData['results'])) {
            $this->data = $sentData['results'];
        } else {
            $this->data = [];
        }  
    }

    public function render()
    {
        session()->forget('search_params');
        session()->forget('data');
        return view('livewire.search-results');
    }
}
