<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>

    <style>
        body{
            /* font-family: 'Courier New', Courier, monospace; */
            font-family: 'Nunito', sans-serif;
        }

        .informacion-proyecto{
            width: 100%;
        }
        
        .informacion-proyecto table{
            font-size: 12px

        }


        .contenedor{
            width: 100%;
            height: auto;
            /* border: 1px solid #333; */
            padding: 2px;
            margin-top: 10px;
        }

        table thead{
            font-size: 12px;
        }

        table tbody{
            font-size: 10px
        }


        h1{
            color: red;
        }
    </style>

    
</head>
<body>
    <div>
        {{-- <img src="{{ asset('http://127.0.0.1:8000/public/images/gorelogo.jpg') }}" alt="" width="35px"> --}}
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/gorelogo.jpg'))) }}" width="45px" style="margin-bottom: 10px;">
        {{-- <img src="'.public_path() .'/images/gorelogo.jpg" width="35px"> --}}
        {{-- <img src="data:image/png;base64,'.base64_encode(file_get_contents($logoUrl))'" width="35px"> --}}
        {{-- <img src="{{url('img/gorelogo.jpg')}}" width="50px"> --}}
        {{-- <img src="{{URL::asset('img/gorelogo.jpg')}}" width="50px"> --}}
    </div>
    <div class="informacion-proyecto">
        <div>
            <p style="font-weight: bold;">Información del proyecto</p>
        </div>
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="font-weight: bold;">INSTITUCIÓN</td>
                    <td style="font-weight: bold; padding-left: 10px;">PROYECTO</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr style="padding-bottom: 15px;">
                    <td>{{ $datos['proyecto']->institucion }}</td>
                    <td style="padding-left: 10px;">{{ $datos['proyecto']->proyecto }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                
                <tr>
                    <td style="font-weight: bold;">RUT</td>
                    <td style="font-weight: bold; padding-left: 10px;">MONTO</td>
                    <td style="font-weight: bold; padding-left: 10px;">MONTO POR RENDIR</td>
                    <td style="font-weight: bold; padding-left: 10px;">ESTADO</td>
                    <td style="font-weight: bold; padding-left: 10px;">DURACIÓN</td>
                </tr>
                <tr>
                    <td>{{ $datos['proyecto']->rut }}</td>
                    <td style="padding-left: 10px;">{{ formatear_numero($datos['proyecto']->monto) }}</td>
                    @if($datos['montoFaltante'] == 0)
                    <td style="padding-left: 10px; color: green">{{ formatear_numero($datos['montoFaltante']) }}</td>
                    @else
                    <td style="padding-left: 10px; color: red">{{ formatear_numero($datos['montoFaltante']) }}</td>
                    @endif
                    <td style="padding-left: 10px;">{{ $datos['proyecto']->estado }}</td>
                    <td style="padding-left: 10px;">{{ $datos['proyecto']->duracion }} meses</td>
                </tr>
            </tbody>
        </table>





    </div>
    
    <div class="contenedor">
        <div>
            <p style="font-weight: bold;">Tabla de rendiciones</p>
        </div>
        <table style="width: 100%; border-collapse: collapse; border: 1px solid #ddd; border-radius: 10px">
            <thead>
                <tr>
                    <th style="padding: 8px; text-align: left; background-color: #f7f7f7; font-weight: bold; border: 1px solid #ddd;">analista</th>
                    <th style="padding: 8px; text-align: left; background-color: #f7f7f7; font-weight: bold; border: 1px solid #ddd;">n° rendición</th>
                    <th style="padding: 8px; text-align: left; background-color: #f7f7f7; font-weight: bold; border: 1px solid #ddd;">fecha de ingreso</th>
                    <th style="padding: 8px; text-align: left; background-color: #f7f7f7; font-weight: bold; border: 1px solid #ddd;">fecha de cierre</th>
                    <th style="padding: 8px; text-align: left; background-color: #f7f7f7; font-weight: bold; border: 1px solid #ddd;">días</th>
                    <th style="padding: 8px; text-align: left; background-color: #f7f7f7; font-weight: bold; border: 1px solid #ddd;">monto rendido</th>
                    <th style="padding: 8px; text-align: left; background-color: #f7f7f7; font-weight: bold; border: 1px solid #ddd;">monto aprobado</th>
                    <th style="padding: 8px; text-align: left; background-color: #f7f7f7; font-weight: bold; border: 1px solid #ddd;">monto observado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datos['rendiciones'] as $rendicion)
                <tr>
                    <td style="padding: 8px; border: 1px solid #ddd; text-align: left;"># {{ $rendicion->numero_de_rendicion }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd; text-align: left;">{{ $rendicion->analista }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd; text-align: left;">{{ $rendicion->fecha_de_ingreso }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd; text-align: left;">{{ $rendicion->fecha_de_cierre }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd; text-align: center;">{{ $rendicion->dias }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd; text-align: left;">$ {{ formatear_numero($rendicion->monto_rendido) }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd; text-align: left;">$ {{ formatear_numero($rendicion->monto_aprobado) }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd; text-align: left;">$ {{ formatear_numero($rendicion->monto_observado) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>

    {{-- {{ $datos['titulo'] }} --}}



</body>
</html>