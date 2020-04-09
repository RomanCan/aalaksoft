var route= document.querySelector("[name=route]").value;
var urlEmpresa = route + '/apiEmpresa';
var urlLogo = route + '/logo';
//DEclaramos una nueva instancia de vue
new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		},
	},
	el:"#empresa",//este es la zona de actuar de vue(id)
	created:function(){
		this.getDatos();
		
	},
	data:{
		empresa:[],
		id_empresa:'',
		rfc:'',
		nombre_empresa:'',
    	direccion: '',
        telefono:'',
        correo:'',
        representante_legal:'',
        horario:'',
        logo:'',
        preview:'',
        auxEmpresa:'',
        auxRfc:''
	},
	methods:
	{
		alSeleccionar(event){
			this.logo=event.target.files[0];
			//console.log(this.foto);
			this.preview=URL.createObjectURL(this.logo);
		},
		getDatos:function()
		{
			this.$http.get(urlEmpresa).then(
				function(response)
			{
				this.empresa=response.data;
			}
			).catch(function(response){
				console.log(response);
			});
		},
		showModal:function(){
			$('#datos').modal('show');
		},
		showM:function(){
			$('#foto').modal('show');
		},
		salir:function(){
				this.rfc='';
				this.nombre_empresa='';
				this.direccion='';
				this.telefono='';
				this.correo='';
				this.representante_legal='';
				this.horario='';
				this.logo='';
		},
		updateDatos:function(){
			var empresa={
				rfc:this.rfc,
				nombre_empresa:this.nombre_empresa,
				direccion:this.direccion,
				telefono:this.telefono,
				correo:this.correo,
				representante_legal:this.representante_legal,
				horario:this.horario,
				// logo:this.logo
			};

			console.log(empresa);
			this.$http.put(urlEmpresa + '/' + this.auxEmpresa,empresa)
			.then(function(json){
				this.getDatos();
				
			});
				$('#datos').modal('hide');
				Swal.fire({
				  position: 'center',
				  type: 'success',
				  title: 'Guardado exitosamente',
				  showConfirmButton: false,
				  timer: 1500
				})
				this.rfc='';
				this.nombre_empresa='';
				this.direccion='';
				this.telefono='';
				this.correo='';
				this.representante_legal='';
				this.horario='';
				// this.logo='';
		},

		editDatos:function(id){
			
			this.$http.get(urlEmpresa + '/' + id)
			.then(function(response){
				// this.id_empresa=response.data.id_empresa
				// this.auxRfc=response.data.rfc;
				this.rfc= response.data.rfc;
				this.nombre_empresa= response.data.nombre_empresa
				this.direccion=response.data.direccion
				this.telefono= response.data.telefono
				this.correo= response.data.correo
				this.representante_legal= response.data.representante_legal
				this.horario= response.data.horario
				// this.logo= response.data.logo;
				this.auxEmpresa= response.data.id_empresa
				console.log(response);
				$('#datos').modal('show');
			});

		},
		editF:function(id){
			this.$http.get(urlEmpresa+'/'+id)
			.then(function(response){
				
				
				this.auxEmpresa= response.data.id_empresa
				this.rfc=response.data.rfc
				this.logo= response.data.logo
				$('#foto').modal('show');
				console.log(response.data.rfc);
			})
		},		
		cargarLogo:function(id)
		{

			var data = new FormData();
			
			data.append('logo',this.logo);
			data.append('id_empresa',this.auxEmpresa);

			var config={
				header:{'Content-Type':'image/jpg'}
			}

			this.$http.post(urlLogo,data,config)
			.then(function(json){
				Swal.fire({
					position: 'center',
					type: 'success',
					title: 'Guardado exitosamente',
					showConfirmButton: false,
					timer: 1500
				  })
				$('#foto').modal('hide');
				window.location.reload();
			})
			.catch(function(json){
				console.log(json)
			})


		}
	}
})