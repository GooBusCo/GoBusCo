@extends('plantilla')

@section('title', 'Central de autobuses')

@section('content')

    <br><br>
    <center><div class="row">
        <div class="col s0 m3"></div>
        <div class="col s4 m1">
            <img src="{{asset('imagenes/icons8-ubicación-100(2).png')}}" class="circle reponsive-img" style="max-height: 50px;"> 
        </div>
        <div class="col s4 m1">
            <span class="material-icons center"> east </span>
        </div>
        <div class="col s4 m1 ">
            <img src="{{asset('imagenes/icons8-marca-de-verificación-64(1).png')}}" class="circle reponsive-img green" style="max-height: 50px; border: 1px solid grey;"> 
        </div>
        <div class="col s4 m1">
            <span class="material-icons center"> east </span>
        </div>
        <div class="col s4 m1">
            <img src="{{asset('imagenes/icons8-asiento-96 - copia.png')}}" class="circle reponsive-img green" style="max-height: 50px; border: 1px solid grey;"> 
        </div>
        <div class="col s4 m1">
            <span class="material-icons center"> east </span>
        </div>
        <div class="col s4 m1" >
            <img src="{{asset('imagenes/icons8-pago-100.png')}}" class="circle reponsive-img" style="max-height: 50px; border: 1px solid grey;"> 
        </div>
    </div></center>

    <div class="row container "> 
        <form class="col s12 m6" method="post" action="{{URL::secure('/itinerario/asientos/guardar')}}" >
            @csrf
            <div class="row">
                @for ($i = 1; $i <=session('adultos'); $i++)
                    <div class="col s12" style="border: solid 1px green;margin:7px;padding:7px">
                        AS: <span id="asV_{{$i}}"></span> ADULTO
                    </div> 
                    <input type="hidden" name="as_{{$i}}" id="as_{{$i}}" class="input-field validate" readonly required>
                @endfor
                @for ($i=session('adultos') + 1; $i <=session('ninos') + session('adultos'); $i++)
                    <div class="col s12" style="border: solid 1px green;margin:7px;padding:7px">
                        AS: <span id="asV_{{$i}}"></span> NIÑO
                    </div>
                    <input type="hidden" name="as_{{$i}}" class="input-field validate" id="as_{{$i}}" readonly required>
                @endfor
            </div>
            <div class="row section" style="border:2px solid grey">
                <div class="col s2"><img src="{{asset('imagenes/volante.png')}}" class="circle reponsive-img green" style="max-height: 50px; border: 1px solid grey;"></div>
                <div class="col s8">
                    <div class="row">
                        <div class="col s2"><button type="button" id="asiento-01" onclick="toggleAsiento('01')" style="background-color: #CDFFD8;">01</button></div>
                        <div class="col s2"><button type="button" id="asiento-05" onclick="toggleAsiento('05')" style="background-color: #CDFFD8;">05</button></div>
                        <div class="col s2"><button type="button" id="asiento-09" onclick="toggleAsiento('09')" style="background-color: #CDFFD8;">09</button></div>
                        <div class="col s2"><button type="button" id="asiento-13" onclick="toggleAsiento('13')" style="background-color: #CDFFD8;">13</button></div>
                        <div class="col s2"><button type="button" id="asiento-17" onclick="toggleAsiento('17')" style="background-color: #CDFFD8;">17</button></div>
                        <div class="col s2"><button type="button" id="asiento-21" onclick="toggleAsiento('21')" style="background-color: #CDFFD8;">21</button></div>
                    </div>
                    <div class="row">
                        <div class="col s2"><button type="button" id="asiento-02" onclick="toggleAsiento('02')" style="background-color: #CDFFD8;">02</button></div>
                        <div class="col s2"><button type="button" id="asiento-06" onclick="toggleAsiento('06')" style="background-color: #CDFFD8;">06</button></div>
                        <div class="col s2"><button type="button" id="asiento-10" onclick="toggleAsiento('10')" style="background-color: #CDFFD8;">10</button></div>
                        <div class="col s2"><button type="button" id="asiento-14" onclick="toggleAsiento('14')" style="background-color: #CDFFD8;">14</button></div>
                        <div class="col s2"><button type="button" id="asiento-18" onclick="toggleAsiento('18')" style="background-color: #CDFFD8;">18</button></div>
                        <div class="col s2"><button type="button" id="asiento-22" onclick="toggleAsiento('22')" style="background-color: #CDFFD8;">22</button></div>
                    </div><br>
                    <div class="row">
                        <div class="col s2"><button type="button" id="asiento-03" onclick="toggleAsiento('03')" style="background-color: #CDFFD8;">03</button></div>
                        <div class="col s2"><button type="button" id="asiento-07" onclick="toggleAsiento('07')" style="background-color: #CDFFD8;">07</button></div>
                        <div class="col s2"><button type="button" id="asiento-11" onclick="toggleAsiento('11')" style="background-color: #CDFFD8;">11</button></div>
                        <div class="col s2"><button type="button" id="asiento-15" onclick="toggleAsiento('15')" style="background-color: #CDFFD8;">15</button></div>
                        <div class="col s2"><button type="button" id="asiento-19" onclick="toggleAsiento('19')" style="background-color: #CDFFD8;">19</button></div>
                        <div class="col s2"><button type="button" id="asiento-23" onclick="toggleAsiento('23')" style="background-color: #CDFFD8;">23</button></div>
                    </div>
                    <div class="row">
                        <div class="col s2"><button type="button" id="asiento-04" onclick="toggleAsiento('04')" style="background-color: #CDFFD8;">04</button></div>
                        <div class="col s2"><button type="button" id="asiento-08" onclick="toggleAsiento('08')" style="background-color: #CDFFD8;">08</button></div>
                        <div class="col s2"><button type="button" id="asiento-12" onclick="toggleAsiento('12')" style="background-color: #CDFFD8;">12</button></div>
                        <div class="col s2"><button type="button" id="asiento-16" onclick="toggleAsiento('16')" style="background-color: #CDFFD8;">16</button></div>
                        <div class="col s2"><button type="button" id="asiento-20" onclick="toggleAsiento('20')" style="background-color: #CDFFD8;">20</button></div>
                        <div class="col s2"><button type="button" id="asiento-24" onclick="toggleAsiento('24')" style="background-color: #CDFFD8;">24</button></div>
                    </div>
                </div>
                <div class="col s2"><img src="{{asset('imagenes/wc.png')}}" class="circle reponsive-img green" style="max-height: 50px; border: 1px solid grey;"></div>
            </div>
            <div class="row">
                <div class="col s6">
                    <div class="row">
                        <div class="col s1" style="background-color: #CDFFD8; color:#CDFFD8; border:1px solid black">0</div>
                        <div class="col s10">Disponible</div>
                    </div>
                </div>
                <div class="col s6">
                    <div class="row">
                        <div class="col s1" style="background-color: green; color:green; border:1px solid black">0</div>
                        <div class="col s10">Seleccionado</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <input type="submit" class="btn" value="Siguiente">
                </div>
            </div>
        </form>
        <div class="col s0 m1"></div>
        <div class="col s12 m5">
            <div class="row " style="border: solid 1px black;">
                <div class="col s12"><b>Itinerario de noche</b></div>
                <div class="col s12 divider"></div>
                <div class="col s12">
                    <div class="row">
                        <div class="col s6">{{session('origen');}}</div>
                        <div class="col s6"><span style="color:#2e7d32" id="salida"></span></div>
                        <div class="col s6"><span class="material-icons center">arrow_downward</span></div>
                        <div class="col s6" style="height: 30px;"> </div><br>
                        <div class="col s6">{{session('destino');}}</div>
                        <div class="col s6"><span style="color:#2e7d32" id="llegada"></span></div>
                    </div>
                </div>
                <div class="col s12 divider"></div>
                <div class="col s12">
                    <div class="row" >
                        <div class="col s6">
                            <span class="material-icons left">
                                directions_bus
                            </span>
                            Primera Select
                        </div>
                        <div class="col s6" >
                            <span class="material-icons left">
                                location_on
                            </span>
                            Local
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="border: solid 1px black;">
                <div class="col s12"><b>Detalles de pago</b></div>
                <div class="col s12 divider"></div>
                <div class="col s12"><b>{{session('ninos') + session('adultos')}} Pasajeros</b></div>
                <div class="col s12 divider"></div>
                <div class="row">
                    <div class="col s6">SUBTOTAL</div>
                    <div class="col s6"><span id="subtotal">$0</span></div>
                    <div class="col s6">IVA</div><br>
                    <div class="col s6" id="iva">$0</div>
                    <div class="col s1"></div>
                    <div class="col s10 red white-text"><span id="total">TOTAL: $0</span></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener el valor que deseas asignar
            var subtotal=localStorage.getItem('subtotal');
            var iva = localStorage.getItem('iva');
            var total = localStorage.getItem('total');
            document.getElementById('salida').innerHTML = localStorage.getItem('salida')+':00 pm <br>' + '{{session("fecha")}}';
            document.getElementById('llegada').innerHTML = localStorage.getItem('llegada')+':00 am <br>' + '{{session("fecha_llegada")}}'; 
            document.getElementById('subtotal').innerHTML = '$'+ subtotal;
            document.getElementById('iva').innerHTML = '$'+iva;
            document.getElementById('total').innerHTML = 'TOTAL: $' + total;
        });

        let asientosSeleccionados = []; // Array para almacenar los asientos seleccionados
        var cantAsientos = Number("{{session('num_pasajeros')}}");
        var asiento=1;
        function toggleAsiento(numeroAsiento) {
            const botonAsiento = document.getElementById(`asiento-${numeroAsiento}`);
            const indice = asientosSeleccionados.indexOf(numeroAsiento);

            if (indice === -1) {
                if(asiento>cantAsientos){
                    return;
                }
                // Si el asiento no está seleccionado, se agrega a los asientos seleccionados
                asientosSeleccionados.push(numeroAsiento);
                botonAsiento.style.backgroundColor = 'green'; // Cambiar el color al seleccionar
                asiento++;
            } else {
                // Si el asiento está seleccionado, se quita de los asientos seleccionados
                asientosSeleccionados.splice(indice, 1);
                botonAsiento.style.backgroundColor = '#CDFFD8'; // Restaurar el color al deseleccionar
                asiento--;
            }

            console.log('Asientos seleccionados:', asientosSeleccionados); // Mostrar asientos seleccionados en consola
            actualizarAsientosInputs();
        }

        function actualizarAsientosInputs() {
            // Obtener todos los inputs
            const inputsAsientos = document.querySelectorAll('input[id^="as_"]');
            const labelAsientos = document.querySelectorAll('span[id^="asV_"]');
            // Actualizar los valores de los inputs según la secuencia de asientos seleccionados
            for (let i = 0; i < inputsAsientos.length; i++) {
                if (asientosSeleccionados[i]) {
                    inputsAsientos[i].value = asientosSeleccionados[i];
                    labelAsientos[i].innerHTML = asientosSeleccionados[i];
                } else {
                    inputsAsientos[i].value = ''; // Limpiar el input si no hay asiento seleccionado para ese lugar
                    labelAsientos[i].innerHTML = '';
                }
            }
        }
    </script>
@endsection
