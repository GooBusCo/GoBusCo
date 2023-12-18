<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BusquedaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_busqueda()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);

        //busqueda incorrecta
        $busquedaMal = $this->get(route('buscar'),
            [
                'origen' => 'Huejutla',
                'destino' => 'Pachuca',
                'fecha' => '25-12-2023',
                'adultos' => '0',
                'ninos' => '0'
        ]);
        $busquedaMal->assertStatus(302)->assertRedirect(route('home'));

    }
}
