@props(['avisos', 'expanded', 'usuario'])

<div class="notification-panel {{ $expanded ? 'expanded' : '' }}" id="notificationPanel">
    <div class="notification-header">
        <i class="fas fa-exclamation-circle" style="margin-right: 10px;"></i> <!-- Icono de advertencia -->
        Recordatorios para {{ $usuario->name }}
        <button class="minimize-button" onclick="togglePanel()">-</button>
    </div>
    
    <div class="notification-content">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mensaje</th>
                    <th>Acción</th>
                    <th>Fecha de Creación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($avisos as $aviso)
                <tr>
                    <td>{{ $aviso->id }}</td>
                    <td>{{ $aviso->mensaje1 }}</td>
                    <td>
                        @if($aviso->mensaje3 !== null && $aviso->mensaje2 === 'OdT')
                            <a href="{{ route('ordentrabajo.show', $aviso->mensaje3) }}"> Ver </a>
                        @elseif($aviso->mensaje3 !== null && ($aviso->mensaje2 === 'plan' || $aviso->mensaje2 === 'repuesto'))
                            <a href="{{ route('equipos.show', $aviso->mensaje3) }}"> Ver </a>
                        @else
                            {{ $aviso->mensaje3 }}
                        @endif
                    </td>
                    
                    <td>{{ $aviso->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
.notification-panel {
    position: fixed;
    bottom: 20px; /* Ajusta según tu diseño */
    right: 300px; /* Ajusta según tu diseño */
    width: 700px; /* Ajusta según tu diseño */
    background: linear-gradient(to right, rgb(231, 140, 3), orange, yellow); /* Gradiente de fondo */
    border: 1px solid #b11010;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
    z-index: 1000; /* Asegura que esté por encima del resto del contenido */
    color: white; /* Color del texto */
    border-radius: 10px; /* Agrega bordes redondeados */
    overflow: hidden; /* Oculta el contenido que se salga de los bordes */
}

.notification-panel.expanded {
    height: auto; /* ajusta la altura automáticamente */
}

.notification-panel.expanded .notification-content {
    display: block;
    max-height: 500px; /* ajusta el tamaño máximo deseado */
    overflow-y: auto; /* añade una barra de desplazamiento vertical si el contenido es demasiado grande */
}

.notification-header {
    background: linear-gradient(to left, rgb(16, 164, 88), rgb(0, 13, 10), rgb(7, 7, 7)); /* Gradiente de fondo */
    padding: 10px;
    cursor: pointer;
    border-bottom: 1px solid rgba(255, 255, 255, 0.2); /* Borde inferior suave */
    color: white; /* Color del texto */
}

.notification-content {
    background: linear-gradient(to bottom, #485848, #181d17); /* Gradiente sutil */
    padding: 10px;
    display: none;
    color: rgb(226, 248, 205); /* Color del texto */
}

.minimize-button {
    float: right;
    background: linear-gradient(to bottom, #fff75f, #555102); /* Gradiente de fondo */
    border: none;
    color: white;
    cursor: pointer;
    font-size: 20px;
    margin-right: 10px;
    border-radius: 50%; /* Forma circular */
    width: 30px;
    height: 30px;
    text-align: center;
    line-height: 30px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.minimize-button:hover {
    background: linear-gradient(to bottom, #8dd364, #1c2e1c); /* Gradiente invertido en hover */
    transform: scale(1.1); /* Efecto de agrandamiento */
}

.minimize-button:focus {
    outline: none;
}
</style>

<script>
function togglePanel() {
    const panel = document.getElementById('notificationPanel');
    panel.classList.toggle('expanded');
}
</script>
