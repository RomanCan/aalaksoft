@extends('layouts.masterpropietario')
@section('contenido')
<div id="mascota">
	<div class="d-none">
		@{{id_session="{!!Session::get('nombre_usuario')!!}"}}
	</div>
	<div class="container" align="center">
	    <!-- <h2>Datos de la mascota |<small> Mis mascotas</small></h2> -->
	<div class="row">
		<div class="col-md-10 col-xs-12" >
			<hr>
		    <h1>Mis mascotas</h1>
		    <hr>
			<button class="btn btn-outline-primary " @click="showModal()"><i class="fa fa-paw"></i> Agregar mascota</button><hr>
			<div class="table-responsive table-hover table-sm">
				<table class="table table-bordered">
					<thead class="thead-dark">
						
						<th>Nombre</th>
						<th>Género</th>
						<th>Raza</th>
						<th>Especie</th>
						<th>Fecha de nacimiento</th>
						<th>Color</th>
						<th>Observaciones</th>
						<th>Foto</th>
						<th>Editar</th>
					</thead>
					<tbody>
						<tr v-for="mascotax in mascota">
							
							<td>@{{ mascotax.nombre }}</td>
							<td>@{{ mascotax.genero.nombre }}</td>
							<td>@{{ mascotax.raza }}</td>
							<td>@{{ mascotax.especie.tipo}}</td>
							<td>@{{ mascotax.fecha_nac }}</td>
							<td>@{{ mascotax.color }}</td>
							<td>@{{ mascotax.observaciones}}</td>
							<!-- Las Fotos son con v-bind y entre las 2 comillas llevan acento al revés
							Este acento sale con alt gr y llave de cierre `` -->
							<td><img v-bind:src="`img/mascotas/${mascotax.foto}` "class="image" height="100px" width="100px"></td>
							<td>
								<span class="btn btn-outline-success btn-block" @click="editarMascota(mascotax.id_mascota)"><i class="fa fa-edit"></i></span>
								<span class="btn btn-outline-info btn-block" @click="efoto(mascotax.id_mascota)"><i class="">Agregar/editar foto</i></span>

							</td>
						</tr>
					</tbody>
				</table>
			</div>
			
				    <div class="col-xs-6">
				    </div>

		</div>
		<!-- <div class="col-md-4" align="center">
		    <h4>Foto de mi mascota (Cambiar foto)</h4>
		    <p></p><p></p>
			<img v-bind:src="preview" class="img img-rounded" width="150px" height="150px" v-if="preview">
		</div> -->
		</div><!-- Fin del row
		</div> -->
				<div class="modal fade" tabindex="-1" role="dialog" id="datos">
				<div class="modal-dialog" role="document">
					<div class="modal-content" >
						<div class="modal-header" style="background: #2387FF">
							
							<h4 class="modal-title" style="color: #fff" v-if="editando">Editar datos</h4>
							<h4 class="modal-title" style="color: #fff" v-if="!editando">Agregar mascota</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" v-on:click="salir">x</span></button>
							<p></p>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-6">
									<label>Nombre:</label><input type="text" placeholder="Nombre" class="form-control" v-model="nombre" maxlength="50">
									<label>Seleccione la especie:</label><select class="form-control" v-model="id_especie">
					                  <option disabled="Seleccione una opcion"></option>
					                  <option v-for="esp in especie" v-bind:value="esp.id_especie">@{{esp.tipo}}</option>
					                </select >
					                <label>Fecha de nacimiento:</label><input type="date" placeholder="Fecha_nacimiento" class="form-control" v-model="fecha_nac">
					                <label>Observaciones:</label><input type="text" placeholder="Observaciones" class="form-control" v-model="observaciones">
								</div>
							
								<div class="col-md-6">
									<label>Seleccione el género:</label><select class="form-control" v-model="id_genero">
					                  <option disabled="Seleccione una opcion"></option>
					                  <option v-for="gen in genero" v-bind:value="gen.id_genero">@{{gen.nombre}}</option>
					                </select >
					                <label>Raza:</label><input type="text" placeholder="Raza" class="form-control" v-model="raza">
					                <label>Color:</label><input type="text" placeholder="Color" class="form-control" v-model="color">
								</div>
							</div>
							<!-- <input type="file" class="form-control" @change="alSeleccionar" accept="image/jpeg" maxlength="1024"> -->
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-outline-primary" @click="agregarMascota()" v-if="!editando">Guardar</button>
							<button type="button" class="btn btn-outline-danger" data-dismiss="modal" @click="salir">Cancelar</button>
							
							<button type="submit" class="btn btn-outline-info" @click="actualizarDatos()" v-if="editando">Actualizar</button>
							<!-- <button class="btn btn-primary" @click="actualizarM()">Foto</button> -->
							<p></p>
							
							<!-- <button class="btn btn-primary btn-block" @click="cargarFoto()">Guardar foto</button> -->
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->


			<!-- inicio modal- -->

				<div class="modal fade" tabindex="-1" role="dialog" id="fotos">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header" style="background: #2387FF">
							
							<h4 class="modal-title" style="color: #fff">Seleccione una foto</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" v-on:click="salir">x</span></button>
							<p></p>
						</div>
						<div class="modal-body">

							<label>Foto de la mascota</label><input type="file" class="form-control" @change="alSeleccionar" accept="image/jpeg" maxlength="1024">
						</div>
						<div class="modal-footer">
							<button class="btn btn-outline-info" @click="actualizarF()">Actualizar Foto</button>
							<button type="button" class="btn btn-outline-danger" data-dismiss="modal" @click="salir">Cancelar</button>
							
							<p></p>
							
							<!-- <button class="btn btn-primary btn-block" @click="cargarFoto()">Guardar foto</button> -->
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->





			<!-- fin del modal -->

















	<p></p>
</div>
@endsection

@push('scripts')
	<!-- <script src="js/vue-resource.js"></script> -->
	<script src="js/cliente/mascota.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">
