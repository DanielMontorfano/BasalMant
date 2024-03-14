















<h1>O.d.T-{{$ot->id}}</h1>
<table>
    <tr>
        <td>Esta orden está: {{$ot->estado}}</td>
        <td></td>
    </tr>
    <tr>
        <td>Solicitante: {{$ot->solicitante}}</td>
        <td>Sector: {{$equipo->idSecc}}/{{$equipo->idSubSecc}}</td>
    </tr>
    <tr>
        <td>Prioridad:{{$ot->prioridad}}</td>
        <td>Pedido Fecha/Hora:{{$ot->created_at}}</td>
    </tr>
    <tr>
        <td>Trabajo asignado a:{{$ot->asignadoA}}</td>
        <td>Fecha necesidad:{{$ot->fechaNecesidad}}</td>
    </tr>
    
    
    <tr>
        <td>Descripcion del pedido:</td>
        <td>{{$ot->det1}}</td>
    </tr>
    <tr>
        <td>Descripcion del trabajo realizado:</td>
        <td>{{$ot->det2}}</td>
    </tr>
    <tr>
        <td>Detalle incompleto:</td>
        <td>{{$ot->det3}}</td>
    </tr>
    <tr>
        <td>Realizada por:{{$ot->realizadoPor}}</td>
        <td>Fecha entrega:{{$ot->fechaEntrega}}</td>
        
    </tr>

    <tr>
        <td>Aprobada por:{{$ot->aprobadoPor}}</td>
        <td>Fecha cierre:{{$ot->updated_at}}</td>
    </tr>
</table>