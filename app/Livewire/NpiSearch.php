<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\Controller;

class NpiSearch extends Component
{
    public $query = [];
    public $data = [];

    public function mount()
    {
        $this->query = session('query', []);
        $data = session('data');

        if (isset($data['results'])) {
            $this->data = $data['results'];
        } else {
            $this->data = [];
        }  

        //local data for testing
        //$jsonData = json_decode(file_get_contents('sampleData.json'), TRUE);
    }

    public function render()
    {
        return view('livewire.npi-search', [
            'query' => $this->query,
            'data' => $this->data,
        ]);
    }
}
