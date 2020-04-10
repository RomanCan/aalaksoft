@extends('layouts.mastervend')
@section('contenido')

<!-- <div>
  @{{id_session="{!!Session::get('id_usuario')!!}"}}
</div> -->

<secion id="usuario">
    <div class="container" align="center">
        <hr>
        <h2>Mi perfil</h2><br>
        
        <!-- inicio del row  -->
        <div class="row">
            <div class="col-md-12 col-xs-2" align="left" v-for="u in usuarios">
                <br> 
                <label>Opcion:</label>
                <span class="btn btn-outline-success" @click='editarUsuario(u.id_usuario)'><i class=""></i>Editar</span>
            </div>
            <!-- col       -->
            <div class="col-md-6 col-sm-16 col-xs-12 card-body" v-for="u in usuarios">
                <div class="card-header" style="border: none;">
                    <h3>Informacion de la sesion</h3>
                </div>

                <div class="form-group">
                    <label style="float:left">Nombre de usuario.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <label class="form-control">@{{u.usuario}}</label>
                    </div>
                </div>
                <div class="form-group">
                    <label style="float:left">Contraseña.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <label class="form-control">@{{u.password}}</label>
                    </div>
                </div>

            </div>
            <!-- fin del col -->
                <!-- col -->
            <div class="col-md-6 col-sm-16 col-xs-12 card-body" v-for="u in usuarios">
                <div class="card-header" style="border: none;">
                    <h3>Informacion Basica</h3>
                </div>

                <div class="form-group">
                    <label style="float:left">Nombre.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <label class="form-control">@{{u.nombre}}</label>
                    </div>
                </div>
                <div class="form-group">
                    <label style="float:left">Apellidos</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <label class="form-control">@{{u.apellidop}} @{{u.apellidom}}</label>
                    </div>
                </div>


            </div>
            <!-- fin del col -->
            
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
        </div>
        <!--fin del row-->
    
<!-- -------------------------------------------------- -->
        <!-- inicio del row  -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 card-header" style="border: none;">
                <h3>Informacion general</h3>
            </div>
            <!-- col       -->
            <div class="col-md-6 col-sm-16 col-xs-12 card-body" v-for="u in usuarios">
                

                <div class="form-group">
                    <label style="float:left">Calle.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                        </div>
                        <label class="form-control">@{{u.calle}}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label style="float:left">Cruzamiento.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                        </div>
                        <label class="form-control">@{{u.cruzamiento}}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label style="float:left">Localidad.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                        </div>
                        <label class="form-control">@{{u.localidad}}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label style="float:left">Municipio.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                        </div>
                        <label class="form-control">@{{u.municipio}}</label>
                    </div>
                </div>

            </div>
            <!-- fin del col -->
            <!-- col -->
            <div class="col-md-6 col-sm-16 col-xs-12 card-body" v-for="u in usuarios">
               
                <div class="form-group">
                    <label style="float:left">Edad.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-sort-numeric-up"></i></span>
                        </div>
                        <label class="form-control">@{{u.edad}}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label style="float:left">Sexo.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                        </div>
                        <label class="form-control">@{{u.sexo}}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label style="float:left">Curp.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-text-width"></i></span>
                        </div>
                        <label class="form-control">@{{u.curp}}</label>
                    </div>
                </div>

                <div class="form-group">
                    <label style="float:left">Telefono.</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                        </div>
                        <label class="form-control">@{{u.telefono}}</label>
                    </div>
                </div>            

            </div>
        <!-- fin del col -->
        </div>
        <!--fin del row-->

        <!-- ---------------------------------------------------------------------------- -->

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

        <!-- ---------------------------------------------------------------------------- -->

    </div>
</section>
@endsection
@push('scripts')
   <script src="js/vendedor/usuario.js"></script>
   <script src="js/validacion.js"></script>

@endpush
<input type="hidden" name="route" value="{{url('/')}}">
