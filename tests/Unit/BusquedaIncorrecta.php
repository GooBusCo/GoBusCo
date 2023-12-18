<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;


class BusquedaIncorrecta extends TestCase
{
    /**
     * A basic unit test example.
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
