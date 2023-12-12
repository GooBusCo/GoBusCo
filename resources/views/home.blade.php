@extends('plantilla')

@section('title', 'Central de autobuses 2')

@section('content')
    <img src="{{asset('imagenes/The World(2).png')}}" class="responsive-img" style="max-width: 100%;" alt="Autobuses">
    <br>
    <form id="form_1" class="row" method="get" action="{{route('buscar')}}">

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
            <input id="fecha" name="fecha" type="text" class="datepicker validate" required>
            <label for="fecha">Fecha de salida:</label>
        </div>
        <div class="col s0"><input type="hidden" name="ninos" id="ninos" value="0"></div>
        <div class="col s0"><input type="hidden" name="adultos" id="adultos" value="1"></div>
        <ul class="collapsible col s12 m3">
            <li>
                <div class="collapsible-header"><i class="material-icons">directions_walk</i> <b id="numPasajeros">1 Pasajeros </b></div>
                <div class="collapsible-body row">
                    <div class="col s12">
                        <div class="row">
                            <div class="col s6">
                                <b>Adulto</b> <br><span>Mayor de 12 años</span>
                            </div>
                            <div class="col s6">
                                <div class="row">
                                    <div class="col s4"><button type="button" onclick="quitarAdultos()"><i class="material-icons">remove</i></button></div>
                                    <div class="col s4"><center><span id="numA">1</span></center></div>
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
    <div class="row">
        <br>
        <div class="col s12">
            <center><h4 class="grey-text">SERVICIOS</h4></center>
        </div>
            <br>
        <div class="col s12 m4">
            <center><img src="{{asset('imagenes/i_1.png')}}" class="responsive-img" style="max-width: 50%;" alt="Autobuses"></center> 
        </div>
        <div class="col s12 m4">
            <center><img src="{{asset('imagenes/1_2.png')}}" class="responsive-img" style="max-width: 50%;" alt="Autobuses"></center> 
        </div>
        <div class="col s12 m4">
            <center><img src="{{asset('imagenes/1_3.png')}}" class="responsive-img" style="max-width: 50%;" alt="Autobuses"></center> 
        </div>
    </div>
@endsection

@section('scripts')
    <script>
      document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
  });
</script>
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
        var pasajeros = 1;
        var ninos = 0;
        var adultos = 1;
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

    @if (session('info'))
        <script>
            localStorage.clear();
            M.toast({
                html: '{{ session("info")}} ',
                classes: 'black',
                displayLength: 3000,
            })
            //alert('{{ session("info")}} ');
        </script>
    @endif

@endsection
