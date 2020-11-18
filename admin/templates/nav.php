<div class="col-4">
    <a href="<?php echo $rise_settings['weblink'];?>/admin/index.php" id="settings-navigation-box" <?php if ($page == "index.php") echo 'class="selected"' ?>>
                <div class="png20">
                    <i class="far fa-home icon"></i>
                    <div class="settings-title">Inicio</div>
                    <div class="settings-desc">Dashboard Panel ADM</div>
                </div>
                <div class="clear"></div>
            </a>
            <a href="<?php echo $rise_settings['weblink'];?>/admin/news.php" id="settings-navigation-box" <?php if ($page == "news.php") echo 'class="selected"' ?><?php if ($page == "news_create.php") echo 'class="selected"' ?><?php if ($page == "editnew.php") echo 'class="selected"' ?>>
                <div class="png20">
                    <i class="far fa-list icon"></i>
                    <div class="settings-title">Noticias</div>
                    <div class="settings-desc">Crear / Editar Noticias</div>
                </div>
                <div class="clear"></div>
            </a>
            <a href="<?php echo $rise_settings['weblink'];?>/admin/bans.php" id="settings-navigation-box" <?php if ($page == "bans.php") echo 'class="selected"' ?>>
                <div class="png20">
                    <i class="far fa-users icon"></i>
                    <div class="settings-title">Baneos</div>
                    <div class="settings-desc">Banear / Desbanear Usuarios</div>
                </div>
                <div class="clear"></div>
            </a>
            <a href="<?php echo $rise_settings['weblink'];?>/admin/badges.php" id="settings-navigation-box" <?php if ($page == "badges.php") echo 'class="selected"' ?>>
                <div class="png20">
                    <i class="far fa-badge icon"></i>
                    <div class="settings-title">Placas</div>
                    <div class="settings-desc">Agregar / Borrar Placas</div>
                </div>
                <div class="clear"></div>
            </a>
            <div class="png20">
         <center>&copy Derechos Reservados a <?php echo $rise_settings['name'];?> <br>
         Desarrollado y Programado por <b>Onekeko</b></center>     
            </div>
            <div class="clear"></div>
        </div>