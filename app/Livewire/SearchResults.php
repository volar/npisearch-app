<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\NpiSearch;

class SearchResults extends Component
{
    public $data;

    public function mount(NpiSearch $jsonData)
    {
        
        $jsonData = json_decode(file_get_contents('sampleData.json'), TRUE);

        //dd($jsonData['results']);
        $this->data = $jsonData['results'];
       
    }

    public function render()
    {
        return view('livewire.search-results');
    }
}
