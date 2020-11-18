<?php
	include "assets/system/core.php";

	session_start();

	$users = mysqli_query($db, "SELECT * FROM users WHERE username='".$_SESSION['loginuser']."'");
	$myuser = mysqli_fetch_assoc($users);

	if(!isset($_SESSION['loginuser'])) {
		header("Location: ".$zan_settings['weblink']."index/");
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $zan_settings['name']; ?>: Equipo</title>
	<link rel="stylesheet" href="<?php echo $zan_settings['weblink']; ?>assets/template/css/zancms.css">
	<link rel="stylesheet" href="<?php echo $zan_settings['weblink']; ?>assets/template/css/zanfonts.css">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="shortcut icon" href="<?php echo $zan_settings['weblink']; ?>favicon.ico">
	<script src="<?php echo $zan_settings['weblink']; ?>assets/template/js/jquery-2.2.3.min.js"></script>
	<script src="<?php echo $zan_settings['weblink']; ?>assets/template/js/zan.js"></script>
</head>
<body>
	
	<div class="header">
		<div id="wrapper">
			<div id="logo">
				<img src="<?php echo $zan_settings['logo']; ?>">
			</div>
			<div id="nav">
				<a href="<?php echo $zan_settings['weblink']; ?>dashboard/"><?php echo $_SESSION['loginuser']; ?></a>
				<a href="<?php echo $zan_settings['weblink']; ?>profile/<?php echo $_SESSION['loginuser']; ?>">Perfil</a>
				<a href="<?php echo $zan_settings['weblink']; ?>team/">Equipo</a>
				<a href="<?php echo $zan_settings['weblink']; ?>logout/">Cerrar sesión</a>
			</div>
		</div>
	</div>

	<div class="wrapper-team">
		<?php
			$rank_query = mysqli_query($db, "SELECT * FROM users WHERE rank = 2 OR rank = 3 OR rank = 4 OR rank = 5 OR rank = 6 OR rank = 7 OR rank = 8 OR rank= 9  ORDER BY rank DESC");

			while ($rank_user = mysqli_fetch_assoc($rank_query)) {
				echo '
					<li style="background-image: ';
					if (!$rank_user['banner']) {
						echo "url('".$zan_settings['weblink']."assets/template/images/default-banner.jpg')";
					} else {
						echo "url('".$rank_user['banner']."')";
					}
					echo '">
						<div id="status">';
							if ($rank_user['online'] == 1) {
								echo 'Conectado';
							} elseif ($rank_user['online'] == 0) {
								echo 'Desconectado';
							}
					echo '
						</div>
						<div id="photo">
							<img src="https://www.habbo.com/habbo-imaging/avatarimage?figure='.$rank_user['look'].'&size=m&gesture=sml&head_direction=3">
						</div>
						<div id="dates">
							<h1>'.$rank_user['username'].'</h1>';
							if ($rank_user['rank'] == 2) {
								echo '<div id="rank" style="background: rgba(52, 152, 219, .8);">';
								echo 'Mod de Prueba';
							} elseif ($rank_user['rank'] == 3) {
								echo '<div id="rank" style="background: rgba(52, 152, 219, .8);">';
								echo 'Moderador';
							} elseif ($rank_user['rank'] == 4) {
								echo '<div id="rank" style="background: rgba(41, 128, 185, .8);">';
								echo 'Jefe de Moderadores';
							} elseif ($rank_user['rank'] == 5) {
								echo '<div id="rank" style="background: rgba(142, 68, 173, .8);">';
								echo 'Administrador';
							} elseif ($rank_user['rank'] == 6) {
								echo '<div id="rank" style="background: rgba(192, 57, 43, .8);">';
								echo 'Manager';
							} elseif ($rank_user['rank'] == 7) {
								echo '<div id="rank" style="background: rgba(22, 160, 133, .8);">';
								echo 'Diseñador';
							} elseif ($rank_user['rank'] == 8) {
								echo '<div id="rank" style="background: rgba(44, 62, 80, .8);">';
								echo 'Desarrollador';
							} elseif ($rank_user['rank'] == 9) {
								echo '<div id="rank" style="background: rgba(167, 12, 0, .8);">';
								echo 'Fundador';
							}
					echo '
							</div>
						</div>
					</li>
				';
			}

		?>
	</div>

	<footer>
		<p>ZanCMS &copy; Todos los derechos reservados.</p>
	</footer>
</body>
</html>