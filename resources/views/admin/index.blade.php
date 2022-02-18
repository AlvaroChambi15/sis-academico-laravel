@extends("layouts.template_admin")

@section('titulo', 'Administracion')



@section("contenido")

<div class="row">
    <div class="col-lg-12">

        <div class="card card-primary card-outline">
            <div class="card-body">
                <h1>ADMINISTRACION</h1>

                @include("admin.prueba")
            </div>
        </div><!-- /.card -->
    </div>

</div>
<!-- /.row -->

@endsection