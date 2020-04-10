var route= document.querySelector("[name=route]").value;
var urltipo= route + '/apiTipo';
var urlart= route + '/filtroArticulo/';
var urlallart= route+ '/apiArticulo';
new Vue({
	http:{
     	headers:{
        	'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
     	}
   	},
	el:'#articulo_cascada',

	data:{
		buscar:'',
		cantidad:'',
		tipos:[],
		filtroarticulo:[],
		articulos:[],
		articuloid:'',
		// id_articulo:'',
		id_tipo:'',
		nombre:'',
		costo:'',
		editar:false
	},
	created:function(){
		this.getTipos();
		this.getArticulos();
	},

	methods:{

		getTipos:function(){
			this.$http.get(urltipo)
			.then(function(json){
				this.tipos=json.data;
			}).catch(function(response){
					console.log(json);
			});
		},
		filtroArticulos(event){
				var id=event.target.value;
				if (id){
				this.$http.get(urlart + id)
				.then(function(json){
					// console.log(json);
					this.filtroarticulo=json.data
				});
			}
		},

		getArticulos:function(){
			this.$http.get(urlallart)
			.then(function(json){
				this.articulos=json.data;
			})
		},
		showModal:function(){
			$('#add_articulo').modal('show');
		},
		editarArticulo:function(id){
			this.editar=true;
			this.$http.get(urlallart +'/'+ id)
			.then(function(response){
				// console.log(response);
				this.id_articulo=response.data.id_articulo
				this.nombre=response.data.nombre
				this.costo=response.data.costo
				this.cantidad=response.data.cantidad
				this.id_tipo=response.data.id_tipo

				this.articuloid=response.data.id_articulo
				$('#add_articulo').modal('show');
			});

		},

		actualizarArticulo:function(){
			var art={
				id_articulo:this.id_articulo,
				nombre:this.nombre,
				costo:this.costo,
				cantidad:this.cantidad,
				id_tipo:this.id_tipo
			};
			this.$http.patch(urlallart + '/' + this.articuloid,art)
			.then(function(response){
				this.getArticulos();
				// console.log(response);
			}).catch(function(response){

			});
			this.editar=false;
			// $('#add_articulo').modal('hide');
			Swal.fire({
				  position: 'center',
				  type: 'success',
				  title: 'Guardado exitosamente',
				  showConfirmButton: false,
				  timer: 1500
				})
			this.nombre='';
			this.costo='';
			this.cantidad='';
			this.id_tipo='';
			$('#add_articulo').modal('hide');
		},

		agregarArticulo:function(id){
			var articulo={
				// id_articulo:this.id_articulo,
				nombre:this.nombre,
				costo:this.costo,
				cantidad:this.cantidad,
				id_tipo:this.id_tipo
			};
			this.nombre='';
			this.costo='';
			this.cantidad='';
			this.id_tipo='';

			//para poder guardar se necesita del metodo post
			this.$http.post(urlallart,articulo)
			.then(function(response){
				$('#add_articulo').modal('hide');

				Swal.fire({
				  position: 'center',
				  type: 'success',
				  title: 'Guardado exitosamente',
				  showConfirmButton: false,
				  timer: 1500
				})


				this.getArticulos();
			});
		},
		eliminarArticulo:function(id){
			Swal.fire({
			  title: "No podras revertir este cambio!,¿Estas seguro?",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Si,borralo',
			  cancelButtonText:'No,cancelar',
			}).then((result) => {
			  if (result.value) {
			  	this.$http.delete(urlallart +'/'+id).then(response=>{
				  		Swal.fire(

				      	'Ha sido eliminado exitosamente',
				      	'',
				      	'success'
				    )
				  	this.getArticulos();
			  	}).catch(function(json){
					Swal.fire({
						position: 'center',
						type: 'error',
						title: 'Ha ocurrido un error',
						text: 'verifique sus datos',
					  })
			  		console.log(json);
			  	})

			 //    .then(function(json){
				// 	this.getArticulos();
				// });

			  }
			})


		},
		salir:function(){
			this.editar=false;
			this.nombre = '';
			this.costo='';
			this.cantidad='';
			this.id_tipo = '';
				$('#add_empleados').modal('hide');
		}
	},
	computed:{
		filtro:function(){
			return this.articulos.filter((articulo)=>{
				return articulo.tipo.nombre.match(this.buscar.trim())
				|| articulo.nombre.toLowerCase().match(this.buscar.trim().toLowerCase());
			});
		}
	}

});
