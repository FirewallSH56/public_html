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
    <title><?php echo $rise_settings['name'];?> - Contraseña Ajustes</title>
	
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
            if(isset($_POST['savepass'])){
            $pp = $_POST['ppassword'];
            $pnp = $_POST['pnpass'];
            $prp = $_POST['pnrp'];
            $orpassword = md5($pp);
            $newpassword = md5($pnp);
            if(empty($pp) || empty($orpassword)){
                 echo '<div class="notification-container" data-id="169df144842" data-type="error" style="display: block;">
            <a id="close-notification" href="#" class="notification-close"></a>
            <div class="notification-title">
                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Error!</font></font>
            </div>
            <div class="notification-content">
                <font style="vertical-align: inherit;">
                                    Los campos estan vacios.
                                </font>
            </div>
        </div>';
            }
            if($orpassword !==  $myuser->password){
                echo '<div class="notification-container" data-id="169df144842" data-type="error" style="display: block;">
            <a id="close-notification" href="#" class="notification-close"></a>
            <div class="notification-title">
                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Error!</font></font>
            </div>
            <div class="notification-content">
                <font style="vertical-align: inherit;">
                                    Tu contraseña actual no coincide.
                                </font>
            </div>
        </div>';
            }else{
                if(strlen($pnp) < 6 || strlen($pnp) > 32){
                echo '<div class="notification-container" data-id="169df144842" data-type="error" style="display: block;">
            <a id="close-notification" href="#" class="notification-close"></a>
            <div class="notification-title">
                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Error!</font></font>
            </div>
            <div class="notification-content">
                <font style="vertical-align: inherit;">
                                   Introduce una contraseña valida.
                                </font>
            </div>
        </div>';
                }else{
                    if($pnp !== $prp){
                    echo '<div class="notification-container" data-id="169df144842" data-type="error" style="display: block;">
            <a id="close-notification" href="#" class="notification-close"></a>
            <div class="notification-title">
                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Error!</font></font>
            </div>
            <div class="notification-content">
                <font style="vertical-align: inherit;">
                                    Tu contraseña nueva no coincide.
                                </font>
            </div>
        </div>';
                    }else{
                        mysqli_query($db,"UPDATE users SET password = '".$newpassword."' WHERE id = '".$myuser->id."' LIMIT 1");
                        $_SESSION['password'] = $newpassword;
                         echo '<div class="notifications-container">
    
                <div class="notification-container" data-id="169df3869ed" data-type="success" style="display: block;">
            <a id="close-notification" href="#" class="notification-close"></a>
            <div class="notification-title">
                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Success!</font></font>
            </div>
            <div class="notification-content">
                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Actualizaste tu contraseña correctamente.</font></font>
            </div>
        </div>
            </div>';
                    }
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
        <h3 class="aside-title">Contraseña</h3>
		<form action="" method="POST">
            <h4 class="form-subcategory">Contraseña Actual</h4>
            <div class="row">
                <div class="column-2">
                    <input type="password" name="ppassword" class="rounded-input darkgrey-active" placeholder="Introduce tu contraseña actual...">
                </div>
            </div>
            <h4 class="form-subcategory">Nueva Contraseña</h4>
            <div class="row">
                <div class="column-2">
                    <input type="password" name="pnpass" class="rounded-input darkgrey-active" placeholder="Introduce tu contraseña nueva...">
                </div>
                <div class="column-2">
                    <input type="password" name="pnrp" class="rounded-input darkgrey-active" placeholder="Repite tu nueva contraseña...">
                </div>
            </div>
            <div class="form-help">Te recomendamos usar una contraseña corta, la cual puedas recordar facilmente.</div>
            <p class="submit-button"><button type="submit" class="rounded-button grey" name="savepass">Guardar</button></p>
        </form>
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
