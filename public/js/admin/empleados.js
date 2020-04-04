var route = document.querySelector("[name=route]").value;
var urlEmpleado = route+'/apiEmpleado';
var urlDesactivado = route+'/apiEmpleadoDesactivado';
new Vue({
	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}  
   	},
	el:'#empleado',
	data:{
		desactivados:[],
		empleados:[],
		usuario:'',
		password:'',
		nombre:'',
		apellidop:'',
		apellidom:'',
		email:'',
		telefono:'',
		curp:'',
		sexo:'',
		edad:'',
		calle:'',
		cruzamiento:'',
		localidad:'',
		municipio:'',
		editar:false,
		activo:'',
		activoo:0,
		activar:1,
		ida:''
	},
	created:function(){
		this.getEmpleado();
		this.getDesactivado();
	},
	methods:{
		getEmpleado:function(){
			this.$http.get(urlEmpleado)
			.then(function(json){
				this.empleados = json.data;
			});
		},
		getDesactivado:function(){
			this.$http.get(urlDesactivado)
			.then(function(json){
				this.desactivados = json.data;
			})
		},
		showModal:function(){
			$('#e').modal('show');
		},
		agregarE:function(){
			var e = {
				usuario:this.usuario,
				password:this.password,
				nombre:this.nombre,
				apellidop:this.apellidop,
				apellidom:this.apellidom,
				email:this.email,
				telefono:this.telefono,
				curp:this.curp,
				sexo:this.sexo,
				edad:this.edad,
				calle:this.calle,
				cruzamiento:this.cruzamiento,
				localidad:this.localidad,
				municipio:this.municipio
			};
			this.$http.post(urlEmpleado,e)
			.then(function(json){
				this.getEmpleado();
				Swal.fire({
				  position: 'center',
				  type: 'success',
				  title: 'Guardado exitosamente',
				  showConfirmButton: false,
				  timer: 1500
				})
				$('#e').modal('hide');
			}).catch(function(json){
				console.log(json);
			});
		},
		editarE:function(id){
			this.editar=true;
			this.$http.get(urlEmpleado+'/'+id)
			.then(function(json){
				this.nombre=json.data.nombre
				this.apellidop=json.data.apellidop
				this.apellidom=json.data.apellidom
				this.email=json.data.email
				this.telefono=json.data.telefono
				this.curp=json.data.curp
				this.sexo=json.data.sexo
				this.edad=json.data.edad
				this.calle=json.data.calle
				this.cruzamiento=json.data.cruzamiento
				this.localidad=json.data.localidad
				this.municipio=json.data.municipio
				this.activo = json.data.activo
				this.ida=json.data.id_usuario
				$('#e').modal('show');
			});
		},
		actualizarE:function(){
			var ee={
				nombre:this.nombre,
				apellidop:this.apellidop,
				apellidom:this.apellidom,
				email:this.email,
				telefono:this.telefono,
				curp:this.curp,
				sexo:this.sexo,
				edad:this.edad,
				calle:this.calle,
				cruzamiento:this.cruzamiento,
				localidad:this.localidad,
				municipio:this.municipio,
				activo : this.activar
			};
			this.$http.patch(urlEmpleado +'/'+this.ida,ee)
			.then(function(json){
				this.getEmpleado();
			});
			this.editar=false;
			$('#e').modal('hide');
				Swal.fire({
				  position: 'center',
				  type: 'success',
				  title: 'Actualizado exitosamente',
				  showConfirmButton: false,
				  timer: 1500
				})
		},
		// desactivar empleado
		eliminarE:function(id){
			this.$http.get(urlEmpleado+'/'+id)
			.then(function(json){
				this.nombre=json.data.nombre
				this.apellidop=json.data.apellidop
				this.apellidom=json.data.apellidom
				this.email=json.data.email
				this.telefono=json.data.telefono
				this.curp=json.data.curp
				this.sexo=json.data.sexo
				this.edad=json.data.edad
				this.calle=json.data.calle
				this.cruzamiento=json.data.cruzamiento
				this.localidad=json.data.localidad
				this.municipio=json.data.municipio
				this.ida=json.data.id_usuario
				// $('#e').modal('show');
			});
			Swal.fire({
			  title: "¿Desea Desactivarlo?",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Si,Desactivalo',
			  cancelButtonText:'No,Cancelar',
			}).then((result) => {
			  if (result.value) {
			  	var a ={
			  		nombre:this.nombre,
					apellidop:this.apellidop,
					apellidom:this.apellidom,
					email:this.email,
					telefono:this.telefono,
					curp:this.curp,
					sexo:this.sexo,
					edad:this.edad,
					calle:this.calle,
					cruzamiento:this.cruzamiento,
					localidad:this.localidad,
					municipio:this.municipio,
			  		activo : this.activoo
			  	}
			  	this.$http.patch(urlEmpleado +'/'+id,a)
			  	.then(response=>{
			  		console.log(response);
				  		Swal.fire(

				      	'Ha sido eliminado exitosamente',
				      	'',
				      	'success'
				    )
				  		window.location.reload();
				  	// this.getEmpleado();
			  	}).catch(function(json){
			  		console.log(json);
			  	})

			 //    .then(function(json){
				// 	this.getArticulos();
				// });

			  }
			})
		},
		// actualizacion de datos de empleados desactivados

		actualizarDes:function(id){
			this.$http.get(urlEmpleado+'/'+id)
			.then(function(json){
				this.nombre=json.data.nombre
				this.apellidop=json.data.apellidop
				this.apellidom=json.data.apellidom
				this.email=json.data.email
				this.telefono=json.data.telefono
				this.curp=json.data.curp
				this.sexo=json.data.sexo
				this.edad=json.data.edad
				this.calle=json.data.calle
				this.cruzamiento=json.data.cruzamiento
				this.localidad=json.data.localidad
				this.municipio=json.data.municipio
				this.activo=json.data.activo
				// this.ida=json.data.id_usuario
				// $('#e').modal('show');
			});
			Swal.fire({
			  title: "¿Desea Desactivarlo?",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Si,Desactivalo',
			  cancelButtonText:'No,Cancelar',
			}).then((result) => {
			  if (result.value) {
			  	var b ={
			  		nombre:this.nombre,
					apellidop:this.apellidop,
					apellidom:this.apellidom,
					email:this.email,
					telefono:this.telefono,
					curp:this.curp,
					sexo:this.sexo,
					edad:this.edad,
					calle:this.calle,
					cruzamiento:this.cruzamiento,
					localidad:this.localidad,
					municipio:this.municipio,
			  		activo : this.activar
			  	}
			  	this.$http.patch(urlEmpleado +'/'+id,b)
			  	.then(response=>{
			  		console.log(response);
				  		Swal.fire(

				      	'Ha sido eliminado exitosamente',
				      	'',
				      	'success'
				    )
				  	window.location.reload();
				  	// this.getEmpleado();
			  	}).catch(function(json){
			  		console.log(json);
			  	})

			 //    .then(function(json){
				// 	this.getArticulos();
				// });

			  }
			})
		},

		// fin de empleados desactivados

		salir:function(){
			this.editar=false;
				this.nombre='';
				this.apellidop='';
				this.apellidom='';
				this.email='';
				this.telefono='';
				this.curp='';
				this.sexo='';
				this.edad='';
				this.calle='';
				this.cruzamiento='';
				this.localidad='';
				this.municipio='';
				$('#e').modal('hide');
		}
	}
})