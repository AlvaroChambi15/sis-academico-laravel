@extends("layouts.template_admin")

@section("titulo", "Nueva Persona")

@section("contenido")

<form action="{{ route('persona.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-8">
            <div class="card">

                <div class="card-body">

                    <label for="">Ingrese Nombre</label>
                    <input type="text" name="nombres" class="form-control @error('nombres') is-invalid @enderror"
                        value="{{ old('nombres') }}">
                    @error('nombres')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="">Ingrese Apellido Paterno</label>
                    <input type="text" name="paterno" class="form-control @error('paterno') is-invalid @enderror"
                        value="{{ old('paterno') }}">
                    @error('paterno')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="">Ingrese Apellido Materno</label>
                    <input type="text" name="materno" class="form-control" value="{{ old('materno') }}">

                    <label for="">Ingrese CI</label>
                    <input type="text" name="ci" class="form-control @error('ci') is-invalid @enderror"
                        value="{{ old('ci') }}">
                    @error('ci')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <label for="">Ingrese Direccion</label>
                    <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}">

                    <label for="">Ingrese Teléfono</label>
                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">

                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary btn-block">GUARDAR PERSONA</button>
                    <button type="reset" class="btn btn-secondary btn-block">LIMPIAR DATOS</button>
                </div>
            </div>
        </div>
    </div>

</form>

@endsection