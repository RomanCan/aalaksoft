@extends('layouts.masteradministrador')
@section('contenido')
<div id='empleado' align="center">
	<div class="container" align="center">
	<hr>
	<h2>Empleados</h2>
	<hr>
	
	
	<div class="row" align="center justify">
		<div class="col-md-12 col-sm-12 col-xs-12" align="left">
	        <br> 
			<button type="button" class="btn btn-info" @click="showModal()">Agregar +</button>
      	</div><br><br><br>
      	
		<div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
			<table class="table table-hover table-borderless table-sm">
				<thead align="center" class="thead-dark">
					<th>Nombre/Usuario</th>
					<th>Contraseña</th>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<!-- <th>CURP</th> -->
					<!-- <th>Sexo</th> -->
					<th>Edad</th>
					<th>Celular</th>
					<!-- <th>Calle</th>
					<th>Cruzamiento</th>
					<th>Localidad</th> -->
					<th>Municipio</th>
					<!-- <th>Activo</th> -->
					<th>Opciones</th>
				</thead>
				<tbody>
					<tr v-for="(empleado,index) in empleados" align="center">
						<td>@{{empleado.usuario}}</td>
						<td>@{{empleado.password}}</td>
						<td>@{{empleado.nombre}}</td>
						<td>@{{empleado.apellidop}}</td>
						<td>@{{empleado.apellidom}}</td>
						<!-- <td>@{{empleado.curp}}</td>
						<td>@{{empleado.sexo}}</td> -->
						<td>@{{empleado.edad}}</td>
						<td>@{{empleado.telefono}}</td>
						<!-- <td>@{{empleado.calle}}</td>
						<td>@{{empleado.cruzamiento}}</td>
						<td>@{{empleado.localidad}}</td> -->
						<td>@{{empleado.municipio}}</td>
						<!-- <td>@{{empleado.activo}}</td> -->
						<td class="btn-group" role="group">
							<span class="btn btn-outline-success"  @click="editarE(empleado.id_usuario)"><i class="fas fa-edit"></i></span>
							<span class="btn btn-outline-danger" @click="eliminarE(empleado.id_usuario)"><i class="fas fa-trash"></i></span>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<!-- tabla de desactivados -->
	<div v-for="(em, index) in desactivados">
		<!-- if(em.activo != 0){ -->
			<hr>
			<h2>Empleados Desactivados</h2>
			<hr>
			<!-- inicio de segunda tabla para desactivados -->
			<div class="row" align="center justify">
				
				<div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
					<table class="table table-hover table-borderless table-sm">
						<thead align="center" class="thead-dark">
							<th>Nombre/Usuario</th>
							<th>Contraseña</th>
							<th>Nombre</th>
							<th>Apellido Paterno</th>
							<th>Apellido Materno</th>
							<!-- <th>CURP</th> -->
							<!-- <th>Sexo</th> -->
							<th>Edad</th>
							<th>Celular</th>
							<!-- <th>Calle</th>
							<th>Cruzamiento</th>
							<th>Localidad</th> -->
							<th>Municipio</th>
							<!-- <th>Activo</th> -->
							<th>Opciones</th>
						</thead>
						<tbody>
							<tr v-for="(em,index) in desactivados" align="center">
								<td>@{{em.usuario}}</td>
								<td>@{{em.password}}</td>
								<td>@{{em.nombre}}</td>
								<td>@{{em.apellidop}}</td>
								<td>@{{em.apellidom}}</td>
								<!-- <td>@{{em.curp}}</td>
								<td>@{{em.sexo}}</td> -->
								<td>@{{em.edad}}</td>
								<td>@{{em.telefono}}</td>
								<!-- <td>@{{em.calle}}</td>
								<td>@{{em.cruzamiento}}</td>
								<td>@{{em.localidad}}</td> -->
								<td>@{{em.municipio}}</td>
								<!-- <td>@{{em.activo}}</td> -->
								<td class="btn-group" role="group">
									<!-- <span class="btn btn-outline-success"  @click="editarDes(em.id_usuario)"><i class="fas fa-edit"></i></span>
									<span class="btn btn-outline-danger" @click="eliminarDes(em.id_usuario)"><i class="fas fa-trash"></i></span> -->
									<span class="btn btn-outline-warning btn-block" @click="actualizarDes(em.id_usuario)">Activar</span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!-- fin de la tabla de los desactivados -->
		<!-- } -->
		
		
	</div>
	<!-- fin desactivados -->
	

<!-- inicio del modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="e">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background: #2387FF">
					
					<h4 class="modal-tittle" v-if="!editar" style="color: #fff">Empleado nuevo</h4>
					<h4 class="modal-tittle" v-if="editar" style="color: #fff">Actualizar empleado</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" @click="salir">x</span></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<label v-if="!editar">Nombre de usuario</label><input v-if="!editar" maxlength="15" type="text" placeholder="Nombre de usuario" class="form-control" v-model="usuario">
							<label>Nombres:</label><input type="text" maxlength="30" placeholder="Nombre" class="form-control" v-model="nombre" required onkeypress="return soloLetras(event);">
							<label>Apellido Paterno</label><input type="text" maxlength="15" placeholder="Apellido Paterno" class="form-control" v-model="apellidop" required onkeypress="return soloLetras(event);">
							<label>Apellido Materno</label><input type="text" maxlength="15" placeholder="Apellido Materno" class="form-control" v-model="apellidom" required onkeypress="return soloLetras(event);">
							
						</div>
						<div class="col-md-6">
							
							<label v-if="!editar">Contraseña</label><input v-if="!editar" maxlength="15" type="text" placeholder="Contraseña" class="form-control" v-model="password">
							<label>Edad:</label><input type="text" maxlength="2" placeholder="Edad" class="form-control" v-model="edad" onkeypress="return soloNumeros(event);" required>
							
							<label>Teléfono:</label><input type="text" maxlength="10" placeholder="Celular" class="form-control" v-model="telefono" onkeypress="return soloNumeros(event);" required>
							<label>Municipio:</label><input type="text" maxlength="30" placeholder="Municipio" class="form-control" v-model="municipio" required onkeypress="return soloLetras(event);">
							<!-- <label>Curp:</label><input type="text" maxlength="18" placeholder="CURP" class="form-control" v-model="curp"> -->
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-outline-primary" @click="agregarE()" v-if="!editar">Guardar</button>
					<button type="submit" class="btn btn-outline-primary" @click="actualizarE()" v-if="editar">Actualizar</button>
					<button type="button" class="btn btn-outline-danger" @click="salir">Cancelar</button>			
				</div>
			</div>
		</div>
	</div>
<!-- fin del modal -->
	</div>
</div>
@endsection
@push('scripts')
	<script type="text/javascript" src="js/admin/empleados.js"></script>
	<script src="js/validacion.js"></script>
@endpush

<input type="hidden" name="route" value="{{url('/')}}">