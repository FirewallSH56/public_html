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
    <title><?php echo $rise_settings['name'];?> - Equipo Staff</title>
	
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
<section class="page-container" data-page="community_team">
		<header class="page-header flex-container flex-vertical-center">
		<div class="page-header-content"><h1><?php echo $rise_settings['name'];?> Equipo Staff</h1> Aquí veras al equipo staff del hotel.</div>
	</header>

	<div class="page-content">
    <div class="left-side">
<?php
  $ranks = mysqli_query($db, "SELECT * FROM ranks WHERE id >= '6' ORDER BY id DESC");
    while ($rankc = mysqli_fetch_assoc($ranks)) {
                  ?>
		<article class="default-section">
            <h3 class="aside-title"><?php echo $rankc['name'];?></h3> <?php echo $rankc['title'];?>
			<div class="members-container">
<?php
  $users = mysqli_query($db, "SELECT * FROM users WHERE rank = $rankc[id]");
    while ($usersc = mysqli_fetch_assoc($users)) {
                  ?>
                				<div class="member-container">
                    <a href="<?php echo $rise_settings['weblink'];?>/profile/<?php echo $usersc['username'];?>" class="member-content flex-container flex-vertical-center">
                        <div class="member-avatar flex-container flex-vertical-center flex-horizontal-center" style="overflow:hidden;">
                            <img src="https://habbo.it/habbo-imaging/avatarimage?figure=<?php echo $usersc['look'];?>&action=std&gesture=std&direction=2&head_direction=2&size=n&headonly=1&img_format=png" alt="Mortka" class="pixelated" style="margin-top:0px;">
                        </div>
                        <div class="member-details">
                        
                            <div class="details-username"><?php echo $usersc['username'];?></div>
                            <div class="details-motto"><?php echo $usersc['motto'];?></div>
                        </div>
                        <div class="member-status flex-container flex-vertical-center flex-horizontal-center">
                        	  <?php if ($usersc['online'] == '0') { ?>
                        	  	<span class="status-icon offline" title="Offline"></span>
                        	  <?php } ?>
                        	  <?php if ($usersc['online'] == '1') { ?>
                        	  	<span class="status-icon online" title="online"></span>
                        	  <?php } ?>
                        </div>
                    </a>
                </div>
<?php } if(mysqli_num_rows($users) == 0) { echo 'No hay nadie con este cargo por ahora...';}?>
                            </div>
        </article>
    <?php } ?>
	</div>
	<div class="right-side">
        <aside class="default-section">
            <h3 class="aside-title">Staff Información</h3>
            <p><center>¿Quieres formar parte del equipo de <?php echo $rise_settings['name'];?>?</center></p>
        </aside>
</section>
</div>
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
