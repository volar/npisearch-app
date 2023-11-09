<?php

namespace Tests\Feature\Livewire;

use App\Livewire\NpiSearchForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class NpiSearchFormTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(NpiSearchForm::class)
            ->assertStatus(200);
    }
}
