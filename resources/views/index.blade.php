@extends('layouts.master')
@section('contenido')
    <link rel="stylesheet" type="text/css" href="css/galeria.css">
    <section class="project">
            <div class="text">
                <h2>Productos y Servicios</h2>
                <h4>La veterinaria cuenta con</h4>
            </div>
        	<div class="contenedor-gal">
        			<div class="contenedor-tarjeta">
        				<figure>
        					<img src="img/galeria/alimento1.jpg" class="imag frontal imag4">
        						<figcaption class="trasera">
        							<h2 class="titulo">Alimentos</h2>
        							<hr>
        							<p>
        								Podrás encontrar una gran variedad de piensos de las principales marcas 
        								del mercado para conseguir que tu mascotas lleve una dieta sana y equilibrada.
        							</p>
        						</figcaption>
        				</figure>
        			</div>
        			<div class="contenedor-tarjeta">
        				<figure>
        					<img src="img/galeria/cirugias2.jpg" class="imag frontal">
        						<figcaption class="trasera">
        							<h2 class="titulo">Cirugías</h2>
        							<hr>
        							<p>
        								Contamos con quirófano equipado con la instrumentación suficiente para la 
        								práctica de cirugías y monitores en donde se puede visualizar constantemente a
        								 las mascotas. 
        							</p>
        						</figcaption>
        				</figure>
        			</div>
        			<div class="contenedor-tarjeta">
        				<figure>
        					<img src="img/galeria/consultas1.png" class="imag frontal">
        						<figcaption class="trasera">
        							<h2 class="titulo">Consultas</h2>
        							<hr>
        							<p>
        								Cuenta con médicos veterinarios expertos en diferentes disciplinas y con la metodología necesaria para llegar a los diagnósticos que permitan enfocar los tratamientos de manera eficiente y oportuna, siguiendo a detalle el expediente clínico.
        							</p>
        						</figcaption>
        				</figure>
        			</div>
        			<div class="contenedor-tarjeta">
        				<figure>
        					<img src="img/galeria/desparasitacion1.jpg" class="imag frontal">
        						<figcaption class="trasera">
        							<h2 class="titulo">Desparasitación</h2>
        							<hr>
        							<p>
        								Para nosotros la prevención es clave para mantener y mejorar la salud de las mascotas. Y dentro de la prevención, uno de los puntos que consideramos más importantes después de la vacunación es la desparasitación, por ello importantísimo para mantener a nuestras mascotas sanas.
        							</p>
        						</figcaption>
        				</figure>
        			</div>
        			<div class="contenedor-tarjeta">
        				<figure>
        					<img src="img/galeria/estetica3.jpg" class="imag frontal">
        						<figcaption class="trasera">
        							<h2 class="titulo">Estética</h2>
        							<hr>
        							<p>
        								Cuenta con expertos estilistas en el arreglo de todas las razas de perros
        								y gatos, la mascotas son bañadas con agua caliente y los shampoo y jabones
        								de la más alta calidad.
        							</p>
        						</figcaption>
        				</figure>
        			</div>
        			<div class="contenedor-tarjeta">
        				<figure>
        					<img src="img/galeria/prueba1.jpeg" class="imag frontal">
        						<figcaption class="trasera">
        							<h2 class="titulo">Pruebas de laboratorio</h2>
        							<hr>
        							<p>
        								Se cuenta con laboratorio integrado que le permite correr pruebas, lo que
        								facilita la obtención de datos a cualquier hora y en cuestión de minutos.  
        							</p>
        						</figcaption>
        				</figure>
        			</div>
        			<div class="contenedor-tarjeta">
        				<figure>
        					<img src="img/galeria/ropa1.jpg" class="imag frontal">
        						<figcaption class="trasera">
        							<h2 class="titulo">Ropas y accesorios</h2>
        							<hr>
        							<p>
        								Se tiene un amplio surtido de accesorios y juguetes con los que disfrutará
        								tu mascota. Visitas nuestra área de Ropa y accesorios en donde nuestro personal
        								te ayudará a encontrar lo mejor para tu mascota.
        							</p>
        						</figcaption>
        				</figure>
        			</div>
        			<div class="contenedor-tarjeta">
        				<figure>
        					<img src="img/galeria/vacunas 2.jpg" class="imag frontal">
        						<figcaption class="trasera">
        							<h2 class="titulo">Vacunación</h2>
        							<hr>
        							<p>
        								Todo dueño responsable desea una cosa; que su mascota tenga una larga y saludable vida. Una forma de lograrlo es a través de una atención al periodo de vacunación, cuidados diarios adecuados y una nutrición correcta.
        							</p>
        						</figcaption>
        				</figure>
        			</div>							
        		</div>
        	</div>
    </section>
    
   
    <section class="customer_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="customer_say" id='empresa' v-for="empresax in empresa">
                        	<br><br><br><br><br>
                            <h3>Ubícanos en: <br></h3>
                            <p class="text">{{Session::get('dir')}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="vertical_main" >
							<center>
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.6229162550326!2d-89.5701864!3d20.967653100000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f5670ec9c6e9d15%3A0xfc5c58658dc901de!2sVeterinaria+Colitas+Felices!5e0!3m2!1ses-419!2smx!4v1564855038984!5m2!1ses-419!2smx" width="80%" height="350" frameborder="0" allowfullscreen class="borde"></iframe>
							</center>
			
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="team container" style="background: #fafafa">
        <!-- inicio del row -->
        <div class="row">
            <!-- inicio del col -->
            <div class="col-md-5 col-xs-12 ">
                <section class="team">
                    <div class="text">
                        <h2>Nuestro Equipo</h2>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p> -->
                    </div>     

                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        <div class="item active" align="center">
                          <img src="img/personal/erikamac.jpg" class="img-responsive img-rounded" alt="Responsive image">
                          <div class="carousel-caption " style="color: #ffffff; background: #2f4f4f">
                            <h4>Érika Macías Dueña y Directora</h4>
                            <!-- <p class=""> de la veterinaria</p> -->
                          </div>
                        </div>
                        <div class="item" align="center">
                          <img src="img/personal/erikac.jpg" class="img-responsive img-rounded" alt="Responsive image">
                          <div class="carousel-caption" style="color: #ffffff; background: #2f4f4f">
                            <h4>Érika Cocom Internista Clínico</h4>
                            <!-- <p></p> -->
                          </div>
                        </div>
                        <div class="item" align="center">
                          <img src="img/personal/ezequiel.jpg" class="img-responsive img-rounded" alt="Responsive image">
                          <div class="carousel-caption" style="color: #ffffff; background: #2f4f4f">
                            <h4>Ezequiel Balam Administrador</h4>
                            <!-- <p></p> -->
                          </div>
                        </div>
                        <div class="item" align="center">
                          <img src="img/personal/lucia.jpg" class="img-responsive img-rounded" alt="Responsive image">
                          <div class="carousel-caption" style="color: #ffffff; background: #2f4f4f">
                            <h4>Lucía Cocom Segunda titular </h4>
                            <!-- <p>veterinaria</p> -->
                          </div>
                        </div>
                      </div>

                      <!-- Controls -->
                      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                </section>
            </div>
            <!-- fin del col -->
            <!-- inicio del col -->
            <div class="col-md-7 col-xs-12">
                <section class="contact_area" id="citas">
                    
                    <div class="text">
                        <h2>Citas</h2>
                        <p>Para poder realizar una cita deberá iniciar sesión</p>
                        <p>Si aún no está registrado de clíck en <a href="{{url('login')}}">Iniciar Sesión/Regístrate</a></p>
                    </div>
                    <div class="" >
                        <div class="form_area">
                            <form>
                                <div class="input_area" align="justify">
                                    <input type="text" name="" placeholder="Nombre de usuario">
                                    <input type="text" name="" placeholder="Mascota">
                                    <input type="email" name="" placeholder="Correo electrónico">
                                    <input type="text" name="" placeholder="Teléfono">
                                </div>
                                <textarea name="" placeholder="Mensaje"></textarea>
                                        <!-- <label><p><input type="checkbox">subscribe to the newsletter</p></label> -->
                                        <!-- <input type="submit" value="SEND"> -->
                            </form>
                        </div>
                    </div>
                </section>
            </div>
            <!-- fin del col -->
        </div>
        <!-- fin del row -->
    </section>

@endsection
@push('scripts')

@endpush
                    