@extends('layouts.masterpropietario')
@section('contenido')

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
          <label>Opción:</label>
          <span class="btn btn-outline-success" @click='editarPropietario(pro.nombre_usuario)'><i class="fas fa-edit"></i></span><hr>
        </div>
        <!-- col -->
        <div class="col-md-6 col-sm-16 col-xs-12 card-body" v-for="pro in propietario">
            <div class="card-header" style="border: none;">
              <h3>Información de la sesión</h3>
            </div>

            <div class="form-group">
              <label style="float:left">Nombre de usuario.</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                    <label class="form-control">@{{pro.nombre_usuario}}</label>
                </div>
            </div>

            <div class="form-group">
              <label style="float:left">Contraseña.</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                  </div>
                    <label class="form-control">@{{pro.password}}</label>
                </div>
            </div>
          <!-- fin col -->
          
        </div>
           
            <!-- col -->
            <div class="col-md-6 col-sm-16 col-xs-12 card-body" v-for="pro in propietario">
                  <div class="card-header" style="border: none;">
                      <h3>Información básica</h3>
                  </div>

                  <div class="form-group">
                      <label style="float:left">Nombre.</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-user"></i></span>
                          </div>
                          <label class="form-control">@{{pro.nombre}}</label>
                      </div>
                  </div>
                  <div class="form-group">
                      <label style="float:left">Apellidos</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-user"></i></span>
                          </div>
                          <label class="form-control">@{{pro.apellidop}} @{{pro.apellidom}}</label>
                      </div>
                  </div>
            </div>
            <!-- fin del col -->
    </div>
<!-- ------------------------------------------------------------------------------------------------- -->
        <!-- inicio del row  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 card-header" style="border: none;">
                <h3>Información general</h3>
            </div>
            <!-- col       -->
            <div class="col-md-6 col-sm-16 col-xs-12 card-body" v-for="pro in propietario">
                

                <div class="form-group">
                    <label style="float:left">Calle.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                        </div>
                        <label class="form-control">@{{pro.calle}}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label style="float:left">Cruzamiento.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                        </div>
                        <label class="form-control">@{{pro.cruzamientos}}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label style="float:left">Localidad.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                        </div>
                        <label class="form-control">@{{pro.localidad}}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label style="float:left">Municipio.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                        </div>
                        <label class="form-control">@{{pro.municipio}}</label>
                    </div>
                </div>

            </div>
            <!-- fin del col -->
            <!-- col -->
            <div class="col-md-6 col-sm-16 col-xs-12 card-body" v-for="pro in propietario">
               
                <div class="form-group">
                    <label style="float:left">Edad.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                        </div>
                        <label class="form-control">@{{pro.edad}}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label style="float:left">Sexo.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                        </div>
                        <label class="form-control">@{{pro.sexo}}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label style="float:left">CURP.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-text-width"></i></span>
                        </div>
                        <label class="form-control">@{{pro.curp}}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label style="float:left">Teléfono.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                        </div>
                        <label class="form-control">@{{pro.celular}}</label>
                    </div>
                </div>            

            </div>
            <!-- fin del col -->
        </div>
        <!--fin del row-->
                
<!-- --------------------------------------------------------------------------------------- -->

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
                    <label>Nombre de usuario:</label><input type="text" maxlength="15" placeholder="Nombre de Usuario" class="form-control" v-model="nombre_usuario" required onkeypress="return soloLetras(event);">
                    <label>Contraseña:</label><input type="text" maxlength="15" placeholder="Contraseña" class="form-control" v-model="password">
                    <label>CURP:</label><input type="text" placeholder="CURP" class="form-control" v-model="curp" maxlength="18">
                  </div>
                  <!-- fin col -->
                  <!-- col -->
                  <div class="col-md-6 col-xs-6">
                    <label>Nombre:</label><input type="text" maxlength="30" placeholder="Nombre" class="form-control" v-model="nombre" required onkeypress="return soloLetras(event);">
                    <label>Apellido Paterno:</label><input maxlength="15" type="text" placeholder="Apellido Paterno" class="form-control" v-model="apellidop" required onkeypress="return soloLetras(event);">
                    <label>Apellido Materno:</label><input maxlength="15" type="text" placeholder="Apellido Materno" class="form-control" v-model="apellidom" required onkeypress="return soloLetras(event);">                    
                  </div>
                  <!-- fin col -->
                </div>
                <!-- fin del row -->
                <!-- inicio del row -->
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <label>Edad:</label><input type="text" maxlength="2" placeholder="Edad" class="form-control" v-model="edad" onkeypress="return soloNumeros(event);" required>
                    <label>Sexo: (F o M)</label><input type="text" placeholder="Sexo" class="form-control" v-model="sexo" required onkeypress="return soloLetras(event);" maxlength="1">
                    <label>Teléfono:</label><input type="text" maxlength="10" placeholder="Celular" class="form-control" v-model="celular" onkeypress="return soloNumeros(event);" required>
                    
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <label>Calle:</label><input type="text" maxlength="3" placeholder="Calle" class="form-control" v-model="calle" onkeypress="return soloNumeros(event);" required>
                    <label>Cruzamientos:</label><input type="text" maxlength="10" placeholder="Cruzamiento" class="form-control" v-model="cruzamientos">
                    <label>Localidad:</label><input type="text" maxlength="25" placeholder="Localidad" class="form-control" v-model="localidad" required onkeypress="return soloLetras(event);">
                    
                  </div>
                </div>
                <!-- fin del row -->
                <!-- row -->
                <div class="row">
                  <div class="col-md-6-col-xs-6">
                    <label>Municipio:</label><input type="text" maxlength="25" placeholder="Municipio" class="form-control" v-model="municipio" required onkeypress="return soloLetras(event);">            
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
