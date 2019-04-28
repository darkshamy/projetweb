<?php
include_once "../core/produitC.php";
include_once "../entites/produit.php";

if (isset($_POST["Supprimer"]))
{
	$id=(int)$_POST['codeProd'];
	supprimer($id);
}

header('LOCATION:sprod.html');
?>