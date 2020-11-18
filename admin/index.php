<?php 
require_once "../assets/system/core.php";
$page = basename($_SERVER["PHP_SELF"]);

 if( $myuser::is_auth() )
 if ($myuser->rank >= 4) {
?>
<html>
<head>
    <meta charset="utf-8">

    <title><?php echo $rise_settings['name'];?> - Housekeeping</title>

    <link type="text/css" href="<?php echo $rise_settings['weblink'];?>/admin/css/style.css" rel="stylesheet">
</head>

<body>
	<div id="header-content">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="hotel"></div>

					
				</div>
			</div>
		</div>
	</div>
	<div id="header-menu">
		<div class="container">
			<div class="row">
				<div class="col-5">
					<ul class="user-menu">
						<li>
							<div class="user-avatar-menu" style="background-image:url(http://habbo.es/habbo-imaging/avatarimage?figure=<?php echo $myuser->look;?>&head_direction=3&gesture=sml)"></div><?php echo $myuser->name();?><span><i class="far fa-angle-down"></i></span>
							<ul class="user-subnavi">
								<li><a href="<?php echo $rise_settings['weblink'];?>">Home</a></li>
								<li><a href="<?php echo $rise_settings['weblink'];?>/logout" class="logout">Salir</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="col-2">
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
        <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet">
        <link type="text/css" href="css/settings.css" rel="stylesheet">
        <?php require_once "templates/nav.php";?>
        <div class="col-8">
            <div class="alert success">Bienvenido al panel de <?php echo $rise_settings['name'];?></div>

            <div id="content-box" style="height:380px">
                <div class="title-box png20">
                    <div class="title">Estadisticas</div>
                </div>

                <div class="png20">
                    <form method="post">
                            <div class="alert success"><?php
$resultado = mysqli_query($db,"SELECT * FROM users ");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas";
?> Usuarios registrados</div>
                            <div class="alert success"><?php
$resultado = mysqli_query($db,"SELECT * FROM cms_news ");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas";
?> Noticias creadas</div>
<div class="alert success"><?php
$resultado = mysqli_query($db,"SELECT * FROM cms_comments ");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas";
?> Comentarios en Articulos</div>
<div class="alert success"><?php
$resultado = mysqli_query($db,"SELECT * FROM bans ");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas";
?> Usuarios Baneados</div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    </body>
    <script type="text/javascript" src="js/vendor.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
</html>
<?php } ?>