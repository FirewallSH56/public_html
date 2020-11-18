<?php 
require_once "../assets/system/core.php";
$page = basename($_SERVER["PHP_SELF"]);
 if( $myuser::is_auth() )
 if ($myuser->rank >= 2) {
?>
<html>
<head>
    <meta charset="utf-8">

    <title><?php echo $rise_settings['name'];?> - Crear Articulo</title>

    <link type="text/css" href="<?php echo $rise_settings['weblink'];?>/admin/css/style.css" rel="stylesheet">
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
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
            <div class="alert success">Articulos de <?php echo $rise_settings['name'];?></div>

            <div id="content-box" style="height:380px">
                <div class="title-box png20">
                    <div class="title">Crear Articulo</div>
                </div>
                <div class="png20">
                    <?php 
     error_reporting();
if ((isset($_POST['create']))) {

    $title = $_POST['title'];
    $categorie = $_POST['categorie'];
    $desc = $_POST['desc'];
    $image = $_POST['image'];
    $content = $_POST['editor1'];
    $date_full = time();
    
     $result = mysqli_query($db,"INSERT INTO `cms_news` (`title`, `textshort`, `content`, `author`, `date`, `image`, `categoria`) VALUES ('".$title."', '".$desc."', '".$content."', '".$myuser->name()."', '".time()."', '".$image."', '".$categorie."');");
                                        if ($result) {
                                        echo '<div class="botonsce">Noticia creada con exito</div>';
                                        } 
                    }
?> 
    <form method="POST" action="">
        <input type="text" name="title" class="input" placeholder="Titulo de la Noticia..." required>
        <br><br>
        <select name="categorie" class="input">
            <option value="Campañas y Actividades">Campañas y Actividades</option>
            <option value="Anuncios">Anuncios</option>
        </select>
        <br><br>
        <input type="text" name="desc" class="input" placeholder="Descripcion corta de la Noticia..."required>
        <br><br>
        <input type="text" name="image" class="input" placeholder="Imagen de la Noticia..."required>
        <br><br>
        <textarea class="areatext" name="editor1" placeholder="Contenido de la Noticia" required></textarea>
        <br><br>
        <input type="submit" name="create" value="Publicar" class="botonsc">
        <br><br>
        <input type="reset" value="Borrar" class="botonsc">
    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
    <script type="text/javascript" src="js/vendor.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <script>
                        CKEDITOR.replace( 'editor1' );
                </script>
</html>
<?php } ?>