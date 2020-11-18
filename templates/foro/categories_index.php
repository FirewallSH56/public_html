<article class="default-section ranking-container">
	<h3 id="values-update-text" class="aside-title">Categorias del Foro</h3>
		<?php 
		$categoriesr = mysqli_query($db, "SELECT * FROM forum_categories ORDER BY id ASC");
		while ($categoriesc = mysqli_fetch_assoc($categoriesr)) {
		?>
		<div class="categorie_link"><span class="cate_name"><a href="<?php echo $rise_settings['weblink'];?>/forum/categorie/<?php echo $categoriesc['id'];?>"><?php echo $categoriesc['name'];?></a></span>
			<span class="categorie_info">
				<div class="text_catinfo">Temas</div><div class="comments_num"><?php $resultado = mysqli_query($db,"SELECT * FROM forum_post WHERE categorie = '".$categoriesc['id']."'"); $número_filas = mysqli_num_rows($resultado); echo "$número_filas";?></div>
			</span>
		</div>
		<?php } ?>
</article>