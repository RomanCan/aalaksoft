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
			id_usuario:'',
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
					if(venta.id_articulo)
						this.ventas.push(venta);

					this.codigo = '';
					this.$refs.buscar.focus();
				})
			}, //Fin getProducto

			eliminarProducto:function(id){
				this.ventas.splice(id,1);
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
					id_usuario:4,
					total:this.tot,
					detalles: det
				}
				console.log(ven);

				this.$http.post(urlventa,ven)
				.then(function(json){
					console.log(json.data);
				}).catch(function(a){
					console.log(a.data);
				});
				window.location.reload();
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