<?php 
require_once "../assets/system/core.php";
$page = basename($_SERVER["PHP_SELF"]);
if(isset($_GET['id'])){
if($_GET['id'] && !empty($_GET['id'])){

if(isset($_GET['action'])){

if($_GET['action'] == "err" && !empty($_GET['id'])){

            $query = mysqli_query($db,"DELETE FROM cms_news WHERE id = '{$_GET['id']}'");

            if($query){

            $good2 = "Post borrada correctamente";
            header("LOCATION: ".$rise_settings['weblink']."/admin/news.php");   
            }                  
    }

}
}
}
 if( $myuser::is_auth() )
 if ($myuser->rank >= 2) {
?>
<html>
<head>
    <meta charset="utf-8">

    <title><?php echo $rise_settings['name'];?> - Crear / Editar Articulos</title>

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
            <div class="alert success">Articulos de <?php echo $rise_settings['name'];?></div>

            <div id="content-box" style="height:380px">
                <div class="title-box png20">
                    <div class="title">Crear Articulo</div>
                </div>

                <div class="png20">
             <div class="alert success"><a href="<?php echo $rise_settings['weblink'];?>/admin/news_create.php" style="text-decoration: none;color:#fff;">Crear Articulo</a>
             </div>
             <div class="title-box png20">
                    <div class="title">Editar un Articulo</div>
                </div>
          <table style="width: 100%;">
              <tbody>
                  <tr>
                      <td>Titulo de la Noticia</td>
                      <td>Categoria</td>
                      <td>Fecha</td>
                      <td>Acciones</td>
                  </tr>
                  <?php
 $news = mysqli_query($db, "SELECT * FROM cms_news ORDER BY id DESC");
    while ($newsc = mysqli_fetch_assoc($news)) {
                  ?>
                  <tr>
                      <td><?php echo $newsc['title'];?></td>
                      <td><?php echo $newsc['categoria'];?></td>
                      <td><?php echo date("d/m/Y", $newsc['date']); ?></td>
                      <td><a href="<?php echo $rise_settings['weblink'];?>/admin/editnew.php?action=edit&id=<?php echo $newsc['id'];?>" style="color:#04B45F;text-decoration: none;">Editar</a> / <a href="<?php echo $rise_settings['weblink'];?>/admin/news.php?action=err&id=<?php echo $newsc['id'];?>" style="color:#FA5858;text-decoration: none;">Borrar</a></td>
                  </tr>
<?php } ?>
              </tbody>
          </table>
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