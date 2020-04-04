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

			// agregarUsuario:function(){
			// 	//Construyendo un objeto de tipo Json para enviar a la Api
			// 	var registro={nombre_usuario:this.nombre_usuario,
			// 				  apellidop:this.apellidop,
			// 				  apellidom:this.apellidom,
			// 				  nombre:this.nombre,
			// 				  password:this.password};
			// 	//Limpiar campos
			// 	// this.id='';
			// 	this.nombre_usuario='';
			// 	this.apellidop='';
			// 	this.apellidom='';
			// 	this.nombre='';
			// 	this.password='';
			// 	//Para poder entrar al método store necesitamos de un post y se envia al Json
			// 	this.$http.post(urlUsuario,registro).then(function(response){
			// 		this.getUsuario();
			// 		$('#add_usuario').modal('hide');
			// 	});
			// },
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
			        cruzamiento:this.cruzamiento,
			        localidad:this.localidad,
			        municipio:this.municipio
				};
				this.$http.patch(urlUsuario+'/'+this.ida,u)
				.then(function(json){
					this.getUsuario();
					$('#add_usuario').modal('hide');
				}).catch(function(json){
					console.log(json);
				});
			},

		// 	guardarUsuario:function(){
		// 	if (this.nombre_usuario && this.apellidop && this.apellidom && this.nombre  && this.password)
		// 	{
		// 		var data = new FormData();

		// 		data.append('nombre',this.nombre);
		// 		data.append('nombre_usuario',this.nombre_usuario);
		// 		data.append('apellidop',this.apellidop);
		// 		data.append('apellidom',this.apellidom);
		// 		data.append('password',this.password);
		// 		alert('Usuario agregado con éxito');
		// 		// console.log();
			
		// 		this.$http.post(urlUsuario,data)
		// 		.then(function(json){
				
		// 		})
		// 		.catch(function(json){
		// 		console.log(json);
		// 		})

		// 		this.nombre_usuario='';
		// 		this.apellidop='';
		// 		this.apellidom='';
		// 		this.nombre='';
		// 		this.password='';
		// 	}
		// 	else
		// 	{ 
		// 		alert('No deje algún campo vacío');
		// 		return false;
		// 	}
		// }

		}
})
// fin del init
// window.onload = init;
