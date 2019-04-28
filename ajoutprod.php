<?php

include_once "../core/produitC.php";
include_once "../entites/produit.php";


if(isset($_POST['Ajouter']))
{
$myDate = strtotime($_POST["dateC"]);
$myDate = date('Y-m-d H:i:s', $myDate);
$soi=new produit($_POST['codeProd'],$_POST['image'],$_POST['marque'],$_POST['couleur'],$_POST['typee'],$_POST['prix'],$myDate);
ajouter($soi);
}

header('LOCATION:aprod.html');
?>