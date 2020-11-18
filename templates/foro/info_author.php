<aside id="pprofile" class="default-section">
		<h3 class="aside-title">Info. del autor</h3>
	<?php 
		$usersr = mysqli_query($db, "SELECT * FROM users WHERE username = '".$h_edit['author']."' ORDER BY id DESC");
		while ($usersc = mysqli_fetch_assoc($usersr)) {
		?>
<div class="info_author">
	<div class="keko_author">
		<img src="https://habbo.es/habbo-imaging/avatarimage?figure=<?php echo $usersc['look'];?>&action=std&gesture=std&direction=2&head_direction=2&size=n&img_format=png" alt="Onekeko" class="pixelated" style="position: relative;">
	</div>
	<div class="two_infoauthor">
	<div class="name_author"><a href="<?php echo $rise_settings['weblink'];?>/profile/<?php echo $h_edit['author'];?>" style="text-decoration: none;"><?php echo $h_edit['author'];?></a></div>
	<div class="name_author"><?php echo $usersc['motto'];?></div>
	<?php if ($usersc['online'] == '0') { ?>
	<div class="offline_author">Offline</div>
	<?php } ?>
	<?php if ($usersc['online'] == '1') { ?>
	<div class="online_author">¡Online!</div>
	<?php } ?>
	</div>
</div>
<?php
if ($usersc['username'] == $myuser->name()) {
echo '<div class="edit_post"><a href="'.$rise_settings['weblink'].'/editpost.php?action=edit&id='.$h_edit['id'].'">Editar Tema</a></div>';
}
else {
if ($myuser->rank > 4) {
echo '<div class="edit_post"><a href="'.$rise_settings['weblink'].'/editpost.php?action=edit&id='.$h_edit['id'].'">Editar Tema</a></div>
';
}
}
?>
<?php } ?>	
</aside>