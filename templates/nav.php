<nav class="navigation-container">
        <ul class="navigation-menu flex-container">
		
            <li class="navigation-item main-link-item">
				<a id="rise-logo-medium"><?php echo $rise_settings['name'];?></a>
			</li>
			
            <li class="navigation-item  <?php if ($page == "home.php") echo 'selected' ?>" data-category="home"><a href="<?php echo $rise_settings['weblink'];?>/home">Home</a></li>
			
            <li class="navigation-item has-items <?php if ($page == "photos.php") echo 'selected' ?><?php if ($page == "staff.php") echo 'selected' ?><?php if ($page == "contributors.php") echo 'selected' ?><?php if ($page == "tops.php") echo 'selected' ?>" data-category="community">
                <a href="#">Comunidad</a>
                <ul class="navigation-submenu">
                    <li class="navigation-subitem"><a href="<?php echo $rise_settings['weblink'];?>/community/photos">Fotos</a></li>
                    <li class="navigation-subitem"><a href="<?php echo $rise_settings['weblink'];?>/community/staff">Equipo Staff</a></li>
					<li class="navigation-subitem"><a href="<?php echo $rise_settings['weblink'];?>/community/contributors">Contribuyentes</a></li>
					<li class="navigation-subitem"><a href="<?php echo $rise_settings['weblink'];?>/community/tops">Tops</a></li>
                </ul>
            </li>
			
            <li class="navigation-item has-items <?php if ($page == "vip.php") echo 'selected' ?><?php if ($page == "currency.php") echo 'selected' ?><?php if ($page == "history.php") echo 'selected' ?>" data-category="shop">
                <a href="#">Tienda</a>
                <ul class="navigation-submenu">
					<li class="navigation-subitem"><a href="<?php echo $rise_settings['weblink'];?>/store/vip">Membresias VIP</a></li>
					<li class="navigation-subitem"><a href="<?php echo $rise_settings['weblink'];?>/store/currency">Banco</a></li>
                    <li class="navigation-subitem"><a href="<?php echo $rise_settings['weblink'];?>/store/history">Mi Historial</a></li>
				</ul>
            </li>
			
			<li class="navigation-item <?php if ($page == "forum.php") echo 'selected' ?><?php if ($page == "categorie.php") echo 'selected' ?><?php if ($page == "post.php") echo 'selected' ?><?php if ($page == "newpost.php") echo 'selected' ?><?php if ($page == "editpost.php") echo 'selected' ?>" data-category="help">
                <a href="<?php echo $rise_settings['weblink'];?>/forum">Foro</a>
            </li>
			
			<li class="navigation-item <?php if ($page == "values.php") echo 'selected' ?>" data-category="values">
                <a href="<?php echo $rise_settings['weblink'];?>/values">Precio de Rares</a>
            </li>
            
						<?php if( $myuser::is_auth() ) { ?>
						<li class="navigation-item navigation-right-side-item has-items ">
                <a href="#">
                    <div class="account-avatar"><img src="https://habbo.es/habbo-imaging/avatarimage?figure=<?php echo $myuser->look;?>&action=std&gesture=std&direction=2&head_direction=2&size=n&img_format=png" alt="" class="pixelated"></div>
                    <span><?php echo $myuser->name();?></span>
                </a>
                <ul class="navigation-submenu">
                     <?php
                    if ($myuser->rank >= 4) {
                        ?>
                    <li class="navigation-subitem">
                        <a href="<?php echo $rise_settings['weblink'];?>/admin/index.php" style="color:#FA5858;">Panel ADM</a>
                    </li>
                <?php } ?>
                    <li class="navigation-subitem">
                        <a href="<?php echo $rise_settings['weblink'];?>/settings/preferencias">Configuracion</a>
                    </li>
					<li class="navigation-subitem">
                        <a href="<?php echo $rise_settings['weblink'];?>/profile/<?php echo $myuser->name();?>">Mi Perfil</a>
                    </li>
					<li class="navigation-subitem">
						<a href="<?php echo $rise_settings['weblink'];?>/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
						<form id="logout-form" action="<?php echo $rise_settings['weblink'];?>/logout" method="POST" style="display: none;">
							<input type="hidden" name="_token" value="RQmqKzw6NiJKbk0qCbhxH3VnbJxQdLETqNTtAXcF">
                        </form>
					</li>
                </ul>
            </li>
        <?php } ?>
        <?php if( !$myuser::is_auth() ) { ?>
            <li id="guest-login" class="navigation-item navigation-right-side-item ">
                <a>
                    <div class="account-avatar"><img src="<?php echo $rise_settings['weblink'];?>/riseweb/images/avatar-guest.png" alt="Guest" class="pixelated"></div>
                    <span>Guest</span>
                </a>
            </li>
        <?php } ?>
					</ul>
    </nav>