<article class="default-section ranking-container" style="overflow: hidden;">
	<h3 id="values-update-text" class="aside-title"><?php echo $h_edit['name'];?>
		<span style="float: right;">
<?php
                    if ($myuser->rank >= $h_edit['rank']) {
                        ?>
			<a href="<?php echo $rise_settings['weblink'];?>/forum/newpost/<?php echo $h_edit['id'];?>">
				<div class="rounded-button" style="background: #333;color:#fff;">Nuevo Tema</div>
			</a>
		<?php } ?>
		</span>
	</h3>
		<?php 
		$categoriesr = mysqli_query($db, "SELECT * FROM forum_post WHERE categorie = '".$h_edit['id']."' ORDER BY id DESC");
		while ($categoriesc = mysqli_fetch_assoc($categoriesr)) {
		?>
		<div class="categorie_link"><span class="cate_name"><a href="<?php echo $rise_settings['weblink'];?>/forum/post/<?php echo $categoriesc['id'];?>"><?php echo $categoriesc['title'];?></a></span>
			<span class="categorie_info">
				<div class="text_catinfo">Comentario(s)</div><div class="comments_num"><?php $resultado = mysqli_query($db,"SELECT * FROM forum_replies WHERE post = '".$categoriesc['id']."'"); $número_filas = mysqli_num_rows($resultado); echo "$número_filas";?></div>
			</span>
		</div>
		<?php   } if(mysqli_num_rows($categoriesr) == 0) { echo 'Aún no hay temas en esta categoria...';}?>
		<!-- <div class="pagebotton">1</div><div class="pagebotton">1</div> -->
</article>