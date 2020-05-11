@extends('layouts.masterpropietario')
@section('contenido')

<div id='cita'>
    <div class="d-none">
    @{{id_session="{!!Session::get('nombre_usuario')!!}"}}
    </div>
    <div class="container" align="center">
        <h2>Mascota |<small> Citas</small></h2><br>
        <button class="btn btn-outline-primary btn-block" @click="showModal()">Agregar</button><br>
        <div class="table-responsive row">
            <div class="col-md-10 col-xs-12">
                <table class="table table-striped table-borderless table-hover" align="center">
                    <thead class="thead-dark">
                       <th>Propietario</th>
                       <th>Mascota</th>
                       <th>Descripción</th>
                       <th>Fecha de la cita</th>
                       <th>Opción</th>
                    </thead>
                    <tbody>
                        <tr v-for="(c,index) in citas">
                            <td>@{{c.propietario.nombre}}</td>
                            <td>@{{c.mascota.nombre}}</td>
                            <td>@{{c.descripcion}}</td>
                            <td>@{{c.fecha_cita}}</td>
                            <td>
                                <span class="btn btn-outline-success " @click="editarC(c.id_cita)"><i class="fas fa-edit"></i></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
           
        </div>
        <div class="row">
           <div class="col-md-10 col-xs-12">
                <div class="modal fade" tabindex="-1" role="dialog" id="add_c">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="background: #2387FF; color: #fff">
                           <h4 class="modal-title" v-if="!editar">Agregar nuevo</h4>
                           <h4 class="modal-title" v-if="editar">Editar</h4>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" @click="">x</span></button>
                            <p></p>
                        </div>
                        <div class="modal-body">
                            
                            <label>Seleccione a su mascota</label>
                            <select class="form-control" v-model="id_mascota">
                                <option v-for="m in mascotas" v-bind:value="m.id_mascota">@{{m.nombre}}</option>
                            </select>
                            <label >Descripción</label>
                            <input class="form-control" type="text" placeholder="Razón de la cita" v-model="descripcion"><br>
                            <label>Fecha de la cita</label><input class="form-control" type="date" placeholder="Fecha de la cita" v-model="fecha_cita">
                            
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-default" data-dismiss="modal" v-on:click="salir"> Cancelar</button> -->
                            <button class="btn btn-primary" @click="agregarC()" v-if="!editar">Guardar</button>
                            <button class="btn btn-primary" @click="actualizarC()" v-if="editar">Actualizar</button>
                            
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal --> 
            </div> 
        </div>
        
    </div>
</div>

@endsection
@push('scripts')
    <script src="js/cliente/cita.js"></script>
@endpush
<input type="hidden" name="route" value="{{url('/')}}">
