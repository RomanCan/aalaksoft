@extends('layouts.masteradministrador')
@section('contenido')

<div class="container">
	<div id='empresa' align="center">
		<hr>
		<h1 class="">Datos de la empresa</h1>
		<hr>
		<!-- inicio del row -->
		<div class="row">
			<div class="col-md-12 col-xs-2" align="right" v-for="empresax in empresa">
				 <br> 
        		<label>Opcion</label>
        		<!-- <span class="btn btn-outline-success" @click="editDatos(empresax.rfc)"><i class="fas fa-edit"></i></span> -->
        		<span class="btn btn-outline-success" @click="editDatos(empresax.rfc)"><i class="">Editar</i></span>
			</div>
			<div class="col-md-10 col-xs-10 table-responsive">
				<table class="table table-striped ">
					<thead class="thead-dark">
						<th>RFC</th>
						<th>Nombre/Empresa</th>
						<th>Dirección</th>
						<th>Teléfono</th>
						<th>Correo</th>
						<th>Representante Legal</th>
						<th>Horario</th>
					</thead>
					<tbody class="box box-success">
						<tr v-for="empresax in empresa">
							<td>@{{ empresax.rfc }}</td>
							<td>@{{ empresax.nombre_empresa }}</td>
							<td>@{{ empresax.direccion }}</td>
							<td>@{{ empresax.telefono }}</td>
							<td>@{{ empresax.correo }}</td>
							<td>@{{ empresax.representante_legal }}</td>
							<td>@{{ empresax.horario }}</td>
							
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!-- fin del row	 -->
		<!-- inicio del modal -->
		<div class="modal fade" tabindex="-1" role="dialog" id="datos">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header" style="background: #2387FF; color: #fff">
						<h4 class="modal-title">Editar Datos Empresa</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" v-on:click="salir">x</span></button>
					</div>
					<!-- inicio del body -->
					<div class="modal-body">
						<input type="text" placeholder="RFC" class="form-control" v-model="rfc" maxlength="8"> 
						<input type="text" placeholder="Nombre" class="form-control" v-model="nombre_empresa">
						<input type="text" placeholder="Dirección" class="form-control" v-model="direccion">
						<input type="text" placeholder="Teléfono" class="form-control" v-model="telefono">
						<input type="text" placeholder="Correo" class="form-control" v-model="correo">
						<input type="text" placeholder="Representante legal" class="form-control" v-model="representante_legal">
						<input type="text" placeholder="Horario" class="form-control" v-model="horario">
						<input type="file" class="form-control" @change="alSeleccionar" accept="image/jpeg" maxlength="1024"><br>
						<p>
							NOTA: SI ÚNICAMENTE CAMBIA EL RFC, EL LOGO NO SE CAMBIARÁ.
							Tiene que Actualizar el RFC y el logo al mismo tiempo para que 
							el logo de su empresa se actualice</p>
						<br>
							{{-- elementos html --}}
					</div>
					<!-- fin del body -->
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-danger" data-dismiss="modal" @click="salir">	Cancelar</button>
						<button type="submit" class="btn btn-outline-primary" @click="updateDatos()">Actualizar</button>
						<p></p>
						<button class="btn btn-outline-primary btn-block" @click="cargarLogo()">Guardar logo</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
			<!-- fin del modal -->	
		<div class="row">
			<div class="col-md-10">
				<hr>
					<h4>Logo de la empresa</h4>
				<p>
				<div class="col-md-6">
				<img v-bind:src="preview" class="img img-rounded" width="400px" height="250px" v-if="preview">
				</div>
				<hr>
			</div>
		</div>
</div>
@endsection

@push('scripts')
	<script src="js/admin/empresa.js"></script>
@endpush

<input type="hidden" name="route" value="{{url('/')}}">