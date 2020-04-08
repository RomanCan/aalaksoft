@extends('layouts.masteradministrador')
@section('contenido')
    
    <section id="registro">
        <h1 align="center">Registro de ventas</h1><br>
        <!-- row -->
        <div class="row" align="center">
            <!-- col -->
            <div class="col-md-7 col-sm-12 col-xs-12">
                <h3>Detalles de venta</h3>
                <table class="table table-hover table-sm table-striped table-borderless" >
                    <thead class="text-center thead-dark">
                        <th class="align-middle">Folio de la venta</th>
                        <th class="align-middle">Nombre del articulo</th>
                        <th class="align-middle">Articulos vendidos</th>
                        <th class="align-middle">Precio de articulo(Pz)</th>
                    </thead>
                    <tbody>
                        <tr v-for="d in detalles" class="text-center">
                            <td>@{{d.folio}}</td>
                            <td>@{{d.articulo.nombre}}</td>
                            <td>@{{d.cantidad}}</td>
                            <td>$ @{{d.precio}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- fin col -->
            <!-- col -->
            <div class="col-md-5 col-sm-12 col-xs-12 table-responsive" >
                <h3>Ventas</h3>
                <table class="table table-hover table-sm table-striped table-borderless">
                    <thead class="text-center thead-dark">
                        <th class="align-middle">Folio de la venta</th>
                        <th class="align-middle">Fecha de venta</th>
                        <th class="align-middle">Ingreso total</th>
                    </thead>
                    <tbody>
                        <tr v-for="v in ventas" class="text-center">
                            <td>@{{v.folio}}</td>
                            <td>@{{v.created_at}}</td>
                            <td>$ @{{v.total}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- fin col -->
        </div>
        <!-- fin row -->
    </section>
@endsection
@push('scripts')
    <script src="js/admin/registro.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">