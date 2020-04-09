@extends('layouts.masteradministrador')
@section('contenido')

<div id="empresa" align="center" style="margin: 10px">
<!-- @{{$data.empresa}} -->
		<h1 class="">Datos de la empresa</h1>
		<hr>
	<!-- inicio del row -->
	<div class="row">
		<div class="col-md-8 col-sm-12 col-xs-12" v-for="empresax in empresa">
			<label>Opcion: </label><span class="btn btn-outline-primary" @click="editDatos(empresax.id_empresa)"><i class="">Editar</i></span>
			<div class="form-group">
                <label style="float:left">RFC de la empresa.</label>
        	    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-file-code"></i></span>
                    </div>
                    <label class="form-control">@{{empresax.rfc}}</label>
                </div>
            </div>
			<div class="form-group">
                <label style="float:left">Nombre de la empresa.</label>
        	    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                    </div>
                    <label class="form-control">@{{empresax.nombre_empresa}}</label>
                </div>
            </div>
			<div class="form-group">
                <label style="float:left">Direccion.</label>
        	    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                    </div>
                    <label class="form-control">@{{empresax.direccion}}</label>
                </div>
            </div>
			<div class="form-group">
                <label style="float:left">Telefono.</label>
        	    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    </div>
                    <label class="form-control">@{{empresax.telefono}}</label>
                </div>
            </div>
			<div class="form-group">
                <label style="float:left">Correo.</label>
        	    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
                    </div>
                    <label class="form-control">@{{empresax.correo}}</label>
                </div>
            </div>
			<div class="form-group">
                <label style="float:left">Representante.</label>
        	    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <label class="form-control">@{{empresax.representante_legal}}</label>
                </div>
            </div>
			<div class="form-group">
                <label style="float:left">Horarios.</label>
        	    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-history"></i></span>
                    </div>
                    <label class="form-control">@{{empresax.horario}}</label>
                </div>
            </div>
		</div>

		<div class="col-md-4 col-sm-12 col-xs-12" v-for="empresax in empresa">

			<label>Opcion: </label><span class="btn btn-outline-info" @click="editF(empresax.id_empresa)"><i class="">Editar Foto</i></span>
			<div class="form-group">
                <label style="float:left">Logo de la empresa.</label>
        	    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-image"></i></span>
                    </div>
					<img v-bind:src="preview" class="img img-rounded" width="200px" height="200px" v-if="preview">
                    
                </div>
            </div>
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
					<!-- <input type="file" class="form-control" @change="alSeleccionar" accept="image/jpeg" maxlength="1024"><br> -->
					<!-- <p>
						NOTA: SI ÚNICAMENTE CAMBIA EL RFC, EL LOGO NO SE CAMBIARÁ.
						Tiene que Actualizar el RFC y el logo al mismo tiempo para que 
						el logo de su empresa se actualice</p>
					<br> -->
							{{-- elementos html --}}
				</div>
				<!-- fin del body -->
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-danger" data-dismiss="modal" @click="salir">	Cancelar</button>
					<button type="submit" class="btn btn-outline-primary" @click="updateDatos()">Actualizar</button>
					<p></p>
					<!-- <button class="btn btn-outline-primary btn-block" @click="cargarLogo()">Guardar logo</button> -->
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>

	<!-- inicio del modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="foto">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="background: #2387FF; color: #fff">
					<h4 class="modal-title">Editar Foto y RFC</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" v-on:click="salir">x</span></button>
				</div>
				<!-- inicio del body -->
				<div class="modal-body">
					
					<input type="file" class="form-control" @change="alSeleccionar" accept="image/jpeg" maxlength="1024"><br>
					<!-- <p>
						NOTA: SI ÚNICAMENTE CAMBIA EL RFC, EL LOGO NO SE CAMBIARÁ.
						Tiene que Actualizar el RFC y el logo al mismo tiempo para que 
						el logo de su empresa se actualice</p>
					<br> -->
							{{-- elementos html --}}
				</div>
				<!-- fin del body -->
				<div class="modal-footer">
					
					<button class="btn btn-outline-primary btn-block" @click="cargarLogo()">Guardar logo</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	<!-- fin del modal -->	
</div>
@endsection

@push('scripts')
	<script src="js/admin/empresa.js"></script>
@endpush

<input type="hidden" name="route" value="{{url('/')}}">