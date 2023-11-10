<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// move this to Livewire form and validate
class NpiSearchForm extends Component
{
    #[Rule('required|string|min:3|max:10')]
    public $firstName;
    #[Rule('string')]
    public $lastName;
    #[Rule('numeric|min:10|max:10')]
    public $npiNumber;
    #[Rule('string|min:5')]
    public $taxonomyDescription;
    #[Rule('string')]
    public $city;
    #[Rule('string|min:3')]
    public $state;
    #[Rule('string|min:5')]
    public $zip;
    public $limit;
    public $skip;

    public $results = [];

    public $message = "hey there";

    public function render()
    {

        return view('livewire.npi-search-form', [
            'results' => $this->results,
        ]);
    }

    public function submit()
    {
        // Build the query parameters based on user input

        $this->validate(); 

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
            'pretty' => true, // If you want a pretty-formatted JSON response
            'version' => '2.1', // Specify the API version
        ];

        $request = Request::create('/api/npiapi', 'GET', $query);
        $request->headers->set('Accept', 'application/json');
        $response = app()->handle($request);

    
        //$response = Route::dispatch($request);
        //$response = app()->handle($request);

        //$this->results = Http::get('http://127.0.0.1/api/npiapi', $query)->json();

        


        //$this->results = Http::get('http://localhost/api/npiapi', $query)->json();

        // the input fields shoud be validated before making the API request

        // Make the API request

    }
}
