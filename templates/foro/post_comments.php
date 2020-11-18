<article class="default-section">
				<h3 class="aside-title">¿Que opinas de este tema?</h3>
				<form method="POST" action="">
				<li onclick="BBCode('textarea[name=content]', '<b>', '</b>');" class="comentss"><b>B</b></li>
                <li onclick="BBCode('textarea[name=content]', '<i>', '</i>');" class="comentss"><i>I</i></li>
                <li onclick="BBCode('textarea[name=content]', '<s>', '</s>');" class="comentss"><s>S</s></li>
                <li onclick="BBCode('textarea[name=content]', '<u>', '</u>');" class="comentss"><u>U</u></li>
				<textarea name="content" class="comentarionoticia" placeholder="Escribe tu comentario..."></textarea>
				<input type="submit" name="create" class="rounded-button" value="Comentar">
				</form>
			</article>
<article class="default-section ranking-container">
	<h3 id="values-update-text" class="aside-title">Comentarios (<?php $resultado = mysqli_query($db,"SELECT * FROM forum_replies WHERE post = '".$h_edit['id']."'"); $número_filas = mysqli_num_rows($resultado); echo "$número_filas";?>)</h3>
	<?php 
			    $usersr = mysqli_query($db, "SELECT * FROM forum_replies WHERE post = '".$h_edit['id']."' ORDER BY id DESC");
			    while ($usersrc = mysqli_fetch_assoc($usersr)) {
			    $authors = mysqli_query($db, "SELECT * FROM users WHERE username = '".$usersrc['author']."'");
			    while ($author = mysqli_fetch_assoc($authors)) {
			        ?>
			        <div class="comentario">
			        	<div class="kekocoment">
					<img src="https://habbo.es/habbo-imaging/avatarimage?figure=<?php echo $author['look'];?>&headonly=1&direction=2&head_direction=2&action=&gesture=&size=m" alt="">
				        </div>
				        <div class="comentariotext">
				        	<b><a href="<?php echo $rise_settings['weblink'];?>/profile/<?php echo $usersrc['author'];?>" style="text-decoration: none;"><?php echo $usersrc['author'];?></a></b> -  Hace <?php echo diff_for_humans( $usersrc['date']); ?> <?php if( $myuser::is_auth() ) { ?><span style="float: right;"><?php
if ($usersrc['author'] == $myuser->name()) {
    echo '<a href="'.$rise_settings['weblink'].'/post.php?action=err&id='.$usersrc['id'].'" style="color:#FA5858;text-decoration: none;">Borrar</a>';
}
         else {
         if ($myuser->rank > 4) {
           echo '<a href="'.$rise_settings['weblink'].'/post.php?action=err&id='.$usersrc['id'].'" style="color:#FA5858;text-decoration: none;">Borrar</a>';
          }
}
        ?></span><?php } ?><br>
				        	<?php echo $usersrc['comment'];?>
				        </div>
					</div>
			    <?php } } ?>
</article>