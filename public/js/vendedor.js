var route= document.querySelector("[name=route]").value;
var urlUsuario = route + '/apiVendedor';

//declaramos una nueva instancia de vue
new Vue({
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
		
		vendedores:[],
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
        ida:''
		// editando:false,
	},
	methods:
		{
			getUsuario:function()
			{
				this.$http.get(urlUsuario)
				.then(function(response){
						this.vendedores=response.data;
				}).catch(function(response){
						console.log(response);
				});
			},


			showModal:function(){
				$('#add_vendedor').modal('show');
			},

			editarUsuario:function(id){
				this.$http.get(urlVendedor + '/' + id)
				.then(function(json){
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
			        $('#add_vendedor').modal('show');
				});
			},
			actualizarUsuario:function(){
				var u={
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
				this.$http.patch(urlVendedor+'/'+this.ida,u)
				.then(function(json){
					this.getUsuario();
					$('#add_vendedor').modal('hide');
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