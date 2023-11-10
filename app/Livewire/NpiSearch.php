<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\Controller;

class NpiSearch extends Component
{
    public $jsonData;

    public function mount()
    {
        // Initialize $jsonData with the data you want to share
        $this->jsonData = json_decode(file_get_contents('sampleData.json'), TRUE);
    }

    public function render()
    {
        return view('livewire.npi-search');
    }
}
