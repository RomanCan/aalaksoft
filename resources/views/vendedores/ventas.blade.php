@extends('layouts.mastervend')
@section('contenido')
<section id="ventas">
								<div class="d-none">
									@{{id_session="{!!Session::get('id_usuario')!!}"}}
								</div>
	<br>
	<h1 class="container" align="center">Ventas</h1><hr>
		<h3>Folio: @{{folio}}</h3>
		<h3>Fecha: @{{fecha}}</h3>
	<section >
		<div class="row container">
			<div class="col-md-5 col-sm-7 col-xs-12">
				<div class="input-group">
					<input type="text" class="form-control" v-model="codigo" ref="buscar" v-on:keyup.enter="getProducto()">
					<span class="input-group-btn">
						<button type="button" class="btn btn-success" @click="getProducto()">Agregar</button>
					</span>
				</div><br>
				<button class="btn btn-info btn-block" @click="vender()" >Vender</button>
			</div>
		</div><br>
	</section>
	<section >
		<div class="row container" >
			<div class="col-md-7 col-sm-8 col-xs-12  table-responsive-sm">
				<table class="table table-borderless table-sm table-hover" style="margin:5px 10px">
					<thead class="thead-dark">
						<th>Codigo</th>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>Total</th>
						<th>Accion</th>
					</thead>
					<tbody>
						<tr v-for="(v,index) in ventas" align="center">
							<td>@{{v.id_articulo}}</td>
							<td>@{{v.nombre}}</td>
							<td>@{{v.costo}}</td>
							<td style="width: 20%">
								<input type="number" class="form-control" min="1" v-model.number="cantidades[index]">
							</td>
							<td style="width: 10%"><b>$@{{totalArt(index)}}</b></td>
							<td style="width: 10%">
								
								<!-- Botón para aumentar-->
								<!-- <span class="btn btn-outline-primary" @click="addProd(index)"><i class="fas fa-plus-circle"></i></span>

								 Botón para disminuir
								<span class="btn btn-outline-warning" @click="minusProd(index)"><i class="fa fa-minus-circle"></i></span> -->

								<!-- Botón para eliminar-->
								<span class="btn btn-outline-danger" @click="eliminarProducto(index)" ><i class="fas fa-trash"></i></span>
							</td>
						</tr>
					</tbody>
				</table>
				<!-- @{{cantidades}} -->
			</div>
			<div class="col-md-1 col-sm-1 col-xs-1"></div>
			
			<div class="col-md-4 col-sm-7 col-xs-6 table-responsive-sm" >				
				<table class="table table-bordered" style="color: white">
					<tr >
						<th style="background: #000; width: 10%">Total</th>
						<td><h4 style="width: 35%" class="text-primary">$@{{total}}</h4></td>
					</tr>
					<tr>
						<th style="background: #000">Paga con:</th>
						<td>
							<h4><input type="number" class="form-control" v-model="pago" style="width: 100%"></h4>
						</td>
					</tr>
					<tr>
						<th style="background: #000; width: 10%">Cambio de:</th>
						<td style="width: 25%"><b><h4 class="text-danger">$@{{cambio}}</h4></b></td>
					</tr>
				</table>
			</div>
		</div><!-- Fin del row -->
		
	</section>
</section>

@endsection
@push('scripts')
	<!-- <script src="js/vue-resource.js"></script> -->
	<script src="js/vendedor/ventas.js"></script>
	<script src="js/moment-with-locales.min.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">