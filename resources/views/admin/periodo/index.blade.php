@extends("layouts.template_admin")

@section("titulo", "Gestión Periodo")

@section("contenido")

<div class="row">
    <div class="col-md-12">
        <!-- MODAL -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Nuevo Periodo
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('periodo.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="">Ingrese Nombre:</label>
                            <input type="text" name="nombre" class="form-control">

                            <label for="">Ingrese Duracion:</label>
                            <input type="number" name="duracion" class="form-control">

                            <label for="">Ingrese Gestion:</label>
                            <input type="number" name="gestion" class="form-control">

                            <label for="">Ingrese Descripcion:</label>
                            <input type="text" name="descripcion" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar Periodo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END MODAL -->
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>DURACION</th>
                            <th>GESTION</th>
                        </tr>
                    </thead>
                    @foreach ($lista_periodos as $periodo)
                    <tbody>
                        <tr>
                            <td>{{ $periodo->id }}</td>
                            <td>{{ $periodo->nombre }}</td>
                            <td>{{ $periodo->duracion }}</td>
                            <td>{{ $periodo->gestion }}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@endsection