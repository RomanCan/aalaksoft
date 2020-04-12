var route= document.querySelector("[name=route]").value;
var urlMascota=route+'/apiMascota';
var urlFoto=route+'/apiFotoMascota';
var urlEspecie=route+'/apiEspecie';
var urlGenero=route+'/apiGenero';

new Vue({
	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}
   	},
	el:"#mascota",
	created:function(){
		this.getDatos();
		this.getEspecie();
		this.getGenero();
	},
	mounted:function(){
		this.clavePropietario();
	},
	data:{
		id_session:'',

		genero:[],
		mascota:[],
		especie:[],
		propietario:[],
		nombre_usuario:'',
		id_especie:'',
		id_genero:'',
		id_propietario:'',
		// id_mascota:'',
		nombre:'',
		genero:'',
		raza:'',
		fecha_nac:'',
		color:'',
		observaciones:'',
		foto:'',
		preview:'',
		auxId:'',
		editando:false
	},
	methods:
	{
		alSeleccionar(event){
			this.foto=event.target.files[0];
			//console.log(this.foto);
			this.preview=URL.createObjectURL(this.foto);
		},
		clavePropietario:function(){
			 this.id=this.id_session;
		},
		getEspecie:function(){
			this.$http.get(urlEspecie)
			.then(function(json){
				this.especie=json.data;
			}).catch(function(json){
				console.log(json);
			});
		},
		getGenero:function(){
			this.$http.get(urlGenero)
			.then(function(json){
				this.genero=json.data;
			}).catch(function(json){
				console.log(json);
			});
		},
		getDatos:function()
		{
			this.$http.get(urlMascota).then(
				function(json)
			{
				this.mascota=json.data;
			}
			).catch(function(json){
				console.log(json);
			});
		},
		showModal:function(){
			$('#datos').modal('show');
		},
		salir:function(){
				this.id_mascota='';
				this.nombre='';
				this.id_genero='';
				this.raza='';
				this.id_especie='';
				this.fecha_nac='';
				this.color='';
				this.observaciones='';
				this.foto='';
		},
		agregarMascota:function(){			
				var data = new FormData();
				// data.append('foto',this.foto);
				data.append('nombre_usuario',this.id_session);
				data.append('id_mascota',this.auxId);
				data.append('nombre',this.nombre);
				data.append('id_genero',this.id_genero);
				data.append('raza',this.raza);
				data.append('id_especie',this.id_especie);
				data.append('id_genero',this.id_genero);
				data.append('fecha_nac',this.fecha_nac);
				data.append('color',this.color);
				data.append('observaciones',this.observaciones);

				var config={
					header:{'Content-Type':'image/jpg'}
				}

			this.$http.post(urlMascota,data,config)
			.then(function(response){
				
				$('#datos').modal('hide');
				Swal.fire({
					position: 'center',
					type: 'success',
					title: 'Guardado exitosamente',
					showConfirmButton: false,
					timer: 1500
				  })
				this.getDatos();

				// window.location.reload();

			}).catch(function(response){
				Swal.fire({
					position: 'center',
					type: 'error',
					title: 'Ha ocurrido un error',
					text: 'Verifique sus datos',
				})
				console.log(response);
			});

		},
		editarMascota:function(id){
			this.editando = true;
			this.$http.get(urlMascota + '/' + id)
			.then(function(json){
				this.nombre_usuario = json.data.nombre_usuario
				this.nombre = json.data.nombre
				this.id_genero = json.data.id_genero
				this.raza = json.data.raza
				this.id_especie = json.data.id_especie
				this.fecha_nac = json.data.fecha_nac
				this.color = json.data.color
				this.observaciones = json.data.observaciones
				// this.foto = json.data.foto
				this.auxId = json.data.id_mascota
				$('#datos').modal('show');

			});
		},
		actualizarDatos:function(){
			var mascota={
				nombre_usuario:this.id_session,
				// id_mascota:this.id_mascota,
				nombre:this.nombre,
				id_genero:this.id_genero,
				raza:this.raza,
				id_especie:this.id_especie,
				fecha_nac:this.fecha_nac,
				color:this.color,
				observaciones:this.observaciones,
				// foto:this.foto,
			};

			console.log(mascota);
			this.$http.patch(urlMascota + '/' + this.auxId,mascota)
			.then(function(json){
				this.nombre_usuario='';
				$('#datos').modal('hide');
				Swal.fire({
					position: 'center',
					type: 'success',
					title: 'Guardado exitosamente',
					showConfirmButton: false,
					timer: 1500
				  })
				
				this.getDatos();
				
			}).catch(function(json){
				Swal.fire({
					position: 'center',
					type: 'error',
					title: 'Ha ocurrido un error',
					text: 'Verifique sus datos',
				})
			});
				this.nombre='';
				this.id_genero='';
				this.raza='';
				this.id_especie='';
				this.id_genero='';
				this.fecha_nac='';
				this.color='';
				this.observaciones='';
				this.foto='';
			this.editando=false;
		},
		efoto:function(id){
			this.$http.get(urlMascota+'/'+id)
			.then(function(json){
				this.getDatos();
				this.auxId = json.data.id_mascota;
				$('#fotos').modal('show');
			})
		},
		actualizarF:function(){
			var data = new FormData();
			data.append('foto',this.foto);
			data.append('id_mascota',this.auxId);

			var config={
				header:{'Content-Type':'image/jpg'}
			}

			this.$http.post(urlFoto,data,config)
			.then(function(json){
				console.log(json);
				$('#datos').modal('hide');
				Swal.fire({
					position: 'center',
					type: 'success',
					title: 'Guardado exitosamente',
					showConfirmButton: false,
					timer: 1500
				  })
				this.getDatos();
				
				//Recarga la página window.location.reload();
				window.location.reload();
			})
			.catch(function(json){
				Swal.fire({
					position: 'center',
					type: 'error',
					title: 'Ha ocurrido un error',
					text: 'Verifique sus datos',
				})
				console.log(json)
			})


		}
	}
})
