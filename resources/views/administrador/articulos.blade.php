@extends('layouts.masteradministrador')
@section('contenido')

<div class="container">
  <div id="articulo_cascada">
    <hr><h2 align="center">Productos y Servicios</h2>
          <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                
                <div>
                  <button type="button" class="btn btn-info" @click="showModal()">Agregar +</button>
                </div><br>
                <div>
                  <input type="text" placeholder="Escriba el tipo o nombre de los articulos" v-model="buscar" class="form-control"><hr>
                </div>
            </div>
            <!--     <h3>Tipos</h3>
            <div class="col-md-6 col-xs-12">
                <select class="form-control" v-model="id_tipo" @change="filtroArticulos">
                  <option disabled="">Elija una opcion</option>
                  <option v-for="t in tipos" v-bind:value="t.id_tipo">@{{t.nombre}}</option>
                </select>
              <div class="">
                  
                </div>
            </div> -->
          </div>
     

    <div class="row">
      <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover table-sm">
            <thead class="thead-dark">
              <th>Nombre</th>
              <th>Tipo</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>Opciones</th>
            </thead>
            <tbody>
              <tr v-for="(art,index) in filtro" v-bind:value="art.id_articulo">
                  <!--  v-bind:value="articulo.id_articulo" -->
                <td >@{{art.nombre}}</td>
                <td >@{{art.tipo.nombre}}</td>
                <td >$ @{{art.costo}}</td>
                <td >@{{art.cantidad}}</td>
                <td class="btn-group" role="group">
                  <span class="btn btn-outline-success"  @click="editarArticulo(art.id_articulo)"><i class="fas fa-edit"></i></span>

                  <span class="btn btn-outline-danger" @click="eliminarArticulo(art.id_articulo)"><i class="fas fa-trash"></i></span> 
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- <div class="col-md-5 col-xs-12">
        
        <div>
          <table class="table table-bordered table-striped">
            <thead style="background:#AED6F1">
                <th>Nombre</th>
                <th>Precio</th>
            </thead>
            <div class="box box-primary"></div>
            <tbody v-for="i in filtroarticulo" v-bind:value="i.id_articulo" style="background:#D6EAF8">
              <td>@{{i.nombre}}</td>
              <td>@{{i.costo}}</td>
            </tbody>
          </table>
        </div>
      </div> -->
    </div>

    <div class="row">
      <div class="col-md-6 col-xs-12">
        
      </div>
    </div><!-- fin del row -->

    
    <div class="row">
      <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="modal fade" tabindex="-1" role="dialog" id="add_articulo">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header" style="background: #2387FF; color: #fff">
               
                <h4 class="modal-title" v-if="editar" >Editar Articulos</h4>
                 <h4 class="modal-title" v-if="!editar">Guardar Articulo</h4>
                 <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true" @click="salir">x</span></button>
              </div>
              <div class="modal-body" align="center">
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Nombre:</label><input type="text" placeholder="Nombre" v-model="nombre" class="form-control" maxlength="50">
                    <label>Costo ($):</label><input type="text" placeholder="Costo" v-model="costo" class="form-control" maxlength="4" onkeypress="return soloNumeros(event);" required>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-6">
                    <label>Cantidad de articulos:</label><input type="text" placeholder="Cantidad" v-model="cantidad" class="form-control" maxlength="4" onkeypress="return soloNumeros(event);" required>
                    <label>Producto/Servicio</label><select class="form-control" v-model="id_tipo">
                      <!-- <option selected="Seleccione una opcion"></option> -->
                      <option v-for="t in tipos" v-bind:value="t.id_tipo">@{{t.nombre}}</option>
                    </select >
                  </div>
                </div>
                
                

              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-outline-primary" @click="actualizarArticulo()" v-if="editar">Actualizar</button>
                <button type="submit" class="btn btn-outline-primary" @click="agregarArticulo()" v-if="!editar">Guardar</button>
                <!-- <button type="submit" class="btn btn-success" @click="salir">Cancelar</button> -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>    
  </div><!-- fin del vue -->
</div>


@endsection

@push('scripts')
    
    <script src="js/admin/articulo.js"></script>
    <script src="js/validacion.js"></script>
@endpush

<input type="hidden" name="route" value="{{url('/')}}">