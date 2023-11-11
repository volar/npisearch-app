<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

class NpiSearchForm extends Component
{
    #[Rule('nullable|string|min:3|max:10')]
    public $firstName;
    #[Rule('nullable|string')]
    public $lastName;
    #[Rule('nullable|string|min:10|max:10')]
    public $npiNumber;
    #[Rule('nullable|string|min:5')]
    public $taxonomyDescription;
    #[Rule('nullable|string')]
    public $city;
    #[Rule('nullable|string|min:3')]
    public $state;
    #[Rule('nullable|string|min:2|max:9')]
    public $zip;

    public $limit;
    public $skip;

    public $formAlert = "";

    public $data = [];

    public function mount($query = []) {
        $this->firstName = $query['firstName'] ?? '';
        $this->lastName = $query['lastName'] ?? '';
        $this->npiNumber = $query['number'] ?? '';
        $this->taxonomyDescription = $query['taxonomyDescription'] ?? '';
        $this->city = $query['city'] ?? '';
        $this->state = $query['state'] ?? '';
        $this->zip = $query['zip'] ?? '';
    }

    public function render()
    {
        return view('livewire.npi-search-form', [
            'formAlert' => $this->formAlert,
        ]);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetValidation();
        session()->forget('query');
    }

    public function selectState($state)
    {
        $this->state = $state;
    }

    public function submit()
    {
        // Build the query parameters based on user input

        $this->validate(); 

        $query = [
            'number' => $this->npiNumber,
            'taxonomyDescription' => $this->taxonomyDescription,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
        ];

        // at least one field must be set
        if(empty($query['number']) && empty($query['city']) && empty($query['state']) && empty($query['zip']) && empty($query['firstName']) && empty($query['lastName'])) {
            $this->formAlert = "Type something to search. Try a name or location.";
        } else {
            $dataResponse = $this->fetchData($query);
        }

        //dd($dataResponse);
        if (empty($dataResponse['results'])) {
            $this->formAlert = "Please modify your search criteria";
            return [];
        } else {
            $this->formAlert = "";
            $this->data = $dataResponse;
        }

        return redirect()->route('search')->with(['data'=>$this->data, 'query'=>$query]);        
    }

    private function fetchData($params){

    // TODO: use Cache to store results
    //return Cache::remember('results', 60 * 5, function() use ($params) {
        $baseUrl = 'https://npiregistry.cms.hhs.gov/api/?';

        $urlParams = [
            'number' => $params['number'],
            'enumeration_type' => '', 
            'taxonomy_description' => $params['taxonomyDescription'],
            'name_purpose' => '',
            'first_name' => $params['firstName'],
            'use_first_name_alias' => '',
            'last_name' => $params['lastName'],
            'organization_name' => '',
            'address_purpose' => '',
            'city' => $params['city'],
            'state' => $params['state'],
            'postal_code' => $params['zip'],
            'country_code' => '',
            'limit' => '50',
            'skip' => '',
            'pretty' => '',
            'version' => '2.1'
        ];

        $apiUrl = $baseUrl . http_build_query($urlParams);

        try {
            $response = Http::get($apiUrl);
            return $response->json();
        } catch (\Exception $e) {
            $this->formAlert = "Something went wrong";
            return [];
        }
    }
}