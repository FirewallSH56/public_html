<aside id="rating" class="default-section">
				<div class="items-container">
					<h3 class="aside-title">Salas <span>5 de <?php $resultado = mysqli_query($db,"SELECT * FROM rooms WHERE owner_id = '".$h_edit['id']."'"); $número_filas = mysqli_num_rows($resultado); echo "$número_filas";?></span></h3>
					<table style="width: 100%;background: rgb(0,0,0, .1);padding: 5px;border-radius: 5px;">
						<tbody>
							<tr>
								<td style="border-bottom:1px solid #fff;">Nombre de Sala</td>
								<td style="border-bottom:1px solid #fff;"></td>
							</tr>
<?php 
    $rooms = mysqli_query($db, "SELECT * FROM rooms WHERE owner_id = '".$h_edit['id']."' ORDER BY id ASC LIMIT 5");
	while ($roomsc = mysqli_fetch_assoc($rooms)) {
	?>
							<tr>
								<td><?php echo $roomsc['name'];?></td>
								<td><a href="<?php echo $rise_settings['weblink'];?>/hotel/room/<?php echo $roomsc['id'];?>">Ir a sala >></a></td>
							</tr>
<?php } ?>
						</tbody>
					</table>
				</div>
							</aside>