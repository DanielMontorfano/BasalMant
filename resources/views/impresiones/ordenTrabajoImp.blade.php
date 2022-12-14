<h1>O.d.T-{{$ot->id}}</h1>
<table>
    <tr>
        <td>Solicitante: {{$ot->solicitante}}</td>
        <td>Sector:{{$equipo->idSecc}}/{{$equipo->idSubSecc}}</td>
    </tr>
    <tr>
        <td>Prioridad:{{$ot->prioridad}}</td>
        <td>Pedido Fecha/Hora:{{$ot->created_at}}</td>
    </tr>
    <tr>
        <td>Fecha necesidad:{{$ot->fechaNecesidad}}</td>
        <td>Fecha entrega:{{$ot->fechaEntrega}}</td>
    </tr>
    <tr>
        <td>Trabajo asignado a:{{$ot->asignadoA}}</td>
       
    </tr>
</table>