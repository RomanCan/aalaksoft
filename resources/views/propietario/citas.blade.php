@extends('layouts.masterpropietario')
@section('contenido')
<div id='cita'>
    <div class="container" align="center">
        <h2>Mascota |<small> Citas</small></h2>
        <button class="btn btn-outline-primary btn-block" @click="showModal()">Agregar</button>
        <div class="table-responsive row">
            <div class="col-md-10 col-xs-12">
                <table class="table table-striped" align="center">
                    <thead>
                       <th>Propietario</th>
                       <th>Mascota</th>
                       <th>Descripcion</th>
                       <th>Fecha de la cita</th>
                       <th>Opcion</th>
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
                           <h4 class="modal-title" v-if="!editar">Agregar Nuevo</h4>
                           <h4 class="modal-title" v-if="editar">Editar</h4>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" @click="">x</span></button>
                            <p></p>
                        </div>
                        <div class="modal-body">
                            <!-- <select class="form-control" v-model="nombre_usuario">
                                <option v-for="n in propietarios" v-bind:value="n.nombre_usuario">@{{n.nombre}}</option>
                            </select> -->
                            <label>Seleccione a su mascota</label>
                            <select class="form-control" v-model="id_mascota">
                                <option v-for="m in mascotas" v-bind:value="m.id_mascota">@{{m.nombre}}</option>
                            </select>
                            <label >Descripcion</label>
                            <input class="form-control" type="text" placeholder="Descripcion" v-model="descripcion">
                            <input class="form-control" type="date" placeholder="Fecha" v-model="fecha_cita">
                            
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
