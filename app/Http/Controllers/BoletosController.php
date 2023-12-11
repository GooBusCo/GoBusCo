<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chofer;
use App\Models\Client;
use App\Models\Boleto;
use App\Models\Pasajero;
class BoletosController extends Controller
{
    //

    public function buscar(Request $request){
        session(['origen' => $request->origen]);
        session(['destino' => $request->destino]);
        session(['fecha' => $request->fecha]);
        session(['ninos' => $request->ninos]);
        session(['adultos' => $request->adultos]);
        $fechaCarbon = \Carbon\Carbon::createFromFormat('d-m-Y', $request->fecha);
        // Sumar un día
        $fechaSumada = $fechaCarbon->addDay();
        $fechaFormateada = $fechaSumada->format('d-m-Y');
        session(['fecha_llegada' => $fechaFormateada]);
        $chofer = Chofer::inRandomOrder()->first();
        return view('itinerario', compact('chofer'));
    }

    public function boletos(){
        return view('boletos');
    }
    public function asientos(){
        return view('asientos');
    }
    public function pago(){
        return view('pagar');
    }

    public function almacenar(Request $request){
        session(['c_nombre' => $request->nombre]);
        session(['c_apellidos' => $request->apellidos]);
        session(['c_correo' => $request->correo]);
        session(['c_telefono' => $request->telefono]);
        session(['num_pasajeros' => $request->numPasajeros]);
        //pasajeros
        $numPasajeros = $request->numPasajeros;
    
        // Ejemplo de cómo obtener datos de un formulario con múltiples pasajeros
        for ($i = 1; $i <= $numPasajeros; $i++) {
            $nombre = $request->input('nombre_' . $i); // Suponiendo que el campo se llame 'nombre_1', 'nombre_2', etc.
            $apellidos = $request->input('apellidos_' . $i);
            session(['nombre_'.$i => $nombre]);
            session(['apellidos_'.$i => $apellidos]);
        }
        
        return redirect(route('asientos'));
    }

    public function asientos_store(Request $request){
        $request->validate([
            'as_1' => ['required'],
        ]);
        $numPasajeros = session('num_pasajeros');
    
        // Ejemplo de cómo obtener datos de un formulario con múltiples pasajeros
        for ($i = 1; $i <= $numPasajeros; $i++) {
            $asiento = $request->input('as_' . $i); 
            session(['asiento_'.$i => $asiento]);
        }

        return redirect(route('pagar.view'));
    }

    public function pagar(Request $request){
        //crear y guardar cliente
        $cliente = new Client();
        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->direccion = $request->direccion;
        $cliente->cp = $request->cp;
        $cliente->pais = $request->pais;
        $cliente->estado = $request->estado;
        $cliente->ciudad = $request->ciudad;
        $cliente->email = $request->correo;
        $cliente->telefono = $request->telefono;
        $cliente->save();

        $numPasajeros = session('num_pasajeros');
        for ($i = 1; $i <= $numPasajeros; $i++) {
            $boleto = new Boleto();
            $pasajero = new Pasajero();

            //boleto
            $boleto->origen = session('origen');
            $boleto->destino = session('destino');
            $boleto->salida = \Carbon\Carbon::createFromFormat('d-m-Y H:i:s', session('fecha') . ' ' . \Carbon\Carbon::createFromTime($request->salida+12, 0, 0)->format('H:i:s'));
            $boleto->llegada = \Carbon\Carbon::createFromFormat('d-m-Y H:i:s', session('fecha_llegada') . ' ' . \Carbon\Carbon::createFromTime($request->llegada, 0, 0)->format('H:i:s')); 
            $boleto->duracion = $request->duracion;
            $boleto->chofer = $request->chofer;
            $boleto->asiento = session('asiento_'.$i);
            $boleto->pasajero = session('nombre_'.$i) . ' ' . session('apellidos_'.$i);

            //pasajero
            $pasajero->nombre = session('nombre_'.$i);
            $pasajero->apellidos = session('apellidos_'.$i);

            //verifica el tipo de pasajero y costo
            $variable = 'ty_'.$i;
            if($request->$variable == 'adulto'){
                $boleto->costo = $request->costo;
                $pasajero->tipo = 'adulto';
            }else{
                $boleto->costo = ($request->costo)/2;
                $pasajero->tipo = 'niño';
            }
            //guardar los datos
            $boleto->save();
            $pasajero->save();
        }


        session()->flush();
        return redirect(route('home'))->with('info','Se han comprado '. $numPasajeros .' boletos. Muchas gracias por tu preferencia');
    }

}
