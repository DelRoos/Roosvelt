<?php

	//connexion a la bd
	//paramètre de connexion a la base de donnée
	define("ADRESSE", "localhost");
	define("BASE_NOM", "blog");
	define("LOGIN", "root");
	define("PASSWORD", "");

	function dbconnect()
	{
		//connexion a la base de donne
		try
		{
			$connexion = new pdo('mysql:host='.ADRESSE.';dbname='.BASE_NOM.';charset = utf8',LOGIN, PASSWORD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}catch (Exception $e){
			die('Erreur : ' . $e->getMessage());
		}

		return $connexion;
	}

	function getBillets()
	{
		$db = dbconnect();
		$billet = $db->query('SELECT * FROM billets ORDER BY date_creation LIMIT 5');

		return $billet;
	}

	function getPost($idBillet)
	{
		$db = dbconnect();
		$req = $db->prepare('SELECT * FROM billets WHERE id = :id');
		$req->execute(array('id'=>$idBillet));

		$post = $req->fetch();

		return $post;
	}

	function getComments($idBillet)
	{
		$db = dbconnect();
		$comment = $db->prepare('SELECT * FROM commentaires WHERE id_billet = :idbil ORDER BY date_commentaire DESC');
		$comment->execute(array('idbil'=>$idBillet));

		return $comment;
	}

	function postComment($id_billet, $auteur, $message)
	{
		$db = dbconnect();

		$newsComment = $db->prepare('INSERT INTO commentaires SET id_billet = :id_billet, auteur = :auteur, commentaire = :commentaire, date_commentaire = NOW()');

		$res = $newsComment->execute(array('id_billet'=>$id_billet, 'auteur'=>$auteur, 'commentaire'=>$message));

		return $res;
	}
?>