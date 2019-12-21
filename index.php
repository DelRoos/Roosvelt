<?php
	require('controller/controller.php');

	if(isset($_GET['action'])){
		if ($_GET['action'] == 'listPosts') {
			listPosts();
		}elseif ($_GET['action'] == 'post') {
			if (isset($_GET['id']) && $_GET['id']>0) {
				post();
			}else{
				echo "Erreur : aucun identifiant de billet";
			}
		}elseif ($_GET['action'] == 'addComment') {
			if (isset($_GET['id']) && $_GET['id']>0) {
				if (!empty($_POST['auteur'] && !empty($_POST['comment']))) {
					addComment($_GET['id'], $_POST['auteur'], $_POST['comment']);
				}else{
					echo "Erreur : Tous les champs ne sont pas remplient";
				}
			}else{
				echo "Erreur : Aucun identifiant de billet envoye";
			}
		}
	}else{
		listPosts();
	}
?>