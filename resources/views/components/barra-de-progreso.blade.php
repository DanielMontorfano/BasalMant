<div class="progress" style="border-radius: 10px; overflow: hidden; background: #161615;">
    <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%; 
    border-radius: 10px; /* Añade bordes redondeados a la barra de progreso */
    border: 1px solid #000; 
    @if($percentage < 20)
        background-color: #ac0707; /* Rojo */
    @elseif($percentage >= 20 && $percentage <= 80)
        background-color: #f1be05; /* Amarillo */
    @else
        background-color: #4caf50; /* Verde */
    @endif
    font-size: 0.8em;" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">{{ $percentage }}%</div>
</div>

