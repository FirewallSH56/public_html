<article class="default-section ranking-container">
	<h3 id="values-update-text" class="aside-title">Editar Tema</h3>
	<form action="" method="POST">
	<input type="text" name="title" class="rounded-input grey-active" value="<?php echo $h_edit['title'];?>" style="margin-bottom:10px;">
	<textarea name="editor1" required style="margin-bottom:10px;"><?php echo $h_edit['content'];?></textarea>
	<input type="submit" name="update" class="rounded-button" style="margin-top: 10px;" value="Actualizar">
	<a href="<?php echo $rise_settings['weblink'];?>/editpost.php?action=err&id=<?php echo $h_edit['id'];?>"><div class="rounded-button maroon">Borrar Tema</div></a>
	</form>
</article>