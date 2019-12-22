<?php $title =  'Mon super blog'; ?>
<?php ob_start(); ?>
	<div id="blog">
		<h1>Mon super blog</h1>
			<div class="news">
				<h3><?php echo $post['titre'].' le '.$post['date_creation'];?></h3>
				<p><?php echo $post['contenu'] ;?></p>
			</div>
			<h2>Commentaire</h2>
			<?php
				while ($res_com = $comment->fetch()) {
					echo '<p><b>'.$res_com['auteur'].'</b> le '.$res_com['date_commentaire'].'<br>'.$res_com['commentaire'].'</p>';
				}

				$comment->closeCursor();
			?>
	</div><br>
	
	<h2>Commentaire</h2>
	
	<form method="post" action="index.php?action=addComment&amp;id=<?php echo $post["id"] ?>">
		<div>
			<label for = "auteur">auteur</label><br>
			<input type="text" name="auteur">
		</div>
		<div>
			<label for = "comment">commentaire</label><br>
			<textarea id="comment" name="comment"></textarea>
		</div>
		<div>
			<input type="submit" name="commenter">
		</div>
	</form>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>