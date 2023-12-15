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
            <img src="{{asset('imagenes/icons8-asiento-96 - copia.png')}}" class="circle reponsive-img" style="max-height: 50px; border: 1px solid grey;"> 
        </div>
        <div class="col s4 m1">
            <span class="material-icons center"> east </span>
        </div>
        <div class="col s4 m1" >
            <img src="{{asset('imagenes/icons8-pago-100.png')}}" class="circle reponsive-img" style="max-height: 50px; border: 1px solid grey;"> 
        </div>
    </div></center>

    <div class="row container "> 
        <form class="col s12 m6" method="post" action="{{URL::secure('/itinerario/guardar')}}">
        @csrf
            <div class="row section" style="border: solid 1px black;">
                <div class="col s12"><b>Datos del cliente</b></div>
                <div class="col s12 container">
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input id="nombre" type="text" value="{{ old('nombre') }}" name="nombre" class="validate" required>
                            <label for="nombre">Nombre:</label>
                            <strong style="color: red;">@error('nombre') {{ $message }} @enderror</strong> 
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="apellidos" type="text" value="{{ old('apellidos') }}" name="apellidos" class="validate" required>
                            <label for="apellidos">Apellidos:</label>
                            <strong style="color: red;">@error('apellidos') {{ $message }} @enderror</strong> 
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="correo" name="correo" type="email" value="{{ old('correo') }}" class="validate" required
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingresa un correo electronico valido">
                            <label for="correo">Correo electronico:</label>
                            <strong style="color: red;">@error('correo') {{ $message }} @enderror</strong> 
                        </div>

                        <div class="input-field col m6 s12">
                            <input id="telefono" name="telefono" type="tel" value="{{ old('telefono') }}" class="validate" required
                            pattern="[0-9]{10,10}" title="El telefono debe contener una longitud de 10 digitos">
                            <label for="telefono">Telefono:</label>
                            <strong style="color: red;">@error('telefono') {{ $message }} @enderror</strong> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="row section" style="border: solid 1px black;">
                <div class="col s12"><b>Pasajeros</b></div>
                <input type="hidden" name="numPasajeros" value="{{session('ninos') + session('adultos')}}">
                @for ($i = 1; $i <=session('adultos'); $i++)
                    <div class="col s12 divider"></div>
                    <div class="row">
                        <div class="col s12"><h6 style="color: #2e7d32;"> PASAJERO {{$i}} - ADULTO </h6></div>
                        <div class="input-field col m6 s12">
                            <input id="nombre_{{$i}}" type="text" value="{{ old('nombre_$i') }}" name="nombre_{{$i}}" class="validate" required>
                            <label for="nombre_{{$i}}">Nombre:</label>
                            <strong style="color: red;">@error('nombre_$i') {{ $message }} @enderror</strong> 
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="apellidos_{{$i}}" type="text" value="{{ old('apellidos_$i') }}" name="apellidos_{{$i}}" class="validate" required>
                            <label for="apellidos_{{$i}}">Apellidos:</label>
                            <strong style="color: red;">@error('apellidos_$i') {{ $message }} @enderror</strong> 
                        </div>
                        <div class="col s1"></div>
                        <div class="input-field col s10">
                            <input type="text" name="costoA" id="" readonly value=" ">
                            <label for="costoA">Tipo de boleto:</label>
                        </div>
                        <div class="col s1"></div>
                        <div class="col s12">
                            <div class="row ">
                                <div class="col s1"></div>
                                <div class="col s10 grey"><b>Mayores de 18 años con identificacion</b></div>
                            
                            </div>
                            
                        </div>
                    </div>
                @endfor
                @for ($i=session('adultos') + 1; $i <=session('ninos') + session('adultos'); $i++)
                    <div class="col s12 divider"></div>
                    <div class="row">
                        <div class="col s12"><h6 style="color: #2e7d32;"> PASAJERO {{$i}} - NIÑO </h6></div>
                        <div class="input-field col m6 s12">
                            <input id="nombre_{{$i}}" type="text" value="{{ old('nombre_$i') }}" name="nombre_{{$i}}" class="validate" required>
                            <label for="nombre_{{$i}}">Nombre:</label>
                            <strong style="color: red;">@error('nombre_$i') {{ $message }} @enderror</strong> 
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="apellidos_{{$i}}" type="text" value="{{ old('apellidos_$i') }}" name="apellidos_{{$i}}" class="validate" required>
                            <label for="apellidos_{{$i}}">Apellidos:</label>
                            <strong style="color: red;">@error('apellidos_$i') {{ $message }} @enderror</strong> 
                        </div>
                        <div class="col s1"></div>
                        <div class="input-field col s10">
                            <input type="text" name="costoN" id="" readonly value=" ">
                            <label for="costoN">Tipo de boleto:</label>
                        </div>
                        <div class="col s1"></div>
                    </div>
                @endfor

            </div>
            <div class="col s12">
                <input type="submit" class="btn" value="Seleccionar Asientos ">
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
        console.log(localStorage.getItem('costo'));
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener el valor que deseas asignar
            var costo = localStorage.getItem('costo');
            var subtotal=0;
            // Seleccionar los campos por su atributo name
            var campos = document.querySelectorAll('input[name="costoA"]');
            var camposN = document.querySelectorAll('input[name="costoN"]');
            // Iterar sobre los campos y asignarles el mismo valor
            campos.forEach(function(campo) {
                campo.value = 'Adulto $'+costo;
                subtotal+=Number(costo);
            });
            camposN.forEach(function(camposN) {
                camposN.value = 'Niño $'+costo/2;
                subtotal+=Number(costo)/2;
            });
            var iva = subtotal *.16;
            var total = subtotal + iva;
            document.getElementById('salida').innerHTML = localStorage.getItem('salida')+':00 pm <br>' + '{{session("fecha")}}';
            document.getElementById('llegada').innerHTML = localStorage.getItem('llegada')+':00 am <br>' + '{{session("fecha_llegada")}}'; 
            document.getElementById('subtotal').innerHTML = '$'+ subtotal;
            document.getElementById('iva').innerHTML = '$'+iva;
            document.getElementById('total').innerHTML = 'TOTAL: $' + total;
            localStorage.setItem('subtotal', subtotal);
            localStorage.setItem('total', total);
            localStorage.setItem('iva', iva);
        });
    </script>
@endsection
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
            <img src="{{asset('imagenes/icons8-asiento-96 - copia.png')}}" class="circle reponsive-img" style="max-height: 50px; border: 1px solid grey;"> 
        </div>
        <div class="col s4 m1">
            <span class="material-icons center"> east </span>
        </div>
        <div class="col s4 m1" >
            <img src="{{asset('imagenes/icons8-pago-100.png')}}" class="circle reponsive-img" style="max-height: 50px; border: 1px solid grey;"> 
        </div>
    </div></center>

    <div class="row container "> 
        <form class="col s12 m6" method="post" action="{{route('almacenar')}}">
        @csrf
            <div class="row section" style="border: solid 1px black;">
                <div class="col s12"><b>Datos del cliente</b></div>
                <div class="col s12 container">
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input id="nombre" type="text" value="{{ old('nombre') }}" name="nombre" class="validate" required>
                            <label for="nombre">Nombre:</label>
                            <strong style="color: red;">@error('nombre') {{ $message }} @enderror</strong> 
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="apellidos" type="text" value="{{ old('apellidos') }}" name="apellidos" class="validate" required>
                            <label for="apellidos">Apellidos:</label>
                            <strong style="color: red;">@error('apellidos') {{ $message }} @enderror</strong> 
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="correo" name="correo" type="email" value="{{ old('correo') }}" class="validate" required
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingresa un correo electronico valido">
                            <label for="correo">Correo electronico:</label>
                            <strong style="color: red;">@error('correo') {{ $message }} @enderror</strong> 
                        </div>

                        <div class="input-field col m6 s12">
                            <input id="telefono" name="telefono" type="tel" value="{{ old('telefono') }}" class="validate" required
                            pattern="[0-9]{10,10}" title="El telefono debe contener una longitud de 10 digitos">
                            <label for="telefono">Telefono:</label>
                            <strong style="color: red;">@error('telefono') {{ $message }} @enderror</strong> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="row section" style="border: solid 1px black;">
                <div class="col s12"><b>Pasajeros</b></div>
                <input type="hidden" name="numPasajeros" value="{{session('ninos') + session('adultos')}}">
                @for ($i = 1; $i <=session('adultos'); $i++)
                    <div class="col s12 divider"></div>
                    <div class="row">
                        <div class="col s12"><h6 style="color: #2e7d32;"> PASAJERO {{$i}} - ADULTO </h6></div>
                        <div class="input-field col m6 s12">
                            <input id="nombre_{{$i}}" type="text" value="{{ old('nombre_$i') }}" name="nombre_{{$i}}" class="validate" required>
                            <label for="nombre_{{$i}}">Nombre:</label>
                            <strong style="color: red;">@error('nombre_$i') {{ $message }} @enderror</strong> 
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="apellidos_{{$i}}" type="text" value="{{ old('apellidos_$i') }}" name="apellidos_{{$i}}" class="validate" required>
                            <label for="apellidos_{{$i}}">Apellidos:</label>
                            <strong style="color: red;">@error('apellidos_$i') {{ $message }} @enderror</strong> 
                        </div>
                        <div class="col s1"></div>
                        <div class="input-field col s10">
                            <input type="text" name="costoA" id="" readonly value=" ">
                            <label for="costoA">Tipo de boleto:</label>
                        </div>
                        <div class="col s1"></div>
                        <div class="col s12">
                            <div class="row ">
                                <div class="col s1"></div>
                                <div class="col s10 grey"><b>Mayores de 18 años con identificacion</b></div>
                            
                            </div>
                            
                        </div>
                    </div>
                @endfor
                @for ($i=session('adultos') + 1; $i <=session('ninos') + session('adultos'); $i++)
                    <div class="col s12 divider"></div>
                    <div class="row">
                        <div class="col s12"><h6 style="color: #2e7d32;"> PASAJERO {{$i}} - NIÑO </h6></div>
                        <div class="input-field col m6 s12">
                            <input id="nombre_{{$i}}" type="text" value="{{ old('nombre_$i') }}" name="nombre_{{$i}}" class="validate" required>
                            <label for="nombre_{{$i}}">Nombre:</label>
                            <strong style="color: red;">@error('nombre_$i') {{ $message }} @enderror</strong> 
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="apellidos_{{$i}}" type="text" value="{{ old('apellidos_$i') }}" name="apellidos_{{$i}}" class="validate" required>
                            <label for="apellidos_{{$i}}">Apellidos:</label>
                            <strong style="color: red;">@error('apellidos_$i') {{ $message }} @enderror</strong> 
                        </div>
                        <div class="col s1"></div>
                        <div class="input-field col s10">
                            <input type="text" name="costoN" id="" readonly value=" ">
                            <label for="costoN">Tipo de boleto:</label>
                        </div>
                        <div class="col s1"></div>
                    </div>
                @endfor

            </div>
            <div class="col s12">
                <input type="submit" class="btn" value="Seleccionar Asientos ">
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
        console.log(localStorage.getItem('costo'));
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener el valor que deseas asignar
            var costo = localStorage.getItem('costo');
            var subtotal=0;
            // Seleccionar los campos por su atributo name
            var campos = document.querySelectorAll('input[name="costoA"]');
            var camposN = document.querySelectorAll('input[name="costoN"]');
            // Iterar sobre los campos y asignarles el mismo valor
            campos.forEach(function(campo) {
                campo.value = 'Adulto $'+costo;
                subtotal+=Number(costo);
            });
            camposN.forEach(function(camposN) {
                camposN.value = 'Niño $'+costo/2;
                subtotal+=Number(costo)/2;
            });
            var iva = subtotal *.16;
            var total = subtotal + iva;
            document.getElementById('salida').innerHTML = localStorage.getItem('salida')+':00 pm <br>' + '{{session("fecha")}}';
            document.getElementById('llegada').innerHTML = localStorage.getItem('llegada')+':00 am <br>' + '{{session("fecha_llegada")}}'; 
            document.getElementById('subtotal').innerHTML = '$'+ subtotal;
            document.getElementById('iva').innerHTML = '$'+iva;
            document.getElementById('total').innerHTML = 'TOTAL: $' + total;
            localStorage.setItem('subtotal', subtotal);
            localStorage.setItem('total', total);
            localStorage.setItem('iva', iva);
        });
    </script>
@endsection
