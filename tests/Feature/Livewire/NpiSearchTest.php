<?php

namespace Tests\Feature\Livewire;

use App\Livewire\NpiSearch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class NpiSearchTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(NpiSearch::class)
            ->assertStatus(200);
    }
}
