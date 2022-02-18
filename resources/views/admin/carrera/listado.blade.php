@extends("layouts.template_admin")

@section("titulo", "Gestión Carreras y Materias")

@section("contenido")


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Nueva Carrera
                </button>
                <br>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nueva Carrera</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('carrera.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <label for="">Ingrese el nombre de la Carrera:</label>
                                    <input type="text" name="nombre" class="form-control">

                                    <label for="">Ingrese el Número de Semestres:</label>
                                    <input type="number" name="nro_semestres" class="form-control">

                                    <label for="">Ingrese Detalles:</label>
                                    <textarea name="detalle" class="form-control"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">CANCELAR</button>
                                    <button type="submit" class="btn btn-primary">GUARDAR CARRERA</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>NRO SEMESTRES</th>
                            <th>MATERIAS</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lista_carreras as $carrera)
                        <tr>
                            <td>{{ $carrera->id }}</td>
                            <td>{{ $carrera->nombre }}</td>
                            <td>{{ $carrera->nro_semestres }}</td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-success" data-toggle="modal"
                                    data-target="#Modal{{$carrera->id}}" onclick="listarMaterias('{{$carrera->id}}')">
                                    Ver Materias
                                </button>

                                <!-- Modal -->
                                <div class="modal dialog-scrollable fade" id="Modal{{$carrera->id}}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Materias de la Carrera de
                                                    {{ $carrera->nombre }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="{{ route('materia.store') }}" method="POST">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="">Ingrese el nombre Materia:</label>
                                                                    <input type="text" name="nombre"
                                                                        id="nombre_mat{{$carrera->id}}"
                                                                        class="form-control" required>

                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label for="">Sigla:</label>
                                                                    <input type="text" name="sigla"
                                                                        id="sigla_mat{{$carrera->id}}"
                                                                        class="form-control" required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="">Semestre:</label>
                                                                    <select name="semestre" class="form-control"
                                                                        id="semestre_mat{{$carrera->id}}" required>
                                                                        @php
                                                                        for($i=1; $i<= $carrera->nro_semestres; $i++){
                                                                            @endphp
                                                                            <option value="{{$i}}">{{$i}} SEMESTRE
                                                                            </option>
                                                                            @php
                                                                            }
                                                                            @endphp
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label for="">Ingrese
                                                                        Descripción:</label>
                                                                    <textarea name="descripcion"
                                                                        id="descripcion_mat{{$carrera->id}}"
                                                                        class="form-control"></textarea>
                                                                    <input type="hidden" value="{{ $carrera->id }}"
                                                                        name="carrera_id">
                                                                </div>

                                                                <input type="submit" value="GUARDAR MATERIA"
                                                                    class="btn btn-info">

                                                                <button type="button" class="btn btn-warning"
                                                                    onclick="guardarMateria('{{ $carrera->id }}')">GUARDAR
                                                                    MATERIA CON
                                                                    JS</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <table class="table table-striped table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <td>NOMBRE</td>
                                                                    <td>SIGLA</td>
                                                                    <td>SEMESTRE</td>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="id_table_materias{{$carrera->id}}">

                                                            </tbody>
                                                        </table>
                                                        <span id="cargando{{ $carrera->id }}"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="col-md-12">

    </div>
</div>

@endsection

@section("js")
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    //listarMaterias(1);
    //document.getElementById("cargando").innerHTML = "<h1>Cargando...</h1>";

    async function guardarMateria(carrera_id) {

    document.getElementById("cargando"+carrera_id).innerHTML = "<h3>Guardando...</h3>";

    var carrera_id = carrera_id
    var nombre = document.getElementById("nombre_mat" + carrera_id).value;

    var sigla = document.getElementById("sigla_mat" + carrera_id).value;
    var descripcion = document.getElementById("descripcion_mat" + carrera_id).value;
    var semestre = document.getElementById("semestre_mat" + carrera_id).value;

    let obj = {
        carrera_id: carrera_id,
        nombre: nombre,
        sigla: sigla,
        descripcion: descripcion,
        semestre: semestre
    }

    //  PETICION AJAX CON AXIOS
    const {
        data
    } = await axios.post("/admin/materia", obj);
    if (data) {
        listarMaterias(carrera_id);
        document.getElementById("cargando"+carrera_id).innerHTML = "<h3>Cargando...</h2>";
    }
}

async function listarMaterias(carrera_id) {
    document.getElementById("cargando"+carrera_id).innerHTML = "<h3>Cargando...</h3>";

    const {data} = await axios.get("/admin/carrera/" + carrera_id);
    var html = ``;
    for (let i = 0; i < data.length; i++) {
        const materia = data[i];
        html += `
        <tr>
            <td>${materia.nombre}</td>
            <td>${materia.sigla}</td>
            <td>${materia.semestre}</td>
        </tr>
        `;
    }
    document.getElementById("id_table_materias" + carrera_id).innerHTML = html;
    document.getElementById("cargando"+carrera_id).innerHTML = "";
}
</script>

@endsection