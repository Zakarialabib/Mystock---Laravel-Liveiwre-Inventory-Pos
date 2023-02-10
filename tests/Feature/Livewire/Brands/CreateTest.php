<?php

declare(strict_types=1);

namespace Tests\Feature\Livewire\Brands;

use App\Http\Livewire\Brands\Create;
use Livewire\Livewire;
use Tests\TestCase;

class CreateTest extends TestCase
{
    /** @test */
    public function create_brand_component_can_render()
    {
        $this->loginAsAdmin();

        Livewire::test(Create::class)
            ->assertOk()
            ->assertViewIs('livewire.brands.create');
    }

      /** @test */
      public function can_create_Brand()
      {
          $this->loginAsAdmin();

          Livewire::test(Create::class)
              ->set('name', 'apple')
              ->call('create');

          $this->assertDatabaseHas('brands', [
              'name' => 'apple',
          ]);
      }
}
