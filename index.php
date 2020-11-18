<?php
include "assets/system/core.php";

if( $myuser::is_auth() )
	header("Location: ".$horange_settings['weblink']."/home");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Site Information -->
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="author" lang="en" content="<?php echo $rise_settings['name'];?>">
    <meta name="robots" content="follow, index">
    <meta property="og:title" content="<?php echo $rise_settings['name'];?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $rise_settings['weblink'];?>">
    <meta property="og:image" content="">
    <meta property="og:description" content="">
    <meta property="og:site_name" content="<?php echo $rise_settings['name'];?>">
    <link rel="shortcut icon" href="<?php echo $rise_settings['weblink'];?>/riseweb/images/icon.ico" type="image/x-icon">
	<meta name="csrf-token" content="IcIktUIcoLQgu38v389kwxVnSKmNboZedwRVZFVG">
    <title><?php echo $rise_settings['name'];?> - Home</title>
	
	<!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $rise_settings['weblink'];?>/riseweb/css/fonts.css">
    <link rel="stylesheet" href="<?php echo $rise_settings['weblink'];?>/riseweb/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo $rise_settings['weblink'];?>/riseweb/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo $rise_settings['weblink'];?>/riseweb/css/selectric.css">
    <link rel="stylesheet" href="<?php echo $rise_settings['weblink'];?>/riseweb/css/circle.css">
    <link rel="stylesheet" href="<?php echo $rise_settings['weblink'];?>/riseweb/css/app.css">
    <link rel="stylesheet" href="<?php echo $rise_settings['weblink'];?>/riseweb/css/app.responsive.css">
	
	<!-- -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

	<!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="<?php echo $rise_settings['weblink'];?>/riseweb/js/addons.js"></script>
	<script src="<?php echo $rise_settings['weblink'];?>/riseweb/js/app.js"></script>

<script type="text/javascript">
</script>

<style>
.playercount{background-color:transparent;-webkit-border-radius:48px;-moz-border-radius:48px;border-radius:48px;padding:11px 24px;display:inline-block;text-decoration:none;font-family:Montserrat,Arial,sans-serif;font-weight:600;font-size:14px;color:#fff;text-transform:uppercase;border:2px solid #fff;height:47px;line-height:21px;text-shadow:none;text-align:center;-webkit-transition:background-color .2s,color .2s;transition:background-color .2s,color .2s}.playercount[disabled]{opacity:.5;cursor:default}.playercount.white{color:#fff;border-color:#fff}.playercount.white.plain,.playercount.white:not([disabled]):not(.no-hover):hover{background-color:#fff;color:#333}.playercount.white{color:#fff;border-color:#fff}
</style>
</head>

<body class="flex-container flex-direction-column">

	<!-- Notifications -->
    <div class="notifications-container">
    	<?php
if(isset($_POST['create']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repeatpassword']) && isset($_POST['mail'])) {
    $user = trim($_POST['username']);
    $pass = $_POST['password'];
    $rpass = $_POST['repeatpassword'];
    $mail = $_POST['mail'];
    $error = false;


    $user_query = mysqli_query($db,"SELECT * FROM users WHERE username = '".$user."'");
    if(mysqli_num_rows($user_query) > 0)
    {
        echo '<div class="notification-container" data-id="169df144842" data-type="error" style="display: block;">
			<a id="close-notification" href="#" class="notification-close"></a>
			<div class="notification-title">
				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Error!</font></font>
			</div>
			<div class="notification-content">
				<font style="vertical-align: inherit;">
									Ya esta en uso este nombre.
								</font>
			</div>
		</div>';
        $error = true;
    }
    $user_query = mysqli_query($db,"SELECT * FROM users WHERE mail = '".$mail."'");
    if(mysqli_num_rows($user_query) > 0)
    {
        echo '<div class="notification-container" data-id="169df144842" data-type="error" style="display: block;">
			<a id="close-notification" href="#" class="notification-close"></a>
			<div class="notification-title">
				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Error!</font></font>
			</div>
			<div class="notification-content">
				<font style="vertical-align: inherit;">
									Correo electronico en uso.
								</font>
			</div>
		</div>';
        $error = true;
    }
    $user_ban = mysqli_query($db,"SELECT * FROM bans WHERE ip = '". $ip ."'");
    if(mysqli_num_rows($user_ban) > 0)
    {
        echo '<div class="notification-container" data-id="169df144842" data-type="error" style="display: block;">
			<a id="close-notification" href="#" class="notification-close"></a>
			<div class="notification-title">
				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Error!</font></font>
			</div>
			<div class="notification-content">
				<font style="vertical-align: inherit;">
									Te encuentras baneado.
								</font>
			</div>
		</div>';
        $error = true;
    }
    elseif(empty($user) || empty($pass) || empty($rpass) || empty($mail))
    {
        echo '<div class="notification-container" data-id="169df144842" data-type="error" style="display: block;">
			<a id="close-notification" href="#" class="notification-close"></a>
			<div class="notification-title">
				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Error!</font></font>
			</div>
			<div class="notification-content">
				<font style="vertical-align: inherit;">
									No dejes campos vacios.
								</font>
			</div>
		</div>';
        $error = true;
    }
    elseif($pass !== $rpass)
    {
        echo '<div class="notification-container" data-id="169df144842" data-type="error" style="display: block;">
			<a id="close-notification" href="#" class="notification-close"></a>
			<div class="notification-title">
				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Error!</font></font>
			</div>
			<div class="notification-content">
				<font style="vertical-align: inherit;">
									Las contraseñas no coinciden.
								</font>
			</div>
		</div>';
        $error = true;
    }
    elseif (strpos($user, " "))
    {
        echo '<div class="notification-container" data-id="169df144842" data-type="error" style="display: block;">
			<a id="close-notification" href="#" class="notification-close"></a>
			<div class="notification-title">
				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Error!</font></font>
			</div>
			<div class="notification-content">
				<font style="vertical-align: inherit;">
									No dejes espacios en tu nombre.
								</font>
			</div>
		</div>';
        $error = true;
    }
    if($error == false)
    {
        mysqli_query($db,"INSERT INTO users (username, password, mail, account_created, last_online, motto, look, gender, rank, credits, pixels, points, online, ip_register, ip_current) VALUES ('".$user."', '".md5($pass)."', '".$mail."', '".time()."', '".time()."','".$rise_settings['motto']."', 'ch-255-105.ha-1012-110.sh-305-62.lg-270-110.hr-115-1035.hd-180-1', 'F', '1', '".$rise_settings['credits']."', '".$rise_settings['diamonds']."', '".$rise_settings['duckets']."', '0', '".$ip."', '".$ip."')");
       $_SESSION['loginuser'] = $user;
        $_SESSION['loginpass'] = $pass;
        header( "Location: ".$rise_settings['weblink']."/home" );
    }
}
?>
    	<?php
if(isset($_POST['loginuser']) && isset($_POST['loginpass']))
{
  $l_user = $_POST['loginuser'];
  $l_pass = $_POST['loginpass'];
  $loginerror = false;

  $l_query = mysqli_query($db, "SELECT * FROM users WHERE username = '$l_user' AND password = '".md5($l_pass)."'");
  if(empty($l_user) || empty($l_pass))
  {
    echo '<div class="notification-container" data-id="169df144842" data-type="error" style="display: block;">
			<a id="close-notification" href="#" class="notification-close"></a>
			<div class="notification-title">
				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Error!</font></font>
			</div>
			<div class="notification-content">
				<font style="vertical-align: inherit;">
									No dejes campos vacios.
								</font>
			</div>
		</div>';
  }
  elseif(mysqli_num_rows($l_query) == 0)
  {
    echo '<div class="notification-container" data-id="169df144842" data-type="error" style="display: block;">
			<a id="close-notification" href="#" class="notification-close"></a>
			<div class="notification-title">
				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Error!</font></font>
			</div>
			<div class="notification-content">
				<font style="vertical-align: inherit;">
									El usuario no existe o contraseña incorrecta.
								</font>
			</div>
		</div>';
    $loginerror = true;
  }
  $l_ban = mysqli_query($db, "SELECT * FROM bans WHERE ip = '". $l_user ."' OR ip = '". $ip ."'");
  if(mysqli_num_rows($l_ban) > 0)
  {
      $ban = mysqli_fetch_assoc($l_ban);
     echo '<div class="notification-container" data-id="169df144842" data-type="error" style="display: block;">
			<a id="close-notification" href="#" class="notification-close"></a>
			<div class="notification-title">
				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Error!</font></font>
			</div>
			<div class="notification-content">
				<font style="vertical-align: inherit;">
									Haz sido baneado
								</font>
			</div>
		</div>';
      $loginerror = true;
  }
  if($loginerror == false)
  {
    if(mysqli_num_rows($l_query) > 0)
    {
      session_start();
      $_SESSION['loginuser'] = $l_user;
      $_SESSION['loginpass'] = $l_pass;
      header("Location: ".$rise_settings['weblink']."/home");
    }
  }
}
?>
			</div>
	
	<!-- Header -->
    <header id="header" class="header-container pixelated is-small is-logged">
		<div class="header-content">
			
			<div class="logo"><a href="#"><?php echo $rise_settings['weblink'];?></a></div>
			<div class="account-container">
				<div id="account-buttons" class="account-buttons">
				<button id="register-popup-button" class="rounded-button white plain">Registro</button>
                    <span></span>
                    <button id="login-popup-button" class="rounded-button white login-dialog-button">Acceder</button>
									</div>
			</div>
		</div>

				<div id="guest-dialog">
			<div id="login-dialog" class="login-popup zoom-anim-dialog mfp-hide">
				<h3 class="aside-title">Inicia sesión en tu cuenta</h3>
				<form action="" method="post" class="login-form">
					<label for="login-username-input-target" class="username-input">
						<input type="text" name="loginuser" class="rounded-input blue-active" id="login-username-input-target" placeholder="Nombre de Usuario">
						<i class="flaticon-user-1"></i>
					</label>
					<label for="login-password-input-target" class="password-input">
						<input type="password" name="loginpass" class="rounded-input blue-active" id="login-password-input-target" placeholder="Password">
						<i class="flaticon-padlock"></i>
					</label>
					<button type="submit" class="rounded-button blue plain">Acceder</button>
				</form>
			</div>
			
			<!-- Register -->
			<div id="register-dialog" class="login-popup zoom-anim-dialog mfp-hide">
				<h3 class="aside-title">Crea tu cuenta</h3>
				<form action="" method="post" class="login-form" autocomplete="off">
					<input type="hidden" name="_token" value="IcIktUIcoLQgu38v389kwxVnSKmNboZedwRVZFVG">					<label for="login-username-input-target" class="username-input">
						<input type="text" name="username" class="rounded-input blue-active" id="login-username-input-target" placeholder="Nombre de Usuario">
						<i class="flaticon-user-1"></i>
					</label>
					
					<label for="login-username-input-target" class="username-input">
						<input type="email" name="mail" class="rounded-input blue-active" id="login-username-input-target" placeholder="Correo Electronico">
						<i class="flaticon-email"></i>
					</label>
					
					<label for="login-password-input-target" class="password-input">
						<input type="password" name="password" class="rounded-input blue-active" id="login-password-input-target" placeholder="Password">
						<i class="flaticon-padlock"></i>
					</label>
					
					<label for="login-password-input-target" class="password-input">
						<input type="password" name="repeatpassword" class="rounded-input blue-active" id="login-password-input-target" placeholder="Repite tu Password">
						<i class="flaticon-padlock"></i>
					</label>
					
					<button type="submit" class="rounded-button blue plain" name="create">Registrarme</button>
				</form>
			</div>
		</div>
				</header>
		
	<!-- Navigation -->
    <nav class="navigation-container">
        <ul class="navigation-menu flex-container">
		
            <li class="navigation-item main-link-item">
				<a id="rise-logo-medium"><?php echo $rise_settings['name'];?></a>
			</li>
			
            <li class="navigation-item " data-category="home"><a href="<?php echo $rise_settings['weblink'];?>">Home</a></li>
			
            <li class="navigation-item has-items " data-category="community">
                <a href="#">Comunidad</a>
                <ul class="navigation-submenu">
                    <li class="navigation-subitem"><a href="#">Fotos</a></li>
                    <li class="navigation-subitem"><a href="#">Equipo Staff</a></li>
					<li class="navigation-subitem"><a href="#">Contribuyentes</a></li>
					<li class="navigation-subitem"><a href="#">Tops</a></li>
                </ul>
            </li>
			
            <li class="navigation-item has-items " data-category="shop">
                <a href="#">Tienda</a>
                <ul class="navigation-submenu">
					<li class="navigation-subitem"><a href="#">Membresias VIP</a></li>
					<li class="navigation-subitem"><a href="#">Banco</a></li>
                    <li class="navigation-subitem"><a href="#">Mi Historial</a></li>
				</ul>
            </li>
			
			<li class="navigation-item" data-category="help">
                <a href="#">Foro</a>
            </li>
			
			<li class="navigation-item " data-category="values">
                <a href="#">Precio de Rares</a>
            </li>
            
						<li id="guest-login" class="navigation-item navigation-right-side-item ">
				<a>
					<div class="account-avatar"><img src="https://playrise.me/riseweb/images/avatar-guest.png" alt="Guest" class="pixelated"></div>
                    <span>Invitado</span>
                </a>
			</li>
						
					</ul>
    </nav>
	<!-- End Navigation -->
	
	<!-- Start Content -->
	<section class="page-container" data-page="home">
	<header class="page-header flex-container flex-vertical-center">
		<div class="page-header-content"><h1>Ultimas noticias</h1> Ultimas noticias de <?php echo $rise_settings['name'];?>!</div>
	</header>

	<div class="page-content">
		<div id="articles-container" class="articles-container">
<?php 
    $news = mysqli_query($db, "SELECT * FROM cms_news ORDER BY id DESC LIMIT 6");
    while ($newsc = mysqli_fetch_assoc($news)) {
    	?>
				<div id="article-362" class="article-container">
					<a href="<?php echo $rise_settings['weblink'];?>/news/<?php echo $newsc['id'];?>" class="article-content pixelated" style="background-image: url(<?php echo $newsc['image'];?>);">
						<div class="article-header">
							<div class="article-category"><?php echo $newsc['categoria'];?></div>
							<div class="article-separation" style="background-color: #f28600;"></div>
							<div class="article-title"><?php echo $newsc['title'];?></div>
						</div>
					</a>
				</div>
<?php } ?>			
		</div>
			</div>
</section>
	
	<!-- Footer -->
    <?php
	require_once "templates/footer.php";
	?>
	<!-- End Footer -->
	
	<!-- Extra Scripts -->
    <script src="<?php echo $rise_settings['weblink'];?>/riseweb/js/jquery.fullscreen.min.js"></script>
    <script src="<?php echo $rise_settings['weblink'];?>/riseweb/js/jquery.magnific-popup.js"></script>
    <script src="<?php echo $rise_settings['weblink'];?>/riseweb/js/selectric.js"></script>
</body>
</html>
