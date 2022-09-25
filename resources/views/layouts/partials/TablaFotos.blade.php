<div class="table-responsive">
    <table class="table table-responsive table-sm table-dark table-striped table-bordered table-hover">
          @foreach($fotosTodos as $foto)
                                  
            <tbody>
                <tr>
                <td>{{ $foto->nombreFoto}}</td>
                <td><img src="..{{ $foto->rutaFoto}}" width="200" height="200"></td>
                </tr>
            </tbody>
        @endforeach
            
    </table>
</div>