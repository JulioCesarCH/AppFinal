@extends("layouts.appnavega")
@section("content")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">  
                <h3>Registro de reservas</h3>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrarservicio"><i class="bi bi-file-earmark-plus"></i> Nuevo</button>
                </div> 

                <br>
                <table id="servicios" class="table table-light table-hover">
                    <caption>Servicios Turisticos</caption>
                    <thead class="table-dark">
                        <tr>
                            <th>Id Reserva</th>
                            <th>fecha</th>
                            <th>servicio</th>
                            <th>num_personas</th>
                            <th>estado</th>
                            <th>restaurante</th>
                            <th>cliente</th>
                            <th>mesa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resultados as $serviciot)
                            <tr>
                            <td>
                               <img src="{{$serviciot->imagen}}" width="50" height="60" class="img img-responsive"/>
                            </td>
                            <td>{{$serviciot->num_reserva}}</td>
                            <td>{{$serviciot->fecha}}</td>
                            <td>{{$serviciot->servicio}}</td>
                            <td>{{$serviciot->num_personas}}</td>
                            <td>{{$serviciot->restaurante}}</td>
                            <td>{{$serviciot->cliente}}</td>
                            <td>{{$serviciot->mesa}}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  <!-- Modal -->
  <div class="modal fade" id="registrarservicio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo Registro</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>             
          <form action="/reservas/guardar" method="post" enctype="multipart/form-data">
             <div class="modal-body">
              <h5>Registre los datos de Reserva</h5>
              <br>
              @csrf
                <label for="exampleFormControl1" class="form-label">Seleccione Restaurante</label>
                <select class="form-select" name="restaurante_id">
                    @foreach ($resultados2 as $restaurante)
                        <option value={{$restaurante->id}}>{{$restaurante->nombre}}</option>;
                    @endforeach
                </select>
                <label for="exampleFormControl1" class="form-label">Seleccione Cliente</label>
                <select class="form-select" name="cliente_id">
                    @foreach ($resultados4 as $cliente)
                        <option value={{$cliente->id}}>{{$cliente->nombre}}</option>;
                    @endforeach
                </select>
                <label for="exampleFormControl1" class="form-label">Seleccione Mesa</label>
                <select class="form-select" name="mesa_id">
                    @foreach ($resultados3 as $mesa)
                        <option value={{$mesa->id}}>{{$mesa->numero}}</option>;
                    @endforeach
                </select>
                Fecha: <input class="form-control" type="date" name="fecha" required><br>           
                servicio: <input class="form-control" type="text" name="servicio" required><br>           
                personas: <input class="form-control" type="number" name="num_personas" required><br>
                <label for="exampleFormControl1" class="form-label">Seleccione Estado</label>
                <select class="form-select" name="estado">
                        <option>pendiente</option>;
                        <option>en servicio</option>;
                        <option>cancelado</option>;
                        <option>servido</option>;
                        <option>no presentado</option>;
                </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
      </div>
    </div>
</div>

@endsection

@section("scripts")
    <script>
        $(document).ready(function () {
        $('#servicios').DataTable();
        });
    </script>  
@endsection