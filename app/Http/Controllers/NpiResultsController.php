<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class NpiResultsController extends Controller
{
    public function __invoke()
    {
        $parameters = request()->all();

        // validate npiNumber
        if(!empty($parameters['npiNumber']) && !preg_match('/^[0-9]+$/', $parameters['npiNumber'])) {
            return response()->json(['error' => 'Invalid characters in npiNumber'], 400);
        }
    
        // Validate taxonomyDescription
        if(!empty($parameters['taxonomyDescription']) && !preg_match('/^[a-zA-Z0-9\s-]+$/', $parameters['taxonomyDescription'])) {
            return response()->json(['error' => 'Invalid characters in taxonomyDescription'], 400); 
        }
        
        // Validate firstName
        if(!empty($parameters['firstName']) && !preg_match('/^[a-zA-Z\s-]+$/', $parameters['firstName'])) {
            return response()->json(['error' => 'Invalid characters in firstName'], 400);
        }
        
        // Validate lastName  
        if(!empty($parameters['lastName']) && !preg_match('/^[a-zA-Z\s-]+$/', $parameters['lastName'])) {
            return response()->json(['error' => 'Invalid characters in lastName'], 400);
        }
        
        // Validate city
        if(!empty($parameters['city']) && !preg_match('/^[a-zA-Z\s-]+$/', $parameters['city'])) {
            return response()->json(['error' => 'Invalid characters in city'], 400); 
        }
        
        // Validate state
        if(!empty($parameters['state']) && !preg_match('/^[a-zA-Z\s-]+$/', $parameters['state'])) {
            return response()->json(['error' => 'Invalid characters in state'], 400);
        }

        // Validate zip
        if(!empty($parameters['zip']) && !preg_match('/^[0-9]+$/', $parameters['zip'])) {
            return response()->json(['error' => 'Invalid characters in zip'], 400);
        }
    
        //dd($parameters);
        $query = [
            'number' => $parameters['npiNumber'] ?? '',
            'taxonomy_description' => $parameters['taxonomyDescription'] ?? '',
            'first_name' => $parameters['firstName'] ?? '',
            'last_name' => $parameters['lastName'] ?? '',
            'city' => $parameters['city'] ?? '',
            'state' => $parameters['state'] ?? '',
            'postal_code' => $parameters['zip'] ?? '',
            'limit' => $parameters['limit'] ?? '50',
            'skip' => $parameters['skip'] ?? '',
        ];
       
        // check if city or state or zip is set if not return error
        if(empty($query['number']) && empty($query['city']) && empty($query['state']) && empty($query['postal_code']) && empty($query['first_name']) && empty($query['last_name'])) {
            return response()->json(['error' => 'Type something to search. Try a name or location'], 400);
        }
       
        //TODO: Use cache
        //return Cache::remember('results', 60 * 5, function() use ($query) {
            $baseUrl = 'https://npiregistry.cms.hhs.gov/api/?';

            $urlParams = [
                'number' => $query['number'],
                'enumeration_type' => '', 
                'taxonomy_description' => $query['taxonomy_description'],
                'name_purpose' => '',
                'first_name' => $query['first_name'],
                'use_first_name_alias' => '',
                'last_name' => $query['last_name'],
                'organization_name' => '',
                'address_purpose' => '',
                'city' => $query['city'],
                'state' => $query['state'],
                'postal_code' => $query['postal_code'],
                'country_code' => '',
                'limit' => $query['limit'],
                'skip' => $query['skip'],
                'pretty' => '',
                'version' => '2.1'
            ];
    
            $apiUrl = $baseUrl . http_build_query($urlParams);

            //logging
            //dd($apiUrl);

            try {
                $response = Http::get($apiUrl);
                return response()->json($response->json());
            } catch (\Exception $e) {
                return response()->json([
                    'message' => 'Unable to retrieve results'
                ], 500);
            }
       //});
    }

    private function ParseData($response) {
        // parse the data
        $data = $response->json();

        // TODO
        // only return the datapoints that we need
    }
}