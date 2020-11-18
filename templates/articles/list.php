<div id="articles-container" class="articles-container">
<?php
$all = isset( $_GET[ 'all' ] );

if ( $all )
	$sql = "SELECT * FROM cms_news ORDER BY id DESC";
else
	$sql = "SELECT * FROM cms_news ORDER BY id DESC LIMIT 6";

$news = mysqli_query($db, $sql);
while ($newsc = mysqli_fetch_assoc($news)) {
?>
	<div id="article-362" class="article-container">
		<a href="<?php echo $rise_settings['weblink'];?>/news/<?php echo $newsc['id'];?>" class="article-content pixelated" style="background-image: url(<?php echo $newsc['image'];?>);">
			<div class="article-header">
				<div class="article-category"><?php echo $newsc['categoria'];?></div>
				<div class="article-separation" style="background-color: #f28600;"></div>
				<div class="article-title"><?php echo $newsc['title'];?></div>
			</div>
		</a>
	</div>
<?php } ?>			
</div>

<?php if ( !$all ) : ?>
<div class="load-more-button">
	<a id="load-more-button" href="?all=2" class="rounded-button blue">Mas Noticias</a>
</div>
<?php endif; ?>