<?php 
require_once "../assets/system/core.php";
$page = basename($_SERVER["PHP_SELF"]);
if(isset($_GET['id'])){
if($_GET['id'] && !empty($_GET['id'])){

if(isset($_GET['action'])){

if($_GET['action'] == "err" && !empty($_GET['id'])){

            $query = mysqli_query($db,"DELETE FROM bans WHERE id = '{$_GET['id']}'");

            if($query){

            $good2 = "Post borrada correctamente";
            header("LOCATION: ".$rise_settings['weblink']."/admin/bans.php");   
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

    <title><?php echo $rise_settings['name'];?> - Banear / Desbanear Usuarios</title>

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
            <div class="alert success">Baneos de <?php echo $rise_settings['name'];?></div>

            <div id="content-box" style="height:380px">
                <div class="title-box png20">
                    <div class="title">Banear Usuario</div>
                </div>

              <div class="png20">
             <?php 
     error_reporting();
if ((isset($_POST['create']))) {

    $user_name = $_POST['user_name'];
    $reason = $_POST['reason'];
    $error = false;
    
    $queryban = mysqli_query($db,"SELECT * FROM users WHERE username = '".$user_name."'");
    while ($bannames = mysqli_fetch_assoc($queryban)){
    $user_query = mysqli_query($db,"SELECT * FROM bans WHERE ip = '".$bannames['ip']."'");
    if(mysqli_num_rows($user_query) > 0)
    {
        echo '<div class="botonsce">Este Usuario ya se encuentra baneado.</div>';
        $error = true;
    }
    if($error == false)
    {
    $result = mysqli_query($db,"INSERT INTO `bans` (`ip`, `reason`, `added_by`) VALUES ('".$bannames['ip']."', '".$reason."', '".$myuser->name()."');");
                                        if ($result) {
                                        echo '<div class="botonsce">Usuario Baneado con exito.</div>';
                                        } 
                    }
                  }
                }
?> 
<form action="" method="POST">
  <input type="text" name="user_name" placeholder="Nombre de Usuario">
  <input type="text" name="reason" placeholder="Razon del Baneo">
  <input type="submit" name="create" class="botonsc" value="Banear Usuario">
</form>
             <div class="title-box png20">
                    <div class="title">Lista de  Baneados</div>
                </div>
          <table style="width: 100%;">
              <tbody>
                  <tr>
                      <td>IP</td>
                      <td>Razon</td>
                      <td>Baneado Por</td>
                      <td>Acciones</td>
                  </tr>
                  <?php
 $news = mysqli_query($db, "SELECT * FROM bans ORDER BY id DESC");
    while ($newsc = mysqli_fetch_assoc($news)) {
                  ?>
                  <tr>
                      <td><?php echo $newsc['ip'];?></td>
                      <td><?php echo $newsc['reason'];?></td>
                      <td><?php echo $newsc['added_by'];?></td>
                      <td><a href="<?php echo $rise_settings['weblink'];?>/admin/bans.php?action=err&id=<?php echo $newsc['id'];?>" style="color:#FA5858;text-decoration: none;">Borrar</a></td>
                  </tr>
<?php   } if(mysqli_num_rows($news) == 0) { echo '<tr>
<td>No hay ningun usuario baneado.</td>
</tr>';}?>
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