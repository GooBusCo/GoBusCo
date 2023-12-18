<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class CompraTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_compra()
    {

        Artisan::call('migrate');
        //se colocan variables de sesion que se deberian tener
        session(['num_pasajeros' => 1]);
        session(['fecha' => '19-12-2023']);
        session(['fecha_llegada' => '20-12-2023']);
        session(['asiento_1' => 12]);
        session(['nombre_1' => 'Kevin']);
        session(['apellidos_1' => 'Mina Martinez']);
        session(['origen' => 'Huejutla']);
        session(['destino' => 'Pachuca']);

        //compra de boletos incorrecta
        $compra = $this->post(route('pagar'),
            [
                'nombre' => 'Kevin',
                'apellidos' => 'Mina Martinez',
                'direccion' => 'Colonia centro',
                'cp' => '43000',
                'pais' => 'Mexico',
                'estado' => 'Hidalgo',
                'ciudad' => 'Huejutla',
                'correo' => 'kevin@gmail.com',
                'telefono' => '7712716053',
                'ty_1' => 'adulto',
                'duracion' => '10',
                'chofer' => 'Juan Hernandez Perez',
                'costo' => '500'
        ]);
        $compra->assertStatus(302)->assertRedirect(route('home'));

        //se verifica que se haya guardado el boleto, cliente y pasajero
        $this->assertDatabaseHas('clients',['nombre'=>'Angel']);
        $this->assertDatabaseHas('pasajeros',['nombre'=>'Kevin']);
        $this->assertDatabaseHas('boletos',['pasajero'=>'Kevin Mina Martinez']);

    }
}
