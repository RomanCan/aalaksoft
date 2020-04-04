@extends('layouts.masterlogin')
@section('titulo','Iniciar Sesion')
@section('contenido')
<div id="user">
    <div>
      <form action="{{url('log')}}" method="POST" class="full-box logInForm">
        @csrf
        <p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
        <p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>
        <div class="form-group label-floating" >
          <label class="control-label">Nombre De Usuario</label>
          <input class="form-control" maxlength="10" type="text" name="usuario" style="color: #FFFFFF">
          <p class="help-block">Escribe tú nombre de usuario</p>
        </div>
        <div class="form-group label-floating">
          <label class="control-label">Contraseña</label>
          <input class="form-control" maxlength="10" type="password" name="contrasenia" style="color: #FFFFFF">
          <p class="help-block">Escribe tú contraseña</p>
        </div>
        <div class="form-group text-center">
          <input type="submit" value="Login" class="btn btn-danger btn-block">
        </div>
      </form>   
    </div>

    <div align="right">
      <label><small>¿No tienes una cuenta?<br>Entonces regístrate ahora!</small></label><br>
      <button class="btn btn-warning" @click="showModal()">Regístrate</button>
    </div>
  
  
  

<!-- inicio del modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="add_u">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true" @click="salir()">x</span></button>
                 <h4 class="modal-title">Guardar</h4>
              </div>
              <div class="modal-body">

                <input type="text" maxlength="10" placeholder="Nombre de usuario" v-model="nombre_usuario" class="form-control">
                <input type="text" maxlength="10" placeholder="Contraseña" v-model="password" class="form-control">
                <input type="text" maxlength="10" placeholder="Nombre" v-model="nombre" class="form-control">
                <input type="text" maxlength="10" placeholder="Apellido Paterno" v-model="apellidop" class="form-control">
                <input type="text" maxlength="10" placeholder="Apellido Materno" v-model="apellidom" class="form-control">
              </div>


              <div class="modal-footer">
                <button class="btn btn-success" @click="agregarU()">Guardar</button>

              </div>
            </div>
          </div>
        </div>    
<!-- fin del modal -->
</div>


@endsection
@push('scripts')
<script src="js/registro.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">