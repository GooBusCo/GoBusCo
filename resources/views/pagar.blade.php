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
            <img src="{{asset('imagenes/icons8-pago-100.png')}}" class="circle reponsive-img green" style="max-height: 50px; border: 1px solid grey;"> 
        </div>
    </div></center>

    <form class="row container" method="post" action="{{route('pagar')}}"> 
        @csrf
        <input type="hidden" name="salida" id="salida" readonly required>
        <input type="hidden" name="llegada" id="llegada" readonly required>
        <input type="hidden" name="duracion" id="duracion" readonly required>
        <input type="hidden" name="chofer" id="chofer" readonly required>
        <input type="hidden" name="costo" id="costo" readonly required>
        <div class="col s12 m6">
            <div class="row section" style="border: solid 1px black;">
                <div class="col s12"><b>Datos del cliente</b></div>
                <div class="col s12 container">
                    <div class="row">
                        <div class="input-field col m6 s12">
                            <input id="nombre" type="text" value="{{ session('c_nombre') }}" name="nombre" class="validate" required>
                            <label for="nombre">Nombre:</label>
                            <strong style="color: red;">@error('nombre') {{ $message }} @enderror</strong> 
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="apellidos" type="text" value="{{ session('c_apellidos') }}" name="apellidos" class="validate" required>
                            <label for="apellidos">Apellidos:</label>
                            <strong style="color: red;">@error('apellidos') {{ $message }} @enderror</strong> 
                        </div>
                        <div class="input-field col s12">
                            <input id="direccion" name="direccion" type="text" value="{{ old('direccion') }}" class="validate"  
                            title="Ingresa una direccion valida" required>
                            <label for="direccion">Direccion:</label>
                            <strong style="color: red;">@error('direccion') {{ $message }} @enderror</strong> 
                        </div>
                        <div class="input-field col m6 s12">
                            <input id="cp" name="cp" type="text" value="{{ old('cp') }}" class="validate" pattern="[0-9]{5}" 
                            title="Ingresa un codigo postal valido" required>
                            <label for="cp">Codigo postal:</label>
                            <strong style="color: red;">@error('cp') {{ $message }} @enderror</strong> 
                        </div>

                        <div class="input-field col m6 s12">
                            <input id="pais" name="pais" type="text" value="{{ old('municipio') }}" class="validate" pattern="p{L}+[a-zA-Z]+" 
                            title="Ingresa un municipio valido" required>
                            <label for="pais">Pais:</label>
                            <strong style="color: red;">@error('pais') {{ $message }} @enderror</strong> 
                        </div>
                        
                        <div class="input-field col m6 s12">
                            <input id="estado" name="estado" type="text" value="{{ old('estado') }}" class="validate" pattern="p{L}+[a-zA-Z]+" 
                            title="Ingresa un esatado valido" required>
                            <label for="estado">Estado:</label>
                            <strong style="color: red;">@error('estado') {{ $message }} @enderror</strong> 
                        </div>

                        <div class="input-field col m6 s12">
                            <input id="ciudad" name="ciudad" type="text" value="{{ old('ciudad') }}" class="validate" pattern="p{L}+[a-zA-Z]+" 
                            title="Ingresa una ciudad valida" required>
                            <label for="pais">Ciudad:</label>
                            <strong style="color: red;">@error('ciudad') {{ $message }} @enderror</strong> 
                        </div>

                        <div class="input-field col m6 s12">
                            <input id="correo" name="correo" type="email" value="{{ session('c_correo') }}" class="validate" required
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Ingresa un correo electronico valido">
                            <label for="correo">Correo electronico:</label>
                            <strong style="color: red;">@error('correo') {{ $message }} @enderror</strong> 
                        </div>

                        <div class="input-field col m6 s12">
                            <input id="telefono" name="telefono" type="tel" value="{{ session('c_telefono') }}" class="validate" required
                            pattern="[0-9]{10,10}" title="El telefono debe contener una longitud de 10 digitos">
                            <label for="telefono">Telefono:</label>
                            <strong style="color: red;">@error('telefono') {{ $message }} @enderror</strong> 
                        </div>
                        <div class="col s12">
                            <label for="remember_me">
                            <input id="remember_me" name="remember" type="checkbox" class="filled-in">
                                <span>Nombre del comprador y titular de la targeta son los mismos</span> 
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s0 m1"></div>
        <div class="col s12 m5">
        <div class="row " style="border: solid 1px black;">
            <div class="col s12"><b>Itinerario de noche</b></div>
                <div class="col s12 divider"></div>
                <div class="col s12">
                    <div class="row">
                        <div class="col s6">{{session('origen');}}</div>
                        <div class="col s6"><span style="color:#2e7d32" id="salidaV"></span></div>
                        <div class="col s6"><span class="material-icons center">arrow_downward</span></div>
                        <div class="col s6" style="height: 30px;"> </div><br>
                        <div class="col s6">{{session('destino');}}</div>
                        <div class="col s6"><span style="color:#2e7d32" id="llegadaV"></span></div>
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
        <div class="col s12">
            <div class="row section" style="border: grey solid 2px;">
                <div class="col s12">
                    <b>Boleto ida</b>
                </div>
                @for ($i = 1; $i <=session('adultos'); $i++)
                    <div class="col s12 divider"></div>
                    <div class="col s12">
                        <div class="row">
                            <div class="col s4" style="color: #2e7d32;">Pasajero {{$i}}</div>
                            <div class="col s4" style="color: #2e7d32;">Adulto</div>
                            <div class="col s4" style="color: #2e7d32;">Asiento: {{session('asiento_'.$i)}}</div>
                            <div class="col s12"><b>{{session('nombre_'.$i).' '.session('apellidos_'.$i)}}</b></div>
                        </div>
                    </div>
                    <input type="hidden" name="ty_{{$i}}" id="ty_{{$i}}" value="adulto" readonly required>
                @endfor
                @for ($i=session('adultos') + 1; $i <=session('ninos') + session('adultos'); $i++)
                    <div class="col s12 divider"></div>
                    <div class="col s12">
                        <div class="row">
                            <div class="col s4" style="color: #2e7d32;">Pasajero {{$i}}</div>
                            <div class="col s4" style="color: #2e7d32;">Niño</div>
                            <div class="col s4" style="color: #2e7d32;">Asiento: {{session('asiento_'.$i)}}</div>
                            <div class="col s12"><b>{{session('nombre_'.$i).' '.session('apellidos_'.$i)}}</b></div>
                        </div>
                    </div>
                    <input type="hidden" name="ty_{{$i}}" id="ty_{{$i}}" value="niño" readonly required>
                @endfor
            </div>
        </div>
        <div class="col s12 m4"></div>
        <div class="col s12 m4" style="border: solid 2px grey;">
            <div class="row">
                <div class="col s12 input-field">
                    <input type="text" id="numero_tarjeta" name="numero_tarjeta" class="validate" pattern="[0-9]{16}" 
                    title="El número de tarjeta debe contener 16 dígitos" required>
                    <label for="numero_tarjeta">Número de tarjeta:</label>
                </div>
                <div class="col s12 input-field">
                    <input type="text" id="fecha_vencimiento" name="fecha_vencimiento" 
                    placeholder="MM/AA" pattern="(0[1-9]|1[0-2])\/([0-9]{2})" class="validate" title="Formato válido: MM/AA" required>
                    <label for="fecha_vencimiento">Fecha de vencimiento:</label>
                </div>
                <div class="col s12 input-field">
                    <input type="text" id="ccv" name="ccv" pattern="[0-9]{3}" class="validate" title="El CCV debe contener 3 dígitos" required>
                    <label for="ccv">CCV:</label>
                </div>
                <div class="col s12">
                    <center><input type="submit" class="btn" value="Pagar"></center> 
                </div>
            </div>
        </div>
    </form>

@endsection

@section('scripts')
<script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener el valor que deseas asignar
            var subtotal=localStorage.getItem('subtotal');
            var iva = localStorage.getItem('iva');
            var total = localStorage.getItem('total');
            document.getElementById('salidaV').innerHTML = localStorage.getItem('salida')+':00 pm <br>' + '{{session("fecha")}}';
            document.getElementById('llegadaV').innerHTML = localStorage.getItem('llegada')+':00 am <br>' + '{{session("fecha_llegada")}}'; 
            document.getElementById('subtotal').innerHTML = '$'+ subtotal;
            document.getElementById('iva').innerHTML = '$'+iva;
            document.getElementById('total').innerHTML = 'TOTAL: $' + total;

            document.getElementById('salida').value = localStorage.getItem('salida');
            document.getElementById('llegada').value = localStorage.getItem('llegada');
            document.getElementById('duracion').value = localStorage.getItem('duracion');
            document.getElementById('chofer').value = localStorage.getItem('chofer');
            document.getElementById('chofer').value = localStorage.getItem('chofer');
            document.getElementById('costo').value = localStorage.getItem('costo');
        });
    </script>
@endsection
