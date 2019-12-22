<?php
	require('model/modele.php');

	function listPosts()
	{
		$billet = getBillets();
		
		require('view/indexView.php');
	}

	function post()
	{
		$post = getPost($_GET['id']);
		$comment = getComments($_GET['id']);
		
		require('view/postView.php');
	}

	function addComment($idbil, $auteur, $comment)
	{
		$res = postComment($idbil, $auteur, $comment);

		if ($res === false) {
			die("Impossible d'enregistre le commentaire");
		}else{
			header("Location: index.php?action=post&id=" . $idbil);
		}
	}