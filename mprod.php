<?php
include_once "../core/produitC.php";
include_once "../entites/produit.php";


if(isset($_POST['Modifier']))
{
$myDate = strtotime($_POST["dateC"]);
$myDate = date('Y-m-d H:i:s', $myDate);
 $id=new produit ($_POST['codeProd'],$_POST['image'],$_POST['marque'],$_POST['couleur'],$_POST['typee'],$_POST['prix'],$myDate);
 modifier($id);
}

header('LOCATION:mprod1.php');
?>