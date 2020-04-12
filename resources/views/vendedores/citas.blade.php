@extends('layouts.mastervend')
@section('contenido')
<section id="citas">
    <h1 align="center">Citas</h1><hr>
    <div class="row">
        <div class="col-md-10 col-sm-10 col-xs-12 table-responsive container">
            <table class="table table-striped table-borderless table-hover table-sm">
                <thead class="thead-dark">
                    <th>Propietario</th>
                    <th>Mascota</th>
                    <th>Fecha de cita</th>
                    <th>Descripcion</th>
                </thead>
                <tbody>
                    <tr v-for="c in citas">
                        <td>@{{c.propietario.nombre}}</td>
                        <td>@{{c.mascota.nombre}}</td>
                        <td>@{{c.fecha_cita}}</td>
                        <td>@{{c.descripcion}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
@push('scripts')
   <script src="js/vendedor/cita.js"></script>
   <script src="js/validacion.js"></script>
   <!-- <script type="text/javascript" src="js/vue-resource.js"></script> -->

@endpush
<input type="hidden" name="route" value="{{url('/')}}">
