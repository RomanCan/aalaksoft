new Vue({
	el:'#up',

	data:{
		nombre:'juan'
		 
	},
	created:function(){
		this.getDatos();
	},

	methods:{
		getDatos:function(){
			this.$http.get(urltipo)
			.then(function(json){
				this.tipos=json.data;
			})
		}
	}
})