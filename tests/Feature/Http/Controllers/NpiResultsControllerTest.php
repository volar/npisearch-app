<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NpiResultsControllerTest extends TestCase
{
    //test with invalid characters in npiNumber
    public function test_npi_results_controller_invalid_characters_in_npiNumber(): void
    {
        $response = $this->get('/api/npi?npiNumber=invalid%20characters%20in%20npiNumber');

        $response->assertStatus(400);
    }
    //test with invalid characters in taxonomyDescription
    public function test_npi_results_controller_invalid_characters_in_taxonomyDescription(): void
    {
        $response = $this->get('/api/npi?taxonomyDescription=invalid%20characters%20in%20taxonomyDescription');

        $response->assertStatus(400);
    }

    //test with invalid characters in firstName
    public function test_npi_results_controller_invalid_characters_in_firstName(): void
    {
        $response = $this->get('/api/npi?firstName=invalid%20characters%20in%20firstName');

        $response->assertStatus(400);
    }

    //test with invalid characters in lastName
    public function test_npi_results_controller_invalid_characters_in_lastName(): void
    {
        $response = $this->get('/api/npi?lastName=invalid%20characters%20in%20lastName');

        $response->assertStatus(400);
    }

    //test with invalid characters in city
    public function test_npi_results_controller_invalid_characters_in_city(): void
    {
        $response = $this->get('/api/npi?city=invalid%20characters%20in%20city');

        $response->assertStatus(400);
    }

    //test with invalid characters in state
    public function test_npi_results_controller_invalid_characters_in_state(): void
    {
        $response = $this->get('/api/npi?state=invalid%20characters%20in%20state');

        $response->assertStatus(400);
    }

    //test with invalid characters in zip
    public function test_npi_results_controller_invalid_characters_in_zip(): void
    {
        $response = $this->get('/api/npi?zip=invalid%20characters%20in%20zip');

        $response->assertStatus(400);
    }

    //test with empty query params
    public function test_npi_results_controller_empty_query_params(): void
    {
        $response = $this->get('/api/npi?');

        $response->assertStatus(400);
    }

    //test with empty query params
    public function test_npi_results_controller_empty_query_params_2(): void
    {
        $response = $this->get('/api/npi?npiNumber=&taxonomyDescription=&firstName=&lastName=&city=&state=&zip=&limit=&skip=');

        $response->assertStatus(400);
    }

    //test with valid query params
    public function test_npi_results_controller_valid_query_params(): void
    {
        $response = $this->get('/api/npi?npiNumber=1234567890&taxonomyDescription=taxonomyDescription&firstName=firstName&lastName=lastName&city=city&state=state&zip=zip&limit=limit&skip=skip');

        $response->assertStatus(200);
    }
}
