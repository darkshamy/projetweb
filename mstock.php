<?php
include_once "../core/stockC.php";
include_once "../entites/stock.php";

if(isset($_POST['Modifier']))
{
 $id=new stock ($_POST['quantite'],$_POST['unite'],$_POST['description'],$_POST['codeprod']);
 modifier($id);
}

header('LOCATION:mstock1.php');
?>