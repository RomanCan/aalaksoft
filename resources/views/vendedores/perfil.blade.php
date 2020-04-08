@extends('layouts.mastervend')
@section('contenido')

<!-- <div>
  @{{id_session="{!!Session::get('id_usuario')!!}"}}
</div> -->

<div id="usuario">
  <div class="container" align="center">
    <hr>
    <h2>Mi perfil</h2><br>
    <hr>
        
    <!-- inicio del row  -->
    <div class="row" align="center">
      <div class="col-md-12 col-xs-2" align="left" v-for="u in usuarios">
        <br> 
        <label>Opcion:</label>
        <span class="btn btn-outline-success" @click='editarUsuario(u.id_usuario)'><i class=""></i>Editar</span><hr>
      </div>      
      <div class="col-md-10 col-xs-12 table-responsive" >
        <table class="table table-light table-hover">
          <thead align="center" class="thead-dark">
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Nombre</th>
            <th>Apellido P</th>
            <th>Apellido M</th>
            <th>Edad</th>
            <th>Sexo</th>
          </thead>
          <tbody class="">
            <tr v-for="u in usuarios" align="center">
              <td>@{{u.usuario}}</td>
              <td>@{{u.password}}</td>
              <td>@{{u.nombre}}</td>
              <td>@{{u.apellidop}}</td>
              <td>@{{u.apellidom}}</td>
              <td>@{{u.edad}}</td>
              <td>@{{u.sexo}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <div class="col-md-10 col-xs-10 table-responsive">
        <table class="table table-light table-hover">
          <thead align="center" class="thead-dark">
            <th>Curp</th>
            <th>Telefono</th>
            <th>Calle</th>
            <th>Cruzamiento</th>
            <th>Localidad</th>
            <th>Municipio</th>
            
          </thead>
          <tbody class="">
            <tr v-for="u in usuarios" align="center">
              
              <td>@{{u.curp}}</td>
              <td>@{{u.telefono}}</td>
              <td>@{{u.calle}}</td>
              <td>@{{u.cruzamiento}}</td>
              <td>@{{u.localidad}}</td>
              <td>@{{u.municipio}}</td>
              <!-- <td>@{{u.activo}}</td> -->
            </tr>
          </tbody>
        </table>

      </div>
      <!-- fin del row -->
       <!-- inicio del modal -->
        <div class="modal fade" tabindex="-1" role="dialog" id="add_usuario">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header" style="background: #2387FF">
               
                <h4 class="modal-tittle" style="color: #fff">Actualizar datos</h4> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" @click="">x</span></button>
              </div>
              <!-- inicio del body -->
              <div class="modal-body">
                <div class="container-fluid">
                  <!-- inicio del row -->
                  <div class="row">
                    <!-- inicio del col -->
                    <div class="col-md-6 col-xs-6">
                      
                      <label>Nombre de usuario:</label><input type="text" placeholder="Nombre de Usuario" class="form-control" v-model="usuario" required onkeypress="return soloLetras(event);">

                      <label>Contraseña:</label><input type="text" placeholder="Contraseña" class="form-control" v-model="password">

                      <label>Curp:</label><input type="text" placeholder="CURP" class="form-control" v-model="curp" maxlength="18">
                      
                    </div>
                    <!-- fin del col -->
                    <!-- inicio del col -->
                    <div class="col-md-6 col-xs-6">
                      <label>Nombre:</label><input type="text" placeholder="Nombre" class="form-control" v-model="nombre" required onkeypress="return soloLetras(event);">
                      
                      <label>Apellido Paterno:</label><input type="text" placeholder="Apellido Paterno" class="form-control" v-model="apellidop" required onkeypress="return soloLetras(event);">

                      <label>Apellido Materno:</label><input type="text" placeholder="Apellido Materno" class="form-control" v-model="apellidom" required onkeypress="return soloLetras(event);">

                    </div>
                    <!-- fin del col -->
                  </div>
                  <!-- fin del row -->
                  <!-- inicio del row -->
                  <div class="row">

                    <div class="col-md-6 col-xs-6">
                      <label>Edad:</label><input type="text" maxlength="2" placeholder="Edad" class="form-control" v-model="edad" onkeypress="return soloNumeros(event);" required>

                      <label>Sexo:</label><input type="text" placeholder="Sexo" class="form-control" v-model="sexo" required onkeypress="return soloLetras(event);">

                      <label>Celular:</label><input type="text" maxlength="10" placeholder="Celular" class="form-control" v-model="telefono" onkeypress="return soloNumeros(event);" required>
                    </div>

                    <div class="col-md-6 col-xs-6">
                      <label>Calle:</label><input type="text" maxlength="3" placeholder="Calle" class="form-control" v-model="calle" onkeypress="return soloNumeros(event);" required>

                      <label>Cruzamientos:</label><input type="text" maxlength="8" placeholder="Cruzamiento" class="form-control" v-model="cruzamiento">

                      <label>Localidad:</label><input type="text" placeholder="Localidad" class="form-control" v-model="localidad" required onkeypress="return soloLetras(event);">
                    </div>
                  </div> 
                  <!-- fin del row  -->
                  <!-- inicio del row -->
                  <div class="row">
                    <div class="col-md-6 col-xs-6">
                       <label>Municipio:</label>
                       <input type="text" placeholder="Municipio" class="form-control text-center" v-model="municipio" required onkeypress="return soloLetras(event);">
                    </div>
                  </div>
                  <!-- fin del row -->
                </div>
              </div>
              <!-- fin del body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-outline-primary" @click="actualizarUsuario()">Guardar cambios</button>
              </div>
            </div>
          </div>
        </div>
      <!-- fin del modal -->
    </div><!--fin del row-->
  </div>
</div>
@endsection
@push('scripts')
   <script src="js/admin/usuario.js"></script>
   <script src="js/validacion.js"></script>
   <!-- <script type="text/javascript" src="js/vue-resource.js"></script> -->

@endpush
<input type="hidden" name="route" value="{{url('/')}}">
