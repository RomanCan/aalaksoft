var route= document.querySelector("[name=route]").value;
var urlCita= route+'/apiCita';
var urlProp=route+'/apiPropietario';
var urlMas=route+'/apiMascota';

new Vue({
    http:{
        headers:{
           'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
        }
      },
      el:'#cita',
      data:{
          
          citas:[],
          propietarios:[],
          mascotas:[],
          id_session:'',
          idaux:'',
          nombre_usuario:'',
          id_mascota:'',
          descripcion:'',
          fecha_cita:'',
          editar:false
          
      },
      created:function(){
          this.getCitas();
          this.getPropietario();
          this.getMascota();
      },
      methods: {
          getCitas:function(){
              this.$http.get(urlCita)
              .then(function(json){
                  this.citas=json.data;
              }).catch(function(json){
                  console.log(json);
              });
          },
          getPropietario:function(){
            this.$http.get(urlProp)
            .then(function(json){
              this.propietarios=json.data;
            });
          },
          getMascota:function(){
            this.$http.get(urlMas)
            .then(function(json){
              this.mascotas=json.data;
            });
          },
          showModal:function(){
            $('#add_c').modal('show');
          },
          agregarC:function(){
              var c={
                  nombre_usuario:this.id_session,
                  id_mascota:this.id_mascota,
                  descripcion:this.descripcion,
                  fecha_cita:this.fecha_cita
              };
              this.$http.post(urlCita,c)
              .then(function(json){
                $('#add_c').modal('hide');
                console.log(json.data);
                Swal.fire({
                  position: 'center',
                  type: 'success',
                  title: 'Guardado exitosamente',
                  showConfirmButton: false,
                  timer: 1500
                })
                  this.getCitas();

              }).catch(function(json){
                  console.log(json.data);
              });
                  this.nombre_usuario='';
                  this.id_mascota='';
                  this.descripcion='';
                  this.fecha_cita='';
          },
          editarC:function(id){
            this.editar=true;
            this.$http.get(urlCita+'/'+id)
            .then(function(json){
                $('#add_c').modal('show');
                  this.nombre_usuario=json.data.nombre_usuario,
                  this.id_mascota=json.data.id_mascota,
                  this.descripcion=json.data.descripcion,
                  this.fecha_cita=json.data.fecha_cita,
                  this.idaux=json.data.id_cita
            });
          },
          actualizarC:function(){
            var cc={
                  nombre_usuario:this.id_session,
                  id_mascota:this.id_mascota,
                  descripcion:this.descripcion,
                  fecha_cita:this.fecha_cita
            };
            this.$http.patch(urlCita+'/'+this.idaux,cc)
            .then(function(json){
              $('#add_c').modal('hide');
              Swal.fire({
                  position: 'center',
                  type: 'success',
                  title: 'Guardado exitosamente',
                  showConfirmButton: false,
                  timer: 1500
                })
                  this.getCitas();
            });
            editar=false;
            this.nombre_usuario='';
                  this.id_mascota='';
                  this.descripcion='';
                  this.fecha_cita='';
          },
          prueba:function(){
            Swal.fire({
              position: 'center',
              type: 'success',
              title: 'Guardado exitosamente',
              showConfirmButton: false,
              timer: 1500
            })
          }

      },
})
