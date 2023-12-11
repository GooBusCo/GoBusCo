@extends('plantilla')

@section('title', 'Central de autobuses')

@section('content')

    <br><br>
    <form class="row" method="get" action="{{route('buscar')}}">

        <div class="input-field col s12 m2">
            <select id="origen" name="origen">
            </select>
            <label><span class="material-icons left green-text">location_on</span>Origen</label>
        </div>
        <div class="input-field col s12 m2">
            <select id="destino" name="destino">
            </select>
            <label><span class="material-icons left green-text">location_on</span>Destino</label>
        </div>
        <div class="input-field col s12 m2">
            <input id="fecha" name="fecha" type="text" value="{{session('fecha');}}" class="datepicker validate" required>
            <label for="fecha">Fecha de salida:</label>
        </div>
        <div class="col s0"><input type="hidden" name="ninos" id="ninos" value="0"></div>
        <div class="col s0"><input type="hidden" name="adultos" id="adultos" value="0"></div>
        <ul class="collapsible col s12 m3">
            <li>
                <div class="collapsible-header"><i class="material-icons">directions_walk</i> <b id="numPasajeros">0 Pasajeros </b></div>
                <div class="collapsible-body row">
                    <div class="col s12">
                        <div class="row">
                            <div class="col s6">
                                <b>Adulto</b> <br><span>Mayor de 12 años</span>
                            </div>
                            <div class="col s6">
                                <div class="row">
                                    <div class="col s4"><button type="button" onclick="quitarAdultos()"><i class="material-icons">remove</i></button></div>
                                    <div class="col s4"><center><span id="numA">0</span></center></div>
                                    <div class="col s4"><button type="button" onclick="aumentarAdultos()"><i class="material-icons">add</i></button></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col s12">
                        <div class="row">
                            <div class="col s6">
                                <b>Niños</b> <br><span>Menores de 12 años</span>
                            </div>
                            <div class="col s6">
                                <div class="row">
                                    <div class="col s4"><button type="button" onclick="quitarNinos()"><i class="material-icons">remove</i></button></div>
                                    <div class="col s4"><center><span id="numN">0</span></center></div>
                                    <div class="col s4"><button type="button" onclick="aumentarNinos()"><i class="material-icons">add</i></button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="col s12 m2">
            <br>
            <button class="btn" type="submit" value="">Buscar<i class="material-icons left">search</i></button>
        </div>

    </form>
     <center><div class="row">
        <div class="col s0 m3"></div>
        <div class="col s4 m1">
            <img src="{{asset('imagenes/icons8-ubicación-100(2).png')}}" class="circle reponsive-img" style="max-height: 50px;"> 
        </div>
        <div class="col s4 m1">
            <span class="material-icons center"> east </span>
        </div>
        <div class="col s4 m1">
            <img src="{{asset('imagenes/icons8-marca-de-verificación-64(1).png')}}" class="circle reponsive-img" style="max-height: 50px; border: 1px solid grey;"> 
        </div>
        <div class="col s4 m1">
            <span class="material-icons center"> east </span>
        </div>
        <div class="col s4 m1">
            <img src="{{asset('imagenes/icons8-asiento-96 - copia.png')}}" class="circle reponsive-img" style="max-height: 50px; border: 1px solid grey;"> 
        </div>
        <div class="col s4 m1">
            <span class="material-icons center"> east </span>
        </div>
        <div class="col s4 m1" >
            <img src="{{asset('imagenes/icons8-pago-100.png')}}" class="circle reponsive-img" style="max-height: 50px; border: 1px solid grey;"> 
        </div>
    </div></center>
    <div class="row container" style="border: 2px solid grey;">
        <div class="col s12" style="border-bottom: 2px solid grey;">
            <div class="row">
                <div class="col s4" style="color: #2e7d32;"><b>GOBUS</b></div>
                <div class="col s3"></div>
                <div class="col s1 green white-text">
                   <span id="costo">$590</span> 
                </div>
                <div class="col s1">
                    <a href="{{route('boletos')}}" class="btn grey white-text">Elegir</a>
                </div>
                <div class="col s3"></div>
            </div>
        </div>
        <div class="col s12" >
            <div class="row" style="border-bottom: 2px solid grey;">
                <div class="col s4">
                    SALIDA: <span style="color: #2e7d32;" id="salida"> 10:00 pm </span> <br>
                    <span style="color: #2e7d32;"> {{session('origen');}} </span>
                </div>
                <div class="col s4">
                    <i class="material-icons large">arrow_right_alt</i> 
                </div>
                <div class="col s4">
                    LLEGADA: <span style="color: #2e7d32;" id="llegada"> 8:00 am </span> <br>
                    <span style="color: #2e7d32;"> {{session('destino');}} </span>
                </div>
            </div>
        </div>
        <div class="col s12" style="border-bottom: 2px solid grey;">
            <div style="display: flex; flex-direction:row">
                <div><img src="{{asset('imagenes/icons8-conductor-80.png')}}" class="responsive-img" alt="chofer"> </div>
                <div style="display: flex;align-items:center"><b>Chofer: </b> <a class="modal-trigger" href="#modal1"><b style="color: #2e7d32;">{{$chofer->nombre}}</b></a></div>
            </div>
        </div>
        <div class="col s12" >
            <div class="row" style="border-bottom: 2px solid grey;">
                <div class="col s4" style="border-right: 2px solid grey;">
                    <span class="material-icons left">
                        directions_bus
                    </span>
                    Primera Select
                </div>
                <div class="col s2" style="border-right: 2px solid grey;">
                    <span class="material-icons left">
                        location_on
                    </span>
                    Local
                </div>
                <div class="col s4" style="border-right: 2px solid grey;">
                    <span class="material-icons left">
                    schedule
                    </span>
                    <span id="duracion">Duracion: 8:00 horas</span> 
                </div>
                <div class="col s2">Disponibles: 24</div>
            </div>
        </div>
        <div class="col s12" style="background-color: grey;">
            <img src="{{asset('imagenes/icons8-wifi-100(1).png')}}" class="reponsive-img" style="max-height: 40px;">
            <img src="{{asset('imagenes/icons8-televisión-100.png')}}" class="reponsive-img" style="max-height: 40px;">
            <img src="{{asset('imagenes/icons8-aire-acondicionado-100.png')}}" class="reponsive-img" style="max-height: 40px;">
            <img src="{{asset('imagenes/icons8-wc-100.png')}}" class="reponsive-img" style="max-height: 40px;">
        </div>
    </div>

    <!-- Modal Structure -->
    
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {
                format: 'dd-mm-yyyy',
                i18n: {
                    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                    monthsShort: ["01", "02", "03", "04", "05", "05", "07", "08", "09", "10", "11", "12"],
                    weekdays: ["Domingo","Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
                    weekdaysShort: ["Dom","Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                    weekdaysAbbrev: ["D","L", "M", "M", "J", "V", "S"],
                    cancel : 'cancelar',
                    clear: 'limpiar'
                },
                minDate: new Date()
            });
        });
    </script>
    <script>
        var pasajeros = Number("{{session('adultos');}}") + Number("{{session('ninos');}}");
        var ninos = Number("{{session('ninos');}}");
        var adultos = Number("{{session('adultos');}}");
        colocar();
        function aumentarAdultos(){
            if(pasajeros<5){
                adultos ++;
                pasajeros ++;
                colocar();
            }
        }
        function aumentarNinos(){
            if(pasajeros<5){
                ninos ++;
                pasajeros ++;
                colocar();
            }
        }
        function quitarAdultos(){
            if(pasajeros>1 && adultos>1){
                adultos --;
                pasajeros --;
                colocar();
            }
        }
        function quitarNinos(){
            if(pasajeros>1 && ninos>0){
                ninos --;
                pasajeros --;
                colocar();
            }
        }
        function colocar(){
            document.getElementById('numPasajeros').innerHTML = pasajeros + ' pasajeros';
            document.getElementById('numA').innerHTML = adultos;
            document.getElementById('numN').innerHTML = ninos;

            document.getElementById('adultos').value = adultos;
            document.getElementById('ninos').value = ninos;
        }
    </script>
    <script>
        const costos = [250,400,500,700,750];
        const salidas = [5,4,6,7,8,9,10,11,12];
        const llegadas = [4,5,6,7,8,9,10,11,12];
        localStorage.setItem('chofer', '{{$chofer->nombre}}');
        localStorage.setItem('costo', costos[Math.floor(Math.random() * costos.length)]);
        localStorage.setItem('salida', salidas[Math.floor(Math.random() * salidas.length)]);
        localStorage.setItem('llegada', llegadas[Math.floor(Math.random() * llegadas.length)]);
        localStorage.setItem('duracion', (12- Number(localStorage.getItem('salida'))) + Number(localStorage.getItem('llegada')));
        document.getElementById('costo').innerHTML = '$'+ localStorage.getItem('costo'); 
        document.getElementById('salida').innerHTML =  localStorage.getItem('salida')+':00 pm' ;
        document.getElementById('llegada').innerHTML =  localStorage.getItem('llegada') +':00 am' ;
        document.getElementById('duracion').innerHTML = 'Duracion: '+  localStorage.getItem('duracion') +':00 horas' ;
    </script>
        <script>
        const ciudadesM= [
        "Huejutla",
        "Atlapexco",
        "Pachuca",
        "Tulancingo",
        "Mineral de la Reforma",
        "Tizayuca",
        "Actopan",
        "Ciudad de México",
        "Guadalajara",
        "Monterrey",
        "Puebla",
        "Tijuana",
        "Querétaro",
        "Mérida",
        "Cancún",
        "Oaxaca",
        ];

        function cargarDestinos(ciudades, selectId, origenSeleccionado) {
            const selectDestino = document.getElementById(selectId);

            ciudades.forEach(ciudad => {
                if (ciudad !== origenSeleccionado) {
                const opcion = document.createElement("option");
                opcion.text = ciudad;
                opcion.value = ciudad;
                if(localStorage.getItem('destino') === ciudad){
                    opcion.selected = true;
                }
                selectDestino.appendChild(opcion);
                }
            });
            selectDestino.addEventListener("change", function() {
                const origenSeleccionado = this.value;
                localStorage.setItem('destino', origenSeleccionado);
            });

        }

        // Función para agregar opciones al select de origen
        function agregarCiudadesAlSelect(ciudades, selectId, selectDestinoId) {
            const selectOrigen = document.getElementById(selectId);

            ciudades.forEach(ciudad => {
                const opcion = document.createElement("option");
                opcion.text = ciudad;
                opcion.value = ciudad;
                if(localStorage.getItem('origen') === ciudad){
                    opcion.selected = true;
                }
                selectOrigen.appendChild(opcion);
            });

            // Evento change para el select de origen
            selectOrigen.addEventListener("change", function() {
                const origenSeleccionado = this.value;
                localStorage.setItem('origen', origenSeleccionado);
                window.location.reload();
            });
        }

        agregarCiudadesAlSelect(ciudadesM, "origen", "destino");
        const ciudadesFiltradas = ciudadesM.filter(ciudad => ciudad !== localStorage.getItem('origen'));
        cargarDestinos(ciudadesFiltradas, "destino", localStorage.getItem('origen'));

    </script>
@endsection
