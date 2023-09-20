@extends('adminlte::page')

@section('title', 'Lubricaciones')
@section('css')
<style>
    .custom-card {
        background-color: rgb(100, 76, 47);
    }
    
    .center-vertically {
        vertical-align: middle !important;
    
    }
</style>
@stop

@section('content_header')
    <h6 style="text-align: center; font-size: 30px; color: #000000;
        background: -webkit-linear-gradient(rgb(1, 103, 71), rgb(239, 236, 217));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;">
        Lubricaciones
    </h6>
@stop



<!-- ... Código anterior ... -->

@section('content')
<div class="card custom-card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th rowspan="7">#</th>
                        <th rowspan="7">Equipo</th>
                        <th>P</th>
                        <!-- Aquí puedes agregar más encabezados si es necesario -->
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= 4; $i++)
                    <tr>
                        <td>{{ $i }}</td>
                        @if ($i === 1)
                        <td rowspan="7" class="center-vertically">Equipo{{ $i }}</td>
                        @endif
                        <td>P{{ $i }}</td>
                        @for ($j = 0; $j < 30; $j++)
                        <td>
                            @php
                            $colors = ['green', 'yellow', 'red', 'gray'];
                            $equipo = $i;
                            $P = "P" . $i;
                            $X = "X" . $j;
                            $colorIndex = rand(0, 3);
                            $color = $colors[$colorIndex];
                            @endphp
                            <button class="color-button" style="background-color: {{ $color }};">N</button>
                        </td>
                        @endfor
                    </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- ... otros elementos HTML ... -->

@endsection

<!-- ... Código de scripts JavaScript ... -->


<!-- ... Código de scripts JavaScript ... -->


@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const colorButton = document.querySelectorAll('.color-button');
        const colors = ['green', 'yellow', 'red', 'gray'];
        let currentIndex = 0;

        colorButton.forEach(button => {
            button.addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % colors.length;
                if (colors[currentIndex] === 'gray') {
                    button.style.backgroundColor = colors[currentIndex];
                    button.style.color = 'black'; // Cambiar color de texto para que sea legible en gris
                } else {
                    button.style.backgroundColor = colors[currentIndex];
                    button.style.color = 'white'; // Cambiar color de texto para que sea legible en otros colores
                }
            });
        });
    });
</script>
@endsection
