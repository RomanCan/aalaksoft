var route= document.querySelector("[name=route]").value;
var urlLogo = route + '/logo';
//Declaramos una nueva instancia de vue
new Vue({
	http:{
		headers:{
			'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
		},
	},

	el:"#logo",//este es la zona de actuar de vue(id)
	data:{
        logo:'',
        preview:'',
        },
    methods:
	{
		alSeleccionar(event){
			this.logo=event.target.files[0];
			//console.log(this.foto);
			this.preview=URL.createObjectURL(this.logo);
	},
	cargarLogo:function()
		{
			var data = new FormData();
			// this.auxRfc=response.data.rfc;
			// this.rfc= response.data.rfc;
			// data.append('rfc',this.rfc);
			data.append('logo',this.logo);

			var config={
				header:{'Content-Type':'image/jpg'}
			}

			this.$http.post(urlLogo,data,config)
			.then(function(json){
				alert('LOGO AGREGADO');
			})
			.catch(function(json){
				console.log(json)
			})
		}
	}
})