<aside class="default-section">
	<h3 class="aside-title">Ultimo Tema</h3>
		<?php 
		$postr = mysqli_query($db, "SELECT * FROM forum_post ORDER BY id DESC LIMIT 1");
		while ($postc = mysqli_fetch_assoc($postr)) {
		?>
		<div class="ult_post">
			<div class="keko_post">
			<img src="https://habbo.es/habbo-imaging/avatarimage?figure=<?php echo $myuser->look;?>&headonly=1&direction=2&head_direction=2&action=&gesture=&size=m" alt="">
			</div>
			<div class="name_post">
				<div class="info_post" style="overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 116px;">
				<a href="<?php echo $rise_settings['weblink'];?>/forum/post/<?php echo $postc['id'];?>"><?php echo $postc['title'];?></a>
			    </div>
				<img src="<?php echo $rise_settings['weblink'];?>/assets/template/images/username.png" style="position: relative;top:3px;margin-right:5px;">
				<span style="position: relative;top:-3px;"><?php echo $postc['author'];?></span>
			</div>
		</div>
		<?php   } if(mysqli_num_rows($postr) == 0) { echo 'Aún no hay temas en el foro...';}?>
</aside>