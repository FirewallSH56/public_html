<?php
include "assets/system/core.php";

$page = basename($_SERVER["PHP_SELF"]);

 if(isset($_GET['id'])){
    if($_GET['id'] && !empty($_GET['id'])){
    $hj = mysqli_query($db,"SELECT * FROM cms_news WHERE id = '{$_GET['id']}'");
    $h_edit = mysqli_fetch_array($hj);
    if(isset($_GET['id'])){
if($_GET['id'] && !empty($_GET['id'])){

if(isset($_GET['action'])){

if($_GET['action'] == "err" && !empty($_GET['id'])){

            $query = mysqli_query($db,"DELETE FROM cms_comments WHERE id = '{$_GET['id']}'");

            if($query){
            header("Location: ".$rise_settings['weblink']."");   
            }                  
    }

}
}
}
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
    <title><?php echo $rise_settings['name'];?> - <?php echo $h_edit['title'];?></title>
	
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
	<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

	<!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="<?php echo $rise_settings['weblink'];?>/riseweb/js/addons.js"></script>
	<script src="<?php echo $rise_settings['weblink'];?>/riseweb/js/app.js"></script>
<script type="text/javascript">
        function BBCode(element, openTag, closeTag) {
  let textArea = $(element);

  let len = textArea.val().length;
  let start = textArea[0].selectionStart;
  let end = textArea[0].selectionEnd;

  let selectedText = textArea.val().substring(start, end);
  let replacement = openTag + selectedText + closeTag;

  textArea
    .val(
      textArea.val().substring(0, start) +
        replacement +
        textArea.val().substring(end, len)
    )
    .focus();
}

    </script>
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
      $_SESSION['loginuser'] = $l_user;
      $_SESSION['loginpass'] = $l_pass;
      header("Location: ".$rise_settings['weblink']."/home");
    }
  }
}
?>
<?php 
if ((isset($_POST['create']))) {

    $content = $_POST['content'];
    $date_full = time();
    
     $result = mysqli_query($db,"INSERT INTO cms_comments (`author`, `comentario`, `date`, `new_id`) VALUES ('".$myuser->name()."', '".$content."', '".time()."', '".$h_edit['id']."');");
                                        if ($result) {
                                       echo '<div class="notifications-container">
    
                <div class="notification-container" data-id="169df3869ed" data-type="success" style="display: block;">
            <a id="close-notification" href="#" class="notification-close"></a>
            <div class="notification-title">
                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Success!</font></font>
            </div>
            <div class="notification-content">
                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Comentaste este articulo.</font></font>
            </div>
        </div>
            </div>';
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
	<section class="page-container" data-page="article">
	<header class="page-header flex-container flex-vertical-center" style="background-size: 100%;width: 100%;background-image: url(<?php echo $h_edit['image'];?>); background-color: #272727;">
		<div class="page-header-content"><h1><?php echo $h_edit['title'];?></h1><?php echo $h_edit['categoria'];?>  - <?php echo date("M d, Y", $h_edit['date']); ?></div>
	</header>
	<div class="page-content">
		<div class="left-side">
			<article class="default-section">
				<?php echo $h_edit['content'];?>
				<div class="article-author flex-container flex-vertical-center">
					<?php 
			    $usersr = mysqli_query($db, "SELECT * FROM users WHERE username = '".$h_edit['author']."'");
			    while ($usersrc = mysqli_fetch_assoc($usersr)) {
			        ?>
					<div class="author-image">
					<img src="https://habbo.es/habbo-imaging/avatarimage?figure=<?php echo $usersrc['look'];?>&headonly=1&direction=2&head_direction=2&action=&gesture=&size=m" alt="">
					</div>
					<div class="author-details">
						<div class="author-name"> Equipo Staff </div>
												<div class="author-function"><?php echo $usersrc['username'];?></div>
											</div>
										<?php } ?>
				</div>
			</article>
			<?php if( $myuser::is_auth() ) { ?>
			<article class="default-section">
				<h3 class="aside-title">¿Que opinas de este articulo?</h3>
				<form method="POST" action="">
				<li onclick="BBCode('textarea[name=content]', '<b>', '</b>');" class="comentss"><b>B</b></li>
                <li onclick="BBCode('textarea[name=content]', '<i>', '</i>');" class="comentss"><i>I</i></li>
                <li onclick="BBCode('textarea[name=content]', '<s>', '</s>');" class="comentss"><s>S</s></li>
                <li onclick="BBCode('textarea[name=content]', '<u>', '</u>');" class="comentss"><u>U</u></li>
				<textarea name="content" class="comentarionoticia" placeholder="Escribe tu comentario..."></textarea>
				<input type="submit" name="create" class="rounded-button" value="Comentar">
				</form>
			</article>
		    <?php } ?>
		    <?php if( !$myuser::is_auth() ) { ?>
			<article class="default-section">
				Debes loguearte para poder comentar este articulo.
			</article>
		    <?php } ?>
			<article class="default-section">
				<h3 class="aside-title">Comentarios (<?php $resultado = mysqli_query($db,"SELECT * FROM cms_comments WHERE new_id = '".$h_edit['id']."'"); $número_filas = mysqli_num_rows($resultado); echo "$número_filas";?>)</h3>
				<?php 
			    $usersr = mysqli_query($db, "SELECT * FROM cms_comments WHERE new_id = '".$h_edit['id']."' ORDER BY id DESC");
			    while ($usersrc = mysqli_fetch_assoc($usersr)) {
			    $authors = mysqli_query($db, "SELECT * FROM users WHERE username = '".$usersrc['author']."'");
			    while ($author = mysqli_fetch_assoc($authors)) {
			        ?>
			        <div class="comentario">
			        	<div class="kekocoment">
					<img src="https://habbo.es/habbo-imaging/avatarimage?figure=<?php echo $author['look'];?>&headonly=1&direction=2&head_direction=2&action=&gesture=&size=m" alt="">
				        </div>
				        <div class="comentariotext">
				        	<b><a href="<?php echo $rise_settings['weblink'];?>/profile/<?php echo $usersrc['author'];?>" style="text-decoration: none;"><?php echo $usersrc['author'];?></a></b> -  Hace <?php echo diff_for_humans( $usersrc['date']); ?> <?php if( $myuser::is_auth() ) { ?><span style="float: right;"><?php
if ($usersrc['author'] == $myuser->name()) {
    echo '<a href="'.$rise_settings['weblink'].'/news.php?action=err&id='.$usersrc['id'].'" style="color:#FA5858;text-decoration: none;">Borrar</a>';
}
         else {
         if ($myuser->rank > 4) {
           echo '<a href="'.$rise_settings['weblink'].'/news.php?action=err&id='.$usersrc['id'].'" style="color:#FA5858;text-decoration: none;">Borrar</a>';
          }
}
        ?></span><?php } ?><br>
				        	<?php echo $usersrc['comentario'];?>
				        </div>
					</div>
			   <?php }  } if(mysqli_num_rows($usersr) == 0) { echo 'Aún no hay comentarios en este articulo...';}?>
			</article>
		</div>
		<div class="right-side">
			<aside class="default-section">
				<h3 class="aside-title">Noticias Recientes</h3>
				<div class="related-articles-container">
					<?php 
			    $newsr = mysqli_query($db, "SELECT * FROM cms_news ORDER BY id DESC LIMIT 8");
			    while ($newsc = mysqli_fetch_assoc($newsr)) {
			        ?>
                    <a href="/news/<?php echo $newsc['id'];?>" class="related-article-container">
						<div class="related-article-thumbnail" style="background-image: url(<?php echo $newsc['image'];?>);"></div>
						<div class="related-article-details">
							<div class="related-article-title"><?php echo $newsc['title'];?></div>
							<div class="related-article-date"><?php echo date("M d, Y", $newsc['date']); ?></div>
						</div>
					</a>
					<?php } ?>
				</div>
			</aside>
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
<script>
                        CKEDITOR.replace( 'editor1' );
                </script>
</html>
<?php } } ?>
