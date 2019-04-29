<?php
include_once "../core/stockC.php";
include_once "../entites/stock.php";

if (isset($_POST["Supprimer"]))
{
	$id=(int)$_POST['quantite'];
	supprimer($id);
}

header('LOCATION:sstock1.php');
?>