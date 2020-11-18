<?php
include "assets/system/core.php";

$page = basename($_SERVER["PHP_SELF"]);

if( !$myuser::is_auth() )
	header("Location: ".$horange_settings['weblink']."/index/");
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
    <title><?php echo $rise_settings['name'];?> - Preferencias Ajustes</title>
	
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
	<?php 
	require_once "templates/header.php";
	?>
	<!-- Navigation -->
    <?php 
    require_once "templates/nav.php";
    ?>
	<!-- End Navigation -->
	
	<!-- Start Content -->
	        <script type="text/javascript">
            document.habboLoggedIn = true;
		</script>
<!-- Start Content -->
<section class="page-container" data-page="settings_preferences">
	<header class="page-header flex-container flex-vertical-center">
		<div class="page-header-content"><h1>Ajustes de la Cuenta</h1> Configura tus preferencias, tu email, contraseña y perfil.</div>
	</header>
	<div class="page-content">
		<article class="default-section">
        <div class="settings-panel">
            <a href="/settings/preferencias" class="preferences selected" data-label="Ajustes de Preferencias"><i class="fas fa-cogs fa-lg"></i></a>
            <a href="/settings/password" class="password" data-label="Ajustes de Contraseña"><i class="fas fa-lock fa-lg"></i></a>
            <a href="/settings/email" class="email" data-label="Ajustes de Email"><i class="fas fa-envelope fa-lg"></i></a>
			<a href="/settings/profile" class="profile" data-label="Ajustes de Perfil"><i class="fas fa-user fa-lg"></i></a>
        </div>
        <h3 class="aside-title">Preferencias</h3>
		<!--
        <form action="settings_preferences" method="post">
            <label class="switch-label" for="online-status-target">
                <span class="switch-container rounded-radio green">
                    <input type="checkbox" name="online_status" id="online-status-target" value="1" checked />
                    <span class="switch-button"></span>
                </span>
                <h4 class="label-title">Connection Status</h4>
                <span class="label-description">Anyone can see me online</span>
            </label>
            <label class="switch-label" for="follow-target">
                <span class="switch-container rounded-radio green">
                    <input type="checkbox" name="follow" id="follow-target" value="0" />
                    <span class="switch-button"></span>
                </span>
                <h4 class="label-title">Room Following</h4>
                <span class="label-description">Allow my friends to follow me to rooms</span>
            </label>
            <label class="switch-label" for="newfriends-target">
                <span class="switch-container rounded-radio green">
                    <input type="checkbox" name="newfriends" id="newfriends-target" value="1" checked />
                    <span class="switch-button"></span>
                </span>
                <h4 class="label-title">New Friends</h4>
                <span class="label-description">Anyone can ask me to be a friend</span>
            </label>
            <p class="submit-button"><button type="submit" class="rounded-button grey">Save</button></p>
        </form>
		-->
    </article>
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
