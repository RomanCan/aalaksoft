




<div class="col-md-6 col-sm-16 col-xs-12 card-body" v-for="u in usuarios">
        <div class="card-header">
            <h3>Informacion de la sesion</h3>
        </div>
        
        <div class="form-group">
            <label style="float:left">Edad.</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <label class="form-control">@{{u.edad}}</label>
            </div>
        </div>

        <div class="form-group">
            <label style="float:left">Sexo.</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <label class="form-control">@{{u.sexo}}</label>
            </div>
        </div>
        <div class="form-group">
            <label style="float:left">Curp.</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <label class="form-control">@{{u.curp}}</label>
            </div>
        </div>

        <div class="form-group">
            <label style="float:left">Telefono.</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <label class="form-control">@{{u.telefono}}</label>
            </div>
        </div>
        
</div>