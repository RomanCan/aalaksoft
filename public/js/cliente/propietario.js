var route= document.querySelector("[name=route]").value;
var urlPropietario = route + '/apiPropietario';
new Vue({
	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}  
   	},
	el:'#propietario',


	created:function(){
		this.getPropietario();
	},

	data:{
		propietario:[],
		nombre_usuario:'',
		password:'',
		nombre:'',
		apellidop: '',
		apellidom: '',
		curp: '',
		edad: '',
		celular: '',
		sexo: '',
		calle: '',
		cruzamientos: '',
		localidad: '',
		municipio: '',
		propietarioid: ''
	},

	methods:
	{
		getPropietario:function(){
			this.$http.get(urlPropietario)
			.then(function(response)
				{
					this.propietario = response.data;
				})
			.catch(function(response){
					console.log(response);
				});
		},

		editarPropietario:function(id){
			this.$http.get(urlPropietario + '/' + id)
			.then(function(response){
				// this.id_propietario = response.data.id_propietario
				this.nombre_usuario=response.data.nombre_usuario
				this.password=response.data.password
				this.nombre = response.data.nombre
				this.apellidop = response.data.apellidop
				this.apellidom = response.data.apellidom
				this.curp = response.data.curp
				this.edad = response.data.edad
				this.celular=response.data.celular
				this.sexo = response.data.sexo;
				this.calle = response.data.calle
				this.cruzamientos = response.data.cruzamientos
				this.localidad = response.data.localidad
				this.municipio = response.data.municipio

				this.propietarioid = response.data.nombre_usuario

				$('#add_propietario').modal('show');

			});
		},

		actualizarPropietario:function(id){
			var propietario = {
				// id_propietario:this.id_propietario,
				nombre_usuario:this.nombre_usuario,
				password:this.password,
				nombre:this.nombre,
				apellidop:this.apellidop,
				apellidom:this.apellidom,
				curp:this.curp,
				edad:this.edad,
				celular:this.celular,
				sexo:this.sexo,
				calle:this.calle,
				cruzamientos:this.cruzamientos,
				localidad:this.localidad,
				municipio:this.municipio,
			};

			this.$http.patch(urlPropietario + '/' + this.propietarioid,propietario)
				.then(function(response){
					this.getPropietario();
					console.log(response);
			});
				$('#add_propietario').modal('hide');
				Swal.fire({
				  position: 'center',
				  type: 'success',
				  title: 'Guardado exitosamente',
				  showConfirmButton: false,
				  timer: 1500
				})
			this.nombre_usuario='';
				this.password='';
				this.nombre = '';
				this.apellidop = '';
				this.apellidom = '';
				this.curp = '';
				this.edad = '';
				this.celular='';
				this.sexo = '';
				this.calle = '';
				this.cruzamientos = '';
				this.localidad ='';
				this.municipio ='';
		}
	}
})