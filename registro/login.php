<?php session_start();
session_destroy();
session_cache_limiter('nocache,private');
unset( $_SESSION['p_usu'], $_SESSION['p_nom'],$_SESSION['p_tipo'],$_SESSION["lastoutaccess"]);




if ($_POST['action'] == "Aceptar" and $_POST['txtusu']!="" and $_POST['txtpass']!="") {



		include("classes/c_verifica.php");

	$d = new verifica;

	$nn=$d->abrir_usuario($_POST['txtusu'],$_POST['txtpass']);

	if ($nn==1){
	echo '<BODY onLoad="javascript:index()">';
	}

    }



		?>

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link rel="stylesheet" href="images/style000.css" type="text/css" media="screen">
 <meta charset="utf-8">
  <title>Foro Nacional De Software Libre</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <!-- Fonts END -->

  <!-- Global styles START -->
  <link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END -->

  <!-- Page level plugin styles START -->
  <link href="../../assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="../../assets/global/css/components.css" rel="stylesheet">
  <link href="../../assets/frontend/layout/css/style.css" rel="stylesheet">
  <link href="../../assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
  <link href="../../assets/frontend/layout/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="../../assets/frontend/layout/css/custom.css" rel="stylesheet">

    <script type="text/javascript">
<!--




function validacion(formulario) {
	var er_string = /^([a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\s|\.|-)+$/
		var er_pass = /^([0-9]|[a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\s|\.|-)+$/
		var er_numbers = /^([0-9])+$/
		var er_email = /^(.+\@.+\..+)$/
		var er_cbo =  /^([a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\s)+$/
		var x


		if(!er_string.test(frmlog.txtusu.value)) {
    		    alert('Nombre de usuario no válido.')
      		  return false
    		}




			if(frmlog.txtpass.value=="") {
    		    alert('Contraseña no válida.')
      		  return false
    		}






    	return true            //cambiar por return true para ejecutar la accion del formulario
}

function index(){
window.location="info.php";

}


//-->
</script>

<div class="pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info">

            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU -->
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    <li><a href="http://fnsl.org.mx/registro/login.php">Log In</a></li>
                    <li><a href="http://fnsl.org.mx/registro/">Registro</a></li>
                </ul>
            </div>
            <!-- END TOP BAR MENU -->
        </div>
    </div>
</div>
<!-- END TOP BAR -->
<!-- BEGIN HEADER -->
<div class="header">
  <div class="container">
    <a class="site-logo" href="index.php"><!-- img src="../../assets/frontend/layout/img/logos/logo-corp-red.png" alt="Metronic FrontEnd" --> FNSL</a>

    <a href="index.php" class="mobi-toggler"><i class="fa fa-bars"></i></a>

    <!-- BEGIN NAVIGATION -->
    <div class="header-navigation pull-right font-transform-inherit">
      <ul>
        <li class="active"><a  href="../index.php">Home</a></li>
        <li ><a  href="../conferencias.php">Conferencias</a></li>
        <li ><a  href="../talleres.php">Talleres</a></li>
        <li ><a  href="../horarios.php">Horarios</a></li>
        <li ><a  href="#">Flisol</a></li>
        <li ><a  href="#">Cisol</a></li>
      </ul>
    </div>
    <!-- END NAVIGATION -->
  </div>
</div>
<div class="row">
  <div class="col-md-12">
     <h1>Iniciar sesion</h1>
      <hr>
  </div>
<div class="col-md-6 col-md-offset-2 ">
  <form class="form-horizontal" role="form"  method="post" name="frmlog"  onsubmit="return validacion(this)">
    <fieldset>

		<div class="form-group">
		<label for="firstname" class="col-lg-4 control-label">Nombre de usuario <span class="require">*</span></label>
		<div class="col-lg-6">
			<input class="form-control" name="txtusu" type="text"  value="" size="25" maxlength="12"  />
		</div>
		</div>

		<div class="form-group">
		<label for="email" class="col-lg-4 control-label">Contraseña <span class="require">*</span></label>
		<div class="col-lg-6">
			<input class="form-control" name="txtpass" type="password"  value="" size="25" maxlength="12" />
		</div>
		</div>
		<hr>

    </fieldset>
    <div class="row">
    	<div class="col-lg-4 col-md-offset-4">
			    <input class="btn btn-primary" type="submit" name="action" id="button" value="Aceptar" />
			</div>


        <div class="col-lg-3 "  >
			<a href="restaurar.php" onMouseOver="status='';return true" onClick="status='';return true" >Olividaste tu Contraseña</a>
		</div>

    </div>

   </form>

</div>


<div class="col-md-4 col-sm-4 pull-right">
  <div class="form-info">
    <img height="270" allowfullscreen="" style="width:100%; border:0" src="../assets/img/promo2.jpg" class="margin-bottom-10"></img>


  <!-- BEGIN TESTIMONIALS -->
  <div class="testimonials-v1 testimonials-v1-another-color">
    <h2>Costo del Evento</h2>
    <div id="myCarousel1" class="carousel slide">
      <!-- Carousel items -->
      <div class="carousel-inner">
        <div class="active item">
          <blockquote><p>
            El evento tendrá un costo de $ 50.00 (cincuenta pesos 00/100 MN), cuya recaudación servirá para los gasto s
            generados para viáticos de los invitados.
          </p></blockquote>
        </div>
      </div>
    </div>
  </div>

</div>
</div>






 </div>
