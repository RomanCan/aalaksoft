// function init(){
	var route= document.querySelector("[name=route]").value;
	var urlUsuario = route + '/apiUsuario';
new Vue({//declaramos una nueva instancia de vue
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		}
	},
	el:'#usuario',//este es la zona de actuar de vue (id)
	created:function(){
		this.getUsuario();
	},
	data:{
		usuarios:[],
		usuario:'',
        password:'',
        nombre:'',
        apellidop:'',
        apellidom:'',
        edad:'',
        sexo:'',
        curp:'',
        telefono:'',
        calle:'',
        cruzamiento:'',
        localidad:'',
        municipio:'',
        id_rol:'',
        // id_usuario:'',
        ida:''
		// editando:false,
	},
	methods:
		{
			getUsuario:function()
			{
				this.$http.get(urlUsuario)
				.then(function(response){
						this.usuarios=response.data;
				}).catch(function(response){
						console.log(response);
				});
			},


			showModal:function(){
				$('#add_usuario').modal('show');
			},
			editarUsuario:function(id){
				this.$http.get(urlUsuario + '/' + id)
				.then(function(json){
					this.id_rol=json.data.id_rol,
					this.usuario=json.data.usuario,
			        this.password=json.data.password,
			        this.nombre=json.data.nombre,
			        this.apellidop=json.data.apellidop,
			        this.apellidom=json.data.apellidom,
			        this.edad=json.data.edad,
			        this.sexo=json.data.sexo,
			        this.curp=json.data.curp,
			        this.telefono=json.data.telefono,
			        this.calle=json.data.calle,
			        this.cruzamiento=json.data.cruzamiento,
			        this.localidad=json.data.localidad,
					this.municipio=json.data.municipio,
					this.activo=json.data.activo,
			        this.ida=json.data.id_usuario
			        $('#add_usuario').modal('show');
				});
			},
			actualizarUsuario:function(){
				var u={
					// id_usuario:this.id_usuario,
					id_rol:this.id_rol,
					usuario:this.usuario,
			        password:this.password,
			        nombre:this.nombre,
			        apellidop:this.apellidop,
			        apellidom:this.apellidom,
			        edad:this.edad,
			        sexo:this.sexo,
			        curp:this.curp,
			        telefono:this.telefono,
					calle:this.calle,
					activo:this.activo,
			        cruzamiento:this.cruzamiento,
			        localidad:this.localidad,
			        municipio:this.municipio
				};
				this.$http.patch(urlUsuario+'/'+this.ida,u)
				.then(function(json){
					Swal.fire({
						position: 'center',
						type: 'success',
						title: 'Guardado exitosamente',
						showConfirmButton: false,
						timer: 1500
					  })
					this.getUsuario();
					$('#add_usuario').modal('hide');
				}).catch(function(json){
					Swal.fire({
						position: 'center',
						type: 'error',
						title: 'Ha ocurrido un error',
						text: 'verifique sus datos',
					  })
					console.log(json);
				});
			},

		}
})
// fin del init
// window.onload = init;
