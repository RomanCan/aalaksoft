var route= document.querySelector("[name=route]").value;
var urlP=route+'/apiPropietario';
new Vue({
	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}  
   	},
	el:'#user',
	data:{
		// id_rol:''
   		nombre_usuario:'',
   		password:'',
   		nombre:'',
   		apellidop:'',
   		apellidom:''
	},
	methods:{
		showModal:function(){
			$('#add_u').modal('show');
		},
		agregarU:function(){
			var u={
				// id_rol:this.id_rol,
   				nombre_usuario:this.nombre_usuario,
   				password:this.password,
   				nombre:this.nombre,
   				apellidop:this.apellidop,
   				apellidom:this.apellidom
			};
			this.$http.post(urlP,u)
			.then(function(json){
				console.log(json);
				$('#add_u').modal('hide');
        Swal.fire({
          position: 'center',
          type: 'success',
          title: 'Guardado exitosamente',
          showConfirmButton: false,
          timer: 1500
        })
			}).catch(function(json){
				console.log(json);
			});
				// this.id_rol='';
   				this.nombre_usuario='';
   				this.password='';
   				this.nombre='';
   				this.apellidop='';
   				this.apellidom='';
   				
		},
		salir:function(){
			$('#add_u').modal('hide');
				// this.id_rol='';
   				this.nombre_usuario='';
          this.password='';
          this.nombre='';
          this.apellidop='';
          this.apellidom='';
		}
	}
})