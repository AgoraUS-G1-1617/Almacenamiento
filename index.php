<?php 
session_start();
include 'services/checkLogin.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Almacenamiento de Votos - Agora US</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Almacenamiento</a>
                <?php if($isLogged==false): ?>
                	<a class="navbar-brand page-scroll" href="https://authb.agoraus1.egc.duckdns.org/welcome.php">LOGIN</a>
                	
                <?php elseif($isLogged==true): ?>
                	<a class="navbar-brand page-scroll" href="services/logout.php">LOG OUT</a>
                <?php endif; ?>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#about">&iquest;Por d&oacute;nde empezamos...?</a>
                        <a class="page-scroll" href="#about"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Servicios</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contacto</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Bienvenido a almacenamiento de votos</h1>
                <hr>
                <p>Esta es la API del m&oacute;dulo de almacenamiento de la aplicaci&oacute;n Agora US 16/17</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">&iquest;Por d&oacute;nde empezamos...?</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">&iquest;Por d&oacute;nde empezamos...?</h2>
                    <hr class="light">
                    <p class="text-faded">Para la asignatura Evoluci&oacute;n y Gesti&oacute;n de la Configuraci&oacute;n de cuarto curso de nuestra carrera (Ingenier&iacute;a Inform&aacute;tica - Ingenier&iacute;a del Software), tenemos que heredar un proyecto ya completado y mejorarlo de alguna forma (correci&oacute;n de errores, adici&oacute;n de funcionalidades, etc). El proyecto en cuesti&oacute;n es Agora US, un sistema de voto por internet que se desarroll&oacute; el a&ntilde;o pasado por alumnos de la asignatura bas&aacute;ndose en el sistema real Agora Voting. Est&aacute; subdividido en varios m&oacute;dulos que se encargan de algo diferente dentro de la aplicaci&oacute;n. Nosotros nos encargamos del almacenamiento seguro de los votos en una base de datos, permitiendo tanto el guardado de un voto como la petici&oacute;n de todos los que ya est&aacute; guardados.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Servicios de la API</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                
                <div class="col-md-4 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Manda tu voto</h3>
                        <p class="text-muted">Con nuestro sistema podr&aacute;s enviar un voto para que se almacene en la base de datos.</p>
                    </div>
                </div>
                
         <!-- Este es el bloque 'ESTADÍSTICAS' que se mostrar� cuando se est� logueado como admin-->
         <?php if($isLogged==true){ ?>
                 <div class="col-md-4 text-center">
                    <div class="service-box">
                        <a href="../estadisticas.php"><i class="fa fa-4x fa-pie-chart wow bounceIn text-primary" data-wow-delay=".1s"></i></a>
                        <h3>Estadísticas</h3>
                        <p class="text-muted">A trav&eacute;s de <a href="estadisticas.php">&eacute;ste</a> enlace podr&aacute; observar las estad&iacute;sticas de votos totales por cada tipo de votaci&oacute;n realizada.</p>
                    </div>
                </div>
 		<!-- Este es el bloque 'ESTADÍSTICAS' que se mostrar� cuando NO se est� logueado como admin-->
 		<!-- Alberto: Ya hacemos un login en la cabecera de la página. Veo muy bien indicar que para las estadisticas es necesario hacer un login. Pero luego el enlace de abajo se ve feo aqui en medio de la aplicación. Igual cambiando el css queda mucho mejor. Simplemente evaluarlo -->
 		<?php }else{ ?>
                <div class="col-md-4 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-pie-chart wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Estadísticas</h3>
                        <p class="text-muted">Necesitar&aacute; hacer login para poder acceder a las estad&iacute;sticas.</p>
                        <h3>
                        	<a id="loginStyle" href="https://authb.agoraus1.egc.duckdns.org/welcome.php">LOGIN</a>               				
                        </h3>
                    </div>
                </div>
		<?php } ?>        
         <!-- -------------------------------------------------------------------------------- -->
         
                <div class="col-md-4 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>Consulta una votaci&oacute;n</h3>
                        <p class="text-muted">Haz una petici&oacute;n de la lista completa de los votos cifrados de una determinada votaci&oacute;n.</p>
                    </div>
                </div>
                
            </div>
        </div>
    <br/>
    <br/>
    <br/>
    <div class="container">
        <div class="row">
            <table style="border-collapse:collapse" class="wikitable sortable">
				<tr>
					<th> M&eacute;todo (URL)</th>
					<th> Tipo				</th>
					<th> Descripci&oacute;n </th>
					<th> Par&aacute;metros  </th>
					<th> Respuesta			</th>
					<th> Ejemplo			</th>
				</tr>
				<tr>
					<td> 
						vote 
						<br/>
						(<a>https://almacenamiento.agoraus1.egc.duckdns.org/vote.php</a>)
					</td>
					<td> 
						POST
					</td>
					<td> 
						Permite almacenar un voto para una determinada votaci&oacute;n
					</td>
					<td>
						Ver ejemplo <br/>
						
					</td>
					<td> 
						Json con un mensaje de respuesta que indica si la operaci&oacute;n se ha resuelto correctamente. (el mensaje ser&aacute; 1 si todo sali&oacute; bien y 0 en caso contrario)
					</td>
					<td> <!--(<a rel="nofollow" class="external free" href="https://beta.almacenamiento.agoraus1.egc.duckdns.org/vote.php">https://beta.almacenamiento.agoraus1.egc.duckdns.org/vote.php</a>)-->
						(<a rel="nofollow" class="external free" href="https://almacenamiento.agoraus1.egc.duckdns.org/vote.php">https://almacenamiento.agoraus1.egc.duckdns.org/vote.php</a>)
						 Y con AdvanceRESTClient ponemos: {"age":24,"id":"1","autonomous_comunity":"Andalucia","genre":"masculino","id_poll":3,
 						 "answers":[{"question":"Pregunta 1","answers_question":"SI"},
            			 {"question":"Pregunta 2","answers_question":"NO"}]}
					</td>
				</tr>
				<br />
				<tr>
					<td> 
						get_votes 
						<br />
						(<a>hhttps://almacenamiento.agoraus1.egc.duckdns.org/get_votes.php</a>)
					</td>
					<td> 
						GET
					</td>
					<td> 
						Devuelve la lista de votos de una determinada votaci&oacute;n
					</td>
					<td>
						votation_id: id de la votaci&oacute;n.
					</td>
					<td> 
						Json con la lista de votos y un campo "msg" que indica si la operaci&oacute;n se realiz&oacute; correctamente.
					</td>
					<td> <!--(<a rel="nofollow" class="external free" href="https://beta.almacenamiento.agoraus1.egc.duckdns.org/get_votes.php?votation_id=1">https://beta.almacenamiento.agoraus1.egc.duckdns.org/get_votes.php?votation_id=1</a>) -->
						(<a rel="nofollow" class="external free" href="https://almacenamiento.agoraus1.egc.duckdns.org/get_votes.php?votation_id=1">https://almacenamiento.agoraus1.egc.duckdns.org/get_votes.php?votation_id=1</a>)
					</td>
				</tr>
				<tr>
					<td> 
						get_votations 
						<br />
						(<a > https://almacenamiento.agoraus1.egc.duckdns.org/get_votations.php</a>)
					</td>
					<td> 
						GET
					</td>
					<td> 
						Devuelve los ID de todas las votaciones con al menos un voto.
					</td>
					<td>
						Sin par&aacute;metros.
					</td>
					<td> 
						Json con la lista de IDs de las votaciones y un campo "msg" que indica si la operaci&oacute;n se realiz&oacute; correctamente.
					</td>
					<td> <!--(<a rel="nofollow" class="external free" href="https://beta.almacenamiento.agoraus1.egc.duckdns.org/get_votations.php">https://beta.almacenamiento.agoraus1.egc.duckdns.org/get_votations.php</a>) -->
						(<a rel="nofollow" class="external free" href="https://almacenamiento.agoraus1.egc.duckdns.org/get_votations.php">https://almacenamiento.agoraus1.egc.duckdns.org/get_votations.php</a>)
					</td>
				</tr>
			</table>
        </div>
    </div>

    </section>

    
    <section class="bg-primary" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Contacta con nosotros</h2>
                    <hr class="light">
                    <p>Si tienes dudas, no te queda algo claro o tienes alguna propuesta de mejora para la aplicaci&oacute;n no dudes en dec&iacute;rnoslo, somos todo o&iacute;dos.</p>
                </div>
                <div class="col-lg-4 text-center">
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a class="cont" href="mailto:your-email@your-domain.com">almacenamientodevotos17@gmail.com</a></p>
                </div>
                <div class="col-lg-4 text-center">
                </div>
            </div>
        </div>
    </section>
<section class="no-padding" id="portfolio">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a href="https://github.com/AgoraUS-G1-1617/Almacenamiento" target="_blank" class="portfolio-box">
                        <img src="img/portfolio/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    GitHub
                                </div>
                                <div class="project-name">
                                    &iexcl;Nuestro repositorio!
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="https://1984.lsi.us.es/wiki-egc/index.php/Almacenamiento_1617_G1" target="_blank" class="portfolio-box">
                        <img src="img/portfolio/2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    EGC 16-17
                                </div>
                                <div class="project-name">
                                    &iexcl;Visita la wiki de la asignatura!
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a href="https://www.informatica.us.es/" target="_blank" class="portfolio-box">
                        <img src="img/portfolio/3.png" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    ETSII
                                </div>
                                <div class="project-name">
                                    La Facultad
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

</body>

</html>