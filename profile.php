<?php
include "assets/system/core.php";


if( !$myuser::is_auth() )
	header("Location: ".$rise_settings['weblink']."/index/");
 if(isset($_GET['username'])){
    if($_GET['username'] && !empty($_GET['username'])){
    $hj = mysqli_query($db,"SELECT * FROM users WHERE username = '{$_GET['username']}'");
    $h_edit = mysqli_fetch_array($hj);
    if(isset($_GET['username'])){
if($_GET['username'] && !empty($_GET['username'])){
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
    <title><?php echo $rise_settings['name'];?> - <?php echo $h_edit['username'];?></title>
	
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
<style>
/* Theme */
body {
	background-image: url('/riseweb/images/profiles/backgrounds/<?php echo $h_edit['bg'];?>');
}

.rounded-button.custom {
    color: #<?php echo $h_edit['color'];?>;
    border-color: #<?php echo $h_edit['color'];?>;
}

.rounded-button.custom:not([disabled]):not(.no-hover):hover,
.rounded-button.custom.plain{
    background-color: #<?php echo $h_edit['color'];?>;
    color: #fff;
}

.rounded-button.custom.plain:not([disabled]):not(.no-hover):hover{
    border-color: #1a958f;
    background-color: #<?php echo $h_edit['color'];?>;
}

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 3.0em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

.rating > input:checked ~ label,
.rating:not(:checked) > label:hover,
.rating:not(:checked) > label:hover ~ label { color: #47aeec;  }

.rating > input:checked + label:hover,
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label,
.rating > input:checked ~ label:hover ~ label { color: #47aeec;  }

.profile-visitor {
    margin-left: -15px;
    max-height: 60px;
    margin-top: -10px;
}

.profile-visitor:hover .tooltip {
  visibility: visible;
}

.profile-visitor .tooltip {
visibility: hidden;
    visibility: hidden;
    width: auto;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    position: absolute;
    z-index: 1;
    margin-top: -140px;
    opacity: 0.5;
    text-align: center;
    padding-left: 10px;
    padding-right: 10px;
	font-size: 11px;
}

.profile-tooltip {
	position: absolute;
	max-width: 0px;
	  margin: auto;
  width: 50%;
  padding:13px;
  	max-width:1px;
	text-align: center;
}
</style>

<script type="text/javascript">
$(document).ready(function () {
$('input[type=radio]').on('change', function() {
    document.getElementById("profile-rating").submit();
});
});
</script>

<section class="page-container" data-page="profile">
	<div class="page-content">
		<div class="right-side">
			<?php 
			require_once "templates/profile/info.php";
			require_once "templates/profile/two_info.php";
			?>
		</div>
		<div class="left-side">
			<?php 
			require_once "templates/profile/badges.php";
			?>
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
<?php } } } } ?>