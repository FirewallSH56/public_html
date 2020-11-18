<header id="header" class="header-container pixelated is-small is-logged">
		<div class="header-content">
			
			<div class="logo"><a href="#"><?php echo $rise_settings['weblink'];?></a></div>
			<div class="account-container">
				<div id="account-buttons" class="account-buttons">
					<?php if( $myuser::is_auth() ) { ?>
					<a href="<?php echo $rise_settings['weblink'];?>/hotel" target="_blank" class="rounded-button white plain hotel-button" style="margin-right:20px;">Entrar al Hotel
					</a>
					<button class="playercount login-dialog-button">
						<?php $resultado = mysqli_query($db,"SELECT * FROM users WHERE online = '1'"); $número_filas = mysqli_num_rows($resultado); echo "$número_filas";?> <i class="fas fa-user"></i>
					</button>
					<?php } ?>
					<?php if( !$myuser::is_auth() ) { ?>
						<button id="register-popup-button" class="rounded-button white plain">Registro</button>
                    <span></span>
                    <button id="login-popup-button" class="rounded-button white login-dialog-button">Acceder</button>
					<?php } ?>		
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