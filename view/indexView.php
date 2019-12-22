<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
	<div id="blog">
	<h1>Mon super blog</h1>

	Dernier billet du bloc:<br>
	<?php
		while($result_billet = $billet->fetch()){
	?>
		<div class="news">
			<h3><?php echo $result_billet['titre'].' le '.$result_billet['date_creation'];?></h3>
			<p>
				<?php echo $result_billet['contenu'];?>
				<a href="index.php?action=post&amp;id=<?php echo $result_billet['id']; ?>">commentaire</a>
			</p>
		</div>
	<?php
		 }
		 $billet->closeCursor();
	?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>