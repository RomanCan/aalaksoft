var route= document.querySelector("[name=route]").value;
var urlRegistros = route+'/apiVenta';
var urlDetalles = route+'/apiDetalle';
new Vue({
    el:'#registro',
    data:{
        ventas:[],
        detalles:[]
    },
    created:function(){
        this.getVentas();
        this.getDetalles();
    },
    methods:{
        getVentas:function(){
            this.$http.get(urlRegistros)
            .then(function(json){
                this.ventas=json.data;
            });
        },
        getDetalles:function(){
            this.$http.get(urlDetalles)
            .then(function(json){
                this.detalles=json.data;
            });
        }
    }
})