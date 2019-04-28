 <center><legend><h2>Tri Stock</h2></legend></center>
 <?PHP
include "config.php";
include "stock.php";

$stock1=new stock(22,255,"aa",14);
 $listeclient1=$stock1->afficherASC();
 $listeclient2=$stock1->afficherDESC();

?>

<form method="POST" action="triio.php">
    
       
       
        
 
<center>
    <button type="submit" name="asc" value="ascendant" class="btn btn-danger">Ascendant</button>
    <button type="submit" name="desc" value="descendant" class="btn btn-danger">Descendant</button>
</center>





<?php

if (isset($_POST['asc'])) {
    ?>
   <table   id="example1" class="table table-striped">
  <thead>
    <tr>
      <th >Quantite</th>
      <th >Unite</th>
      <th >Description</th>
      <th >Code Produit</th>
    </tr>
  </thead>
<?php
foreach($listeclient1 as $row)
{
    ?>
    <tr>
    <td><?php echo $row['quantite']; ?></td>
    <td><?php echo $row['unite']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td><?php echo $row['codeprod']; ?></td>
    </tr>
    <?php
}
?>
    </table>
    
    <?PHP
}
 


if (isset($_POST['desc'])) {
    ?>
   <table   id="example1" class="table table-striped">
  <thead>
    <tr>
      <th >Quantite</th>
      <th >Unite</th>
      <th >Description</th>
      <th >Code Produit</th>
    </tr>
  </thead>

<?php
foreach($listeclient2 as $row){
    ?>
       <tr>
    <td><?php echo $row['quantite']; ?></td>
    <td><?php echo $row['unite']; ?></td>
    <td><?php echo $row['description']; ?></td>
    <td><?php echo $row['codeprod']; ?></td>
    </tr>
    <?php
}
?>
</thead>
    </table>
    </form>
    
    <?PHP
}
 

?>