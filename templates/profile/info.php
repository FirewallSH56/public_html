<aside id="pprofile" class="default-section">
	<div class="profile-header">
		<div class="header-content flex-container flex-vertical-center" style="background-color: #<?php echo $h_edit['color'];?>;">
			<img src="https://habbo.es/habbo-imaging/avatarimage?figure=<?php echo $h_edit['look'];?>&action=std&gesture=std&direction=2&head_direction=2&size=l&img_format=png" alt="Onekeko" class="pixelated">
			<div class="header-details">
				<div class="header-title">
					<?php echo $h_edit['username'];?> 
				</div>
				<div class="header-description"></div>
				<div class="profile-icon">
					<img src="<?php echo $rise_settings['weblink'];?>/riseweb/images/icon-credits.png" style="position:relative;top:8px;"> <?php echo $h_edit['credits'];?>
				</div>
				<div class="profile-icon">
					<img src="<?php echo $rise_settings['weblink'];?>/riseweb/images/icon-diamonds.png" style="position:relative;;top:8px;"> <?php echo $h_edit['pixels'];?>
				</div>
				<div class="profile-icon">
					<img src="<?php echo $rise_settings['weblink'];?>/riseweb/images/icon-flames.png" style="position:relative;;top:5px;"> <?php echo $h_edit['points'];?>
				</div>
						</div>
					</div>
				</div>
				<div class="profile-content">
					<div class="details-container">
						<i class="fas fa-user" style="margin-right:10px;"></i> Se registro el <b><?php echo date("d/m/Y", $h_edit['account_created']); ?></b>
					</div>
					<div class="details-container">
						<i class="fas fa-hotel" style="margin-right:10px;"></i> Se encuentra 
						<?php if ($h_edit['online'] == '0') { ?>
						<strong class="offline">offline</strong>
					    <?php } ?>
					    <?php if ($h_edit['online'] == '1') { ?>
						<strong class="online">online</strong>
					    <?php } ?>
					</div>
					<div class="details-container">
						<i class="fas fa-door-open" style="margin-right:10px;"></i> Se conecto hace <b><?php echo diff_for_humans( $h_edit['last_online']); ?></b>
					</div>
					<div class="details-container"><i class="fas fa-headphones-alt" style="margin-right:10px;"></i> <a href="<?php echo $myuser->youtube;?>" target="_blank"><?php echo $h_edit['youtube'];?></a>
					</div>					
				</div>
				    <?php
if ($h_edit['username'] == $myuser->name()) {
    echo '<div class="profile-askfriend-button" data-id="1">
					<a class="rounded-button custom" href="'.$rise_settings['weblink'].'/settings/profile">Editar Perfil</a>
				    </div>';
}
?>
</aside>