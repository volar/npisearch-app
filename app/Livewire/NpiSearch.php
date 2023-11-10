<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\Controller;

class NpiSearch extends Component
{
    public $jsonData;
    public $results = [];
    public $query = [];
    public $page = 1;
    public $limit = 50;
    public $skip = 0;
    public $total = 0;

    public function mount()
    {
        $query = session('search_params', []);
        //dd($query);
        $this->query = $query;
        //$jsonData = json_decode(file_get_contents('sampleData.json'), TRUE);
    }

    public function render()
    {
        return view('livewire.npi-search');
    }
}
