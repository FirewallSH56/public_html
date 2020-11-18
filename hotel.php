<?php
	include "assets/system/core.php";
    include "assets/system/ticket.php";

	$query = mysqli_query($db, "UPDATE users SET auth_ticket = '".GenerateTicket()."', ip_current = '".$ip."' WHERE id = '".$myuser->id."'");

	$ticketsql = mysqli_query($db, "SELECT * FROM users WHERE id = '".$myuser->id."'");
	$ticketrow = mysqli_fetch_assoc($ticketsql);

?>
<!DOCTYPE html>
<html lang="es_ES">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Hisland - Client</title> 
        <link rel="stylesheet" href="<?php echo $rise_settings['weblink'];?>/app/cliente/css/cliente.css?aasddsasd">
        <link rel="stylesheet" href="<?php echo $rise_settings['weblink'];?>/app/cliente/css/cliente2.css?sassasad">
        <link href="<?php echo $rise_settings['weblink'];?>/radio/css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $rise_settings['weblink'];?>/radio/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $rise_settings['weblink'];?>/radio/css/tipped.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" href="<?php echo $rise_settings['weblink'];?>/favicon.png?" type="image/x-icon">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <meta name="description" content="Diversión al limite!" />
        <link rel="stylesheet" href="<?php echo $rise_settings['weblink'];?>/app/cliente/css/cliente.css?aasddsasd">
        <script type="text/javascript" src="<?php echo $rise_settings['weblink'];?>/app/cliente/js/habboflash.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <style type="text/css"> 
          #flash-container,body{width:100%;height:100%;margin:0}body{background-color:#000}#client-ui{height:100%}#flash-container{position:absolute;left:0;right:0;top:0;bottom:0;overflow:hidden}.adblock {background-color: rgba(255,255,255,0.9);color: #000;height: 100%;width: 100%;z-index: 1;position: fixed;text-align: center;padding-top: 150px;font-family: cursive;}.adblock .main {font-weight: bold;font-size: 40px;}.adblock .desc {font-size: 12px;}
            .demo-modal {
    background-color: #FFF;
    box-shadow: 0 11px 15px -7px rgba(0, 0, 0, 0.2), 0 24px 38px 3px rgba(0, 0, 0, 0.14), 0 9px 46px 8px rgba(0, 0, 0, 0.12);
    padding: 20px;
    border-radius: 4px;
    width: 50%;
    position: relative;
    display: none;
}
 #clienterror{color:#FFFFFF;background:#000000;font-family:'Ubuntu';padding:48px 12px;width:100%;height:100%;display:none;position:fixed;top:0;left:0;text-align:center;z-index:1000000;}#clienterror p{width:445px;margin:0 auto;font-family:'Ubuntu';font-size:24px;text-align:center;padding:20px 0;}#clienterror a{margin:0 auto;margin-bottom:10px;display:block;}#clientdcerror{color:#FFFFFF;background:#000000;background:rgba(0,0,0,0.85);font-family:'Ubuntu';padding:48px 12px;width:100%;height:100%;display:none;position:fixed;top:0;left:0;text-align:center;z-index:1000000;}#clientdcerror p{width:445px;margin:0 auto;font-family:'Ubuntu';font-size:24px;text-align:center;padding:20px 0;}#clientdcerror a{margin:0 auto;margin-bottom:10px;display:block;}

#px_unFreezer{
                background: black;
                color: white;
                cursor: pointer;
                z-index: 999;
                position: absolute;
                top: 0;
                left: 0;
                font-family: sans-serif;
                padding: 3px;
                font-size: 11px;
                -webkit-touch-callout: none;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
}
    
        </style>

<div id="clienterror">
<p>¡Oh no!<br/><br/>No se pudo activar Adobe Flash Player en tu navegador.<br/><br/>Puedes intentar activar Flash Player usando el botón de abajo o descargándolo desde la página de Adobe.</p>
<a href="http://www.adobe.com/go/getflashplayer"><img src="https://i.imgur.com/xZenglQ.png" onmouseover="" style="cursor: pointer;"></a>
</div>      

<script>
    if(typeof(window.FlashExternalnterface) === "undefined") {        window.FlashExternalInterface = {};    }
window.FlashExternalInterface.logLoginStep = function(b) {
    if (b == "client.init.start") {
        document.getElementById('loader_bar').style = "width:20%;";
    }
    if (b == "client.init.core.init") {
    document.getElementById('loader_bar').style = "width:40%;";
    }
    if (b == "client.init.auth.ok") {
    document.getElementById('loader_bar').style = "width:50%;";
    }
    if (b == "client.init.localization.loaded") {
    document.getElementById('loader_bar').style = "width:100%;";
    }
    if (b === "client.init.config.loaded") {
                setTimeout(function() {
                      document.getElementById('loader_bar').style = "width:100%;";
                }, 3000);
        setTimeout(function() {
            $('body').addClass('loaded');
        }, 5000);
    }
}
</script>
<div id="loader-wrapper" >

    <div class="loaderdeps">
         <div id="loaderdeps">
            <img id="izabbo-logo" style="position:absolute;top:-50%;" src="/izabbo.gif">
            <div id="loaderpre">
                <div class="percent" id="loader_bar"></div>
            </div>
        </div>
        <div id="efect-client"></div>
    <div class="loader-section section-top"></div>
    <div class="loader-section section-bottom"></div>
    </div>
</div>

<div class="loader">
<div id="isload">
</div> 
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script>

</head>

<body>
  <div id="flash-wrapper">
<div id="flash-container">
</div>
<div id="flash-container">
</div>

</div>
<div id="flash-container"> </div>  



        <script type="text/javascript">
            function resizeClient(){
                var theClient = document.getElementById('client');
                var theWidth = theClient.clientWidth;
                theClient.style.width = "10px";
                theClient.style.width = theWidth + "px";
            }
        </script>
<script type="text/javascript">
function toggleFullScreen() {
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
    if (document.documentElement.requestFullScreen) {  
      document.documentElement.requestFullScreen();  
    } else if (document.documentElement.mozRequestFullScreen) {  
      document.documentElement.mozRequestFullScreen();  
    } else if (document.documentElement.webkitRequestFullScreen) {  
      document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
    }  
  } else {  
    if (document.cancelFullScreen) {  
      document.cancelFullScreen();  
    } else if (document.mozCancelFullScreen) {  
      document.mozCancelFullScreen();  
    } else if (document.webkitCancelFullScreen) {  
      document.webkitCancelFullScreen();  
    }  
  }  
}
</script>
<script type="text/javascript">
                        var callback = function(e) {
            
            if(!e.success) {
                document.getElementById("clienterror").style.display = "block";
            }
            else {
                document.getElementById("clienterror").style.display = "none";
            }
            };
        var flashvars = {
           "client.allow.cross.domain" : "0", 
            "client.notify.cross.domain" : "1", 
            "connection.lnfo.host" : "81.169.141.79", 
            "connection.lnfo.port" : "30000", 
            "site.url" : "https://hisland.es", 
            "url.prefix" : "https://hisland.es", 
            "client.reload.url" : "https://hisland.es/client", 
            "client.fatal.error.url" : "https://hisland.es/client", 
            "client.connection.failed.url" : "https://hisland.es/client", 
            "logout.url" : "https://hisland.es/home", 
            "logout.disconnect.url" : "https://hisland.es/home", 
            "external.variables.txt" : "https://hisland.es/swf/gamedata/external_variables.txt?depsaasd", 
            "external.texts.txt" : "https://hisland.es/swf/gamedata/external_flash_texts.txt?SAdasdad",
            "productdata.load.url" : "https://hisland.es/swf/gamedata/productdata.txt?Asdasdasd", 
            "furnidata.load.url" : "https://hisland.es/swf/gamedata/furnidata.xml?ASDasdasdasdADA", 
            "clientview.banner.url" : "https://hisland.es/swf/gamedata/supersecret.php?ASdadsadasas", 
            "sso.ticket": "SLOPT-JoWx2wKhewzC90Nf7yAyS3tEa-SSO",
            "processlog.enabled" : "1", 
            "account_id" : "1592", 
            "client.starting.revolving" : "Para ciencia, \u00A1T\u00FA, monstruito!\/Cargando iZabbo, tu mundo pixeleado.\/\u00BFTe apetecen salchipapas con qu\u00E9?\/Sigue al pato amarillo.\/El tiempo es s\u00F3lo una ilusi\u00F3n.\/\u00A1\u00BFTodav\u00EDa estamos aqu\u00ED?!\/Me gusta tu camiseta.\/Mira a la izquierda. Mira a la derecha. Parpadea dos veces. \u00A1Ta-ch\u00E1n!\/No eres t\u00FA, soy yo.\/Shhh! Estoy intentando pensar.\/Cargando el universo de p\u00EDxeles.","connection.info.host" : "81.169.141.79",   
            "flash.client.url" : "https://hisland.es/swf/gordon/PRODUCTION-201601012205-226667486/",
            "user.hash" : "5690170255dbf26e0275377f436614c91d1a810d",
            "connection.info.port" : "30000",
            "has.identity" : "1", 
            "flash.client.origin" : "popup", 
            "nux.lobbies.enabled" : "false", 
            "country_code" : "DO" 
        };

        var params = {
            "base" : "https://hisland.es/swf/gordon/PRODUCTION-201601012205-226667486/",
            "allowScriptAccess" : "always",
            "menu" : "true"
        };

        swfobject.embedSWF("https://hisland.es/swf/gordon/PRODUCTION-201601012205-226667486/habbois1.swf?jnjnjn", "flash-container", "100%", "100%", "10.1.0", "https://cdn.uber.meth0d.org/expressInstall.swf", flashvars, params, null, callback);
 </script>


 

</body>
</html>