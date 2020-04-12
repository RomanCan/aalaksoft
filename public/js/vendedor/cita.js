var route= document.querySelector("[name=route]").value;
var urlCita= route+'/apiCitas';

new Vue({
    http:{
        headers:{
           'X-CSRF-TOKEN':document.querySelector('#token').getAttribute('value')
        }
      },
      el:'#citas',
      data:{
          nombre:'holamundo',
          citas:[]
          
      },
      created:function(){
          this.getCitas();
          
      },
      methods: {
          getCitas:function(){
              this.$http.get(urlCita)
              .then(function(json){
                  this.citas=json.data;
              }).catch(function(json){
                  console.log(json);
              });
          }
      },
})
