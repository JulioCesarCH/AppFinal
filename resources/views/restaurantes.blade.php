@extends("layouts.appnavega")
@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">  
                <h3>Registro de Restaurantes</h3>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrargastro"><i class="bi bi-file-earmark-plus"></i> Nuevo</button>
                </div> 
                <br>
                <table id="gastro" class="table table-light table-hover">
                    <caption>Restaurantes</caption>
                    <thead class="table-dark">
                        <tr>
                            <th>id</th>
                            <th>nombre</th>
                            <th>ubicacion</th>
                            <th>mesa</th>
                            <th>capacidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resultados as $gastro)
                            <tr>
                            <td>{{$gastro->id}}</td>
                            <td>{{$gastro->nombre}}</td>
                            <td>{{$gastro->ubicacion}}</td>
                            <td>{{$gastro->numero}}</td>
                            <td>{{$gastro->capacidad}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section("scripts")
    <script>
        $(document).ready(function () {
        $('#gastro').DataTable();
        });
    </script>  
@endsection