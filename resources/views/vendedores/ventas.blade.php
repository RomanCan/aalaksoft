@extends('layouts.mastervend')
@section('contenido')
	<div class="d-none">
		@{{id_usuario="{!!Session::get('id_usuario')!!}"}}
	</div>

	<div id="ventas">
	<br>
	<h1 class="container" align="center">Ventas</h1>
		<h3 style="margin:20px 20px">Folio: @{{folio}}</h3>
		<h3 style="margin:20px 20px">Fecha: @{{fecha}}</h3>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-xs-8">
				<div class="input-group responsive">
					<input type="text" class="form-control" v-model="codigo" ref="buscar" v-on:keyup.enter="getProducto()">
					<span class="input-group-btn">
						<button type="button" class="btn btn-primary" @click="getProducto()">Agregar</button>
					</span>
				</div>
				<button class="btn btn-warning form-control" @click="vender()">Guardar venta</button>
			</div>
		</div><hr>
		<div class="row">
			<div class="col-md-7 col-xs-8">
				<table class="table table-bordered table-sm table-striped">
					<thead class="thead-dark">
						<th>Codigo</th>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Total</th>
						<th>Acciones</th>
					</thead>
					<tbody>
						<tr v-for="(v,index) in ventas">
							<td>@{{v.id_articulo}}</td>
							<td>@{{v.nombre}}</td>
							<td>@{{v.costo}}</td>
							<td>
								<input type="number" class="form-control" min="1" v-model.number="cantidades[index]">
							</td>
							<td><b>$@{{totalArt(index)}}</b></td>
							<td>
								
								<!-- Botón para aumentar-->
								<!-- <span class="btn btn-outline-primary" @click="addProd(index)"><i class="fas fa-plus-circle"></i></span>

								 Botón para disminuir
								<span class="btn btn-outline-warning" @click="minusProd(index)"><i class="fa fa-minus-circle"></i></span> -->

								<!-- Botón para eliminar-->
								<span class="btn btn-outline-danger" @click="eliminarProducto(index)"><i class="fas fa-trash"></i></span>
							</td>
						</tr>
					</tbody>
				</table>
				<!-- @{{cantidades}} -->
			</div>
			
			<!-- Fin del row -->
		</div>
		<div class="row">
			<div class="col-md-6 col-xs-12" >				
				<table class="table table-bordered">
					<tr>
						<th style="background: #FFFFCC">Total</th>
						<td><h4>$ @{{total}}</h4></td>
					</tr>
					<tr>
						<th style="background: #FFFFCC">Paga con:</th>
						<td>
							<h4><input type="number" class="form-control" v-model="pago"></h4>
						</td>
					</tr>
					<tr>
						<th style="background: #FFFFCC">Cambio de:</th>
						<td><b><h4 class="text-primary">@{{cambio}}</h4></b></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection
@push('scripts')
	<!-- <script src="js/vue-resource.js"></script> -->
	<script src="js/vendedor/ventas.js"></script>
	<script src="js/moment-with-locales.min.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">