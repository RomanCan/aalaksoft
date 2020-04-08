@extends('layouts.masterpropietario')
@section('contenido')
<!-- <script>
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";//Se define todo el abecedario que se quiere que se muestre.
    especiales = [8, 37, 39, 46, 6]; //Es la validación del KeyCodes, que teclas recibe el campo de texto.

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if(letras.indexOf(tecla) == -1 && !tecla_especial){
        return false;
    }
}

</script>

<script type="text/javascript">
function soloNumeros(e)
{
var keynum = window.event ? window.event.keyCode : e.which;
if ((keynum == 8) || (keynum == 46))
return true;
return /\d/.test(String.fromCharCode(keynum));
}
</script> -->
<!-- <div class="hidden">
  @{{id_session="{!!Session::get('id_propietario')!!}"}}
</div> -->

<div id="propietario">
  <div class="container" align="center">
    <hr>
    <h2>Mi perfil</small></h2>
    <hr>
    <div class="row" align="center">
        <div class="col-md-12 col-xs-2" align="left" v-for="pro in propietario">
          <br> 
          <label>Opcion:</label>
          <span class="btn btn-outline-success" @click='editarPropietario(pro.nombre_usuario)'><i class="fas fa-edit"></i></span><hr>
        </div>
        <div class="col-md-10 col-xs-10 table-responsive" >
          <table class="table table-striped table-hover">
            <thead class="thead-dark">
              <th>Usuario</th>
              <th>Contraseña</th>
              <th>Nombre</th>
              <th>Apellido Paterno</th>
              <th>Apellido Materno</th>
              <th>Edad</th>
            </thead>
            <tbody v-for="pro in propietario" class="box box-success">
              <tr>
                <td>@{{pro.nombre_usuario}}</td>
                <td>@{{pro.password}}</td>
                <td>@{{pro.nombre}}</td>
                <td>@{{pro.apellidop}}</td>
                <td>@{{pro.apellidom}}</td>
                <td>@{{pro.edad}}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-md-10 col-xs-10 table-responsive" >
          <table class="table table-striped table-hover">
            <thead class="thead-dark">
              <th>Curp</th>
              <th>Celular</th>
              <th>Calle</th>
              <th>Localidad</th>
              <th>Cruzamientos</th>
              <th>Municipio</th>
              <!-- <th>Opciones</th> -->
            </thead>
            <tbody v-for="pro in propietario" class="box box-success">
              <tr>
                <td>@{{pro.curp}}</td>
                <td>@{{pro.celular}}</td>
                <td>@{{pro.calle}}</td>
                <td>@{{pro.cruzamientos}}</td>
                <td>@{{pro.localidad}}</td>
                <td>@{{pro.municipio}}</td>
              </tr>
              
              <!-- <td><span class="btn btn-success glyphicon glyphicon-pencil" @click='editarPropietario(pro.nombre_usuario)'></span> -->
              <!-- </td> -->
            </tbody>
          </table>
        </div>


        <!-- inicio del modal -->
        <div class="modal fade" tabindex="-1" role="dialog" id="add_propietario">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header" style="background: #2387FF">
                
                <h4 class="modal-tittle" style="color: #fff">Actualizar datos</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" @click="">x</span></button>
              </div>
              <div class="modal-body">
                <!-- inicio del row -->
                <div class="row">
                  <!-- col -->
                  <div class="col-md-6 col-xs-6">
                    <label>Nombre de usuario:</label><input type="text" placeholder="Nombre de Usuario" class="form-control" v-model="nombre_usuario" required onkeypress="return soloLetras(event);">
                    <label>Contraseña:</label><input type="text" placeholder="Contraseña" class="form-control" v-model="password">
                    <label>Nombre:</label><input type="text" placeholder="Nombre" class="form-control" v-model="nombre" required onkeypress="return soloLetras(event);">
                  </div>
                  <!-- fin col -->
                  <!-- col -->
                  <div class="col-md-6 col-xs-6">
                    <label>Apellido Paterno:</label><input type="text" placeholder="Apellido Paterno" class="form-control" v-model="apellidop" required onkeypress="return soloLetras(event);">
                    <label>Apellido Materno:</label><input type="text" placeholder="Apellido Materno" class="form-control" v-model="apellidom" required onkeypress="return soloLetras(event);">
                    <label>Curp:</label><input type="text" placeholder="CURP" class="form-control" v-model="curp" maxlength="18">
                  </div>
                  <!-- fin col -->
                </div>
                <!-- fin del row -->
                <!-- inicio del row -->
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <label>Edad:</label><input type="text" maxlength="2" placeholder="Edad" class="form-control" v-model="edad" onkeypress="return soloNumeros(event);" required>
                    <label>Celular:</label><input type="text" maxlength="10" placeholder="Celular" class="form-control" v-model="celular" onkeypress="return soloNumeros(event);" required>
                    <label>Calle:</label><input type="text" maxlength="3" placeholder="Calle" class="form-control" v-model="calle" onkeypress="return soloNumeros(event);" required>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <label>Cruzamientos:</label><input type="text" maxlength="8" placeholder="Cruzamiento" class="form-control" v-model="cruzamientos">
                    <label>Localidad:</label><input type="text" placeholder="Localidad" class="form-control" v-model="localidad" required onkeypress="return soloLetras(event);">
                    <label>Municipio:</label><input type="text" placeholder="Municipio" class="form-control" v-model="municipio" required onkeypress="return soloLetras(event);">
                  </div>
                </div>
                <!-- fin del row -->
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" @click="actualizarPropietario()">Guardar cambios</button>
              </div>
            </div>
          </div>
        </div>
        <!-- fin del modal -->
      
   
  </div>
</div>
@endsection
@push('scripts')
   <script src="js/cliente/propietario.js"></script>
   <script src="js/validacion.js"></script>

@endpush
<input type="hidden" name="route" value="{{url('/')}}">
