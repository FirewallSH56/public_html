<article id="pbadges" class="default-section" data-section="badges">
	<h3 class="aside-title">Placas <span>5 de <?php $resultado = mysqli_query($db,"SELECT * FROM users_badges WHERE user_id = '".$h_edit['id']."'"); $número_filas = mysqli_num_rows($resultado); echo "$número_filas";?></span></h3>
	<div class="items-container">
		<?php 
          $bxd = mysqli_query($db, "SELECT * FROM users_badges WHERE user_id = '$h_edit[id]' ORDER BY id DESC LIMIT 5"); while($comments = mysqli_fetch_assoc($bxd)){ ?>
        <div class="item-container">
			<div class="item-icon pixelated" style="background-image: url(https://images.habbo.com/c_images/album1584/<?php echo $comments['badge_code'];?>.gif);">
			</div>
		</div>
		<?php } ?>
	</div>
</article>