<!DOCTYPE HTML>

 <html>

    <head>

    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <meta charset="utf-8">

        <!-- Description, Keywords and Author -->

        <meta name="description" content="">

        <meta name="author" content="">

        

        <title>ONU-Ecuador</title>

		<link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">



        <!-- style -->

        <link href="css/style.css" rel="stylesheet" type="text/css">

        <!-- style -->

        <!-- bootstrap -->

        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <!-- responsive -->

        <link href="css/responsive.css" rel="stylesheet" type="text/css">

        <!-- font-awesome -->

        <link href="css/fonts.css" rel="stylesheet" type="text/css">

        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- font-awesome -->

        <link href="css/effects/set2.css" rel="stylesheet" type="text/css">

        <link href="css/effects/normalize.css" rel="stylesheet" type="text/css">

        <link href="css/effects/component.css"  rel="stylesheet" type="text/css" >

        <link href="css/login.css"  rel="stylesheet" type="text/css" >
       
	</head>

   <img width="100%;" src="images/banner.png" />



    <body style="background-color: #f6f6f6;">



    	<!-- header -->

        	<header role="header">
        	<div class="container">

                	<!-- logo 

                    	<h1>

                        	<a  ><img style="width: 500%;" src="images/ecuador.png"  /></a>

                        </h1>-->

                    <!-- logo -->

                    <!-- nav 

                    <nav role="header-nav" class="navy">

                        <ul>

                            <li ><a href="index.php" title="Work">Volver al inicio</a></li>

                            <li><a href="tabla.php" title="About">Consultar datos</a></li>

                        </ul>

                    </nav>-->

                    <!-- nav -->


                    <div style="padding-left: 70%; margin-top: -5%">
                    <div class="dropdown" >
                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Opciones de navegación
                      <span class="caret"></span></button>
                      <ul class="dropdown-menu" >
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="tabla.php">Consultar datos</a></li>
                        
                        <?php 
                        if (@$usua != null) { ?>
                        <li><a href="AgregaUser.php">Ingresar nuevo registro</a></li>
                        <li><a href="updateUsr.php">Consultar cambios solicitados</a></li>
                        <li><a href="logout.php">Cerrar sesión</a></li>
                        <?php } ?>
                        <li><a href="Manual.pdf" target="_blank">Manual de usuario</a></li>
                      </ul>
                    </div>
                    </div>

                </div>

            </header>

        <!-- header -->

        <!-- login -->

                    <div class="container">
                        <div class="login-box">
                        <form id="loginForm" action="control.php" method="POST">
                            <div class="panel panel-default">
                                <div class="panel-heading"><b>Acceso</b> <span class="glyphicon glyphicon-pencil pull-right" aria-hidden="true"></span></div>
                                <div class="panel-body">
                                    <div class="form-group has-primary has-feedback">
                                        <label class="control-label" for="login">Usuario <span class="regForm text-danger">*</span></label>
                                        <input type="text" class="form-control" name="user" id="user" aria-describedby="login" required>
                                        <span class="glyphicon glyphicon-user form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group has-primary has-feedback">
                                        <label class="control-label" for="password">Contraseña <span class="regForm text-danger">*</span></label>
                                        <input type="password" class="form-control" name="password" id="password" aria-describedby="password" required>
                                        <span class="glyphicon glyphicon-lock form-control-feedback" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <input type="submit" class="btn btn-success" id="goToChat" value="Entrar" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="text-center">
                    <a href="#" data-toggle="modal" data-target="#myModal">¿Olvidaste tu contraseña o quieres cambiarla?</a>
                    </div>

            

                      <div class="modal fade" id="myModal" role="dialog">
					    <div class="modal-dialog modal-lg">
					    
					      <!-- Modal content-->
					      <div class="modal-content">
					        <div class="modal-header">
					          <button type="button" class="close" data-dismiss="modal">&times;</button>
					          <form method="POST" action="CambiarPass.php">
					          <h4 class="modal-title">Cambiar contraseña</h4>
					        </div>
					        <div class="modal-body">
					        <br><br><br>
					          <label style="color: red;">Usuario*: </label><input required type="text" class="form-control" name="usuario" value="">
					          <label style="color: red;">Contraseña nueva*:</label><input required type="password" class="form-control" name="nuevaC" value="">
					          <label style="color: red;">Comprobar contraseña*:</label><input required type="password" class="form-control" name="nuevaC2">

					          <br><br>* Campos obligatorios
					          <br><br>
					          <input  type="submit" class="btn btn-primary btn-block" name="Enviar" value="Cambiar">


					          </form>


					       
					          <form method="POST" action="CambiarUsr.php">
					          <br><br><br>
					          	<a data-toggle="modal" data-target="#myModal2">Cambiar nombre de usuario</a>
					          	  <!-- Modal -->
							  <div class="modal fade" id="myModal2" role="dialog">
							    <div class="modal-dialog">
							    
							      <!-- Modal content-->
							      <div class="modal-content">
							        <div class="modal-header">
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							          <h4 class="modal-title">Seleccione un usuario</h4>
							        </div>
							        <div class="modal-body">
							       	         <?php
						                     include "Conexion.php";
						                     $con=mysql_connect($servidor, $usuario, $pass) or die("Error");
								            mysql_select_db($db,$con)or die("Error");

											$result = mysql_query("SELECT * FROM usuarios " , $con);
								            
										  ?>
									 
							          <select required class="form-control" name="usr" id="usr">
							          	<option></option>
							          	<?php
							          	while ($result2 = mysql_fetch_array($result)) { 
								            $UserName = $result2['Usuario'];
								            $ID = $result2['ID'];
								           ?>

								        <option value="<?php echo $ID; ?>"><?php echo $UserName; ?></option> 
								        <?php } ?>
							          </select>
							        <label> Nuevo nombre de usuario: </label><input required type="text"  class="form-control" name="newUsr">
							  
							        <input type="submit" class="btn btn-primary btn-block" name="Cambiar" value="Cambiar nombre de usuario">
							        </form>
							        
							        <h4>Crear nuevo usuario administrador</h4>
							       <form method="POST" action="NuevoUsr.php">
							       <label>Contraseña del adiministrador que genera el nuevo usuario:</label> <input required type="password" class="form-control" name="passA">
							       <label>Nombre de usuario nuevo:</label> <input required type="text" class="form-control" name="nombreU">
							        <label>Contraseña:</label><input required type="password" class="form-control" name="passU">
							        </div>
							        <div class="modal-footer">
							        <input type="submit" class="btn btn-primary btn-block" name="Cambiar" value="Crear usuario">
							        </form>
							          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
							        </div>
							      </div>
							      
							    </div>
							  </div>
					     


					        </div>
					        <div class="modal-footer">
					          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					        </div>
					      </div>
					      
					    </div>
  </div>
                    </div>

    	<!-- login -->

        <!-- footer -->

        <footer role="footer">

            <!-- logo -->

               <h1>

                   <img style="padding-left: 47%;width: 53%" src="images/nu.png" title="" alt=""/>

                </h1>
            <!-- logo -->


             <ul role="social-icons">

                <li><a href="https://twitter.com/presidencia_ec" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>

                <li><a href="https://www.facebook.com/PresidenciaEcuador/?ref=br_rs" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>

                <li><a href="https://www.youtube.com/user/PresidenciaEc" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>

                <li><a href="http://www.presidencia.gob.ec/" target="_blank"><i class="glyphicon glyphicon-globe" aria-hidden="true"></i></a></li>

            </ul>

            <p class="copy-right">&copy; 2017  ONU-Ecuador. Derechos reservados</p>

        </footer>

        <!-- footer -->

    

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

        <script src="js/jquery.min.js" type="text/javascript"></script>

        <!-- custom -->

		<script src="js/nav.js" type="text/javascript"></script>

        <script src="js/custom.js" type="text/javascript"></script>

        <!-- Include all compiled plugins (below), or include individual files as needed -->

        <script src="js/bootstrap.min.js" type="text/javascript"></script>

        <script src="js/effects/masonry.pkgd.min.js"  type="text/javascript"></script>

		<script src="js/effects/imagesloaded.js"  type="text/javascript"></script>

		<script src="js/effects/classie.js"  type="text/javascript"></script>

		<script src="js/effects/AnimOnScroll.js"  type="text/javascript"></script>

        <script src="js/effects/modernizr.custom.js"></script>

        <!-- jquery.countdown -->

        <script src="js/html5shiv.js" type="text/javascript"></script>

    </body>

</html>