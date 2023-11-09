<?php

namespace App\Livewire;

use Livewire\Component;

class NpiSearchForm extends Component
{
    public $firstName;
    public $lastName;
    public $npiNumber;
    public $taxonomyDescription;
    public $city;
    public $state;
    public $zip;
    public $limit;
    public $skip;
    public $results;

    public function render()
    {
        return view('livewire.npi-search-form');
    }

    public function submit()
    {
        // Build the query parameters based on user input
        $query = [
            'number' => $this->npiNumber,
            'taxonomy_description' => $this->taxonomyDescription,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->zip,
            'limit' => $this->limit,
            'skip' => $this->skip,
        ];

        return $this->redirect('/npi-search?' . http_build_query($query));
    }
}
