var route= document.querySelector("[name=route]").value;
var urlart = route + '/apiArticulo';
var urlventa = route + '/apiVenta';

function init(){
	new Vue({
		http:{
			headers:{
				'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
					}			
		},	
		el:'#ventas',
		data:{
			id_session:'',
			nombre: 'JEILO WORLD',
			producto:[],
			ventas:[],
			codigo:'',
			pago:0,
			tot:0,
			folio:'',
			cantidades:[1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1],
			fecha: moment().format('YYYY-MM-DD')
		},
		created:function(){
			this.folioVenta();
		},
		methods:{
			getProducto:function(){
				this.$http.get(urlart + '/' + this.codigo)
				.then(function(json){
					var venta = {
								'id_articulo':json.data.id_articulo,
								'nombre':json.data.nombre,
								'costo':json.data.costo,
								'cantidad':1,
								'total':json.data.costo
							}
					if(venta.id_articulo){
						this.ventas.push(venta);
					}else{
						Swal.fire({
							position: 'center',
							type: 'error',
							title: 'Ha ocurrido un error',
							text: 'Ingrese sólo el código',
						})
					}
					this.codigo = '';
					this.$refs.buscar.focus();
				})
			}, //Fin getProducto

			eliminarProducto:function(id){
				Swal.fire({
					title: "¿Estás seguro?",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Sí, continuar',
					cancelButtonText:'No, cancelar',
				}).then((result) => {
					if (result.value) {
						this.ventas.splice(id,1);
					}
				})
			},

			// addProd:function(id){
			// 	this.ventas[id].cantidad++;
			// 	this.ventas[id].total = this.ventas[id].cantidad * this.ventas[id].costo;
			// },

			// minusProd:function(id){
			// 	if(this.ventas[id].cantidad>=2)
			// 	this.ventas[id].cantidad--;
			// 	this.ventas[id].total = this.ventas[id].cantidad * this.ventas[id].costo;
			// },
			folioVenta:function(){ 
				this.folio = 'VTA-'+ moment().format('YYMMDDhmmss');
			},
			vender:function(){
				Swal.fire({
					title: "¿Estás seguro?",
					type: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Sí, continuar',
					cancelButtonText:'No, cancelar',
				}).then((result) => {
					if (result.value) {
						if(this.ventas){
							var det= [];
							for (var i =0; i < this.ventas.length; i++) {
								det.push({
									id_articulo:this.ventas[i].id_articulo,
									// nombre:this.ventas[i].nombre,
									precio:this.ventas[i].costo,
									cantidad:this.cantidades[i],
									total:this.ventas[i].costo * this.cantidades[i]
								})
							}
							var ven = {
								folio:this.folio,
								id_usuario:this.id_session,
								total:this.tot,
								detalles: det
							}
							console.log(ven);
			
							this.$http.post(urlventa,ven)
							.then(function(json){
								console.log(json.data);
							}).catch(function(a){
								Swal.fire({
									position: 'center',
									type: 'error',
									title: 'Ha ocurrido un error',
									text: 'Verifique sus datos',
								})
								console.log(a.data);
							});
							window.location.reload();

						}else{
							Swal.fire({
								position: 'center',
								type: 'error',
								title: 'Ha ocurrido un error',
								text: 'No ha agregado artículos',
							})
						}
					}
				})
			}

		},
		// FIN DE METHODS

		computed:{
			total:function(){

				var sum = 0;
				for (var i = 0; i < this.ventas.length; i ++){
					sum = sum + this.cantidades[i] * this.ventas[i].costo;
				}
				return this.tot = sum;
				return sum;
			},

			cambio:function(){
				return this.pago - this.tot;
			},
			totalArt(){
				return (id)=>{
					var total = 0;
					if(this.cantidades[id]!=null)
						total = this.cantidades[id] * this.ventas[id].costo;
					//total con decimal
					return total.toFixed(1);
				}
			}
		}
	});
}

window.onload = init;