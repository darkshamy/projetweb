<?php
include "config.php";
include "produit.php";

try
{
 $bdd = new PDO("mysql:host=localhost;dbname=gestionstock", "root", "");
 $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
  die("Une érreur a été trouvé : " . $e->getMessage());
}
$bdd->query("SET NAMES UTF8");

if (isset($_GET['s']) AND $_GET["s"] == "Rechercher")
{
  
 $_GET["terme"] = htmlspecialchars($_GET["terme"]); //pour sécuriser le formulaire contre les intrusions html
 $terme = $_GET['terme'];
 

 if (isset($terme))
 {

  $terme = strtolower($terme);
  $select_terme = $bdd->prepare("SELECT codeProd,image,marque,couleur,typee,prix,dateC FROM produit WHERE codeProd LIKE ? OR marque LIKE ?");
  $select_terme->execute(array("%".$terme."%", "%".$terme."%"));

 }
 else
 {
  $message = "Vous devez entrer votre requete dans la barre de recherche";
 }
}
else
{
  $select_terme = $bdd->prepare("SELECT * FROM produit ");
  $select_terme->execute(array("%","%","%","%","%","%","%"));
 
}
?>
<center>
           <div class="search-content">
       <form action = "verver2.php" method = "GET">
        <h4>Rechercher 
    <input type="search" name="terme" >
    <button type="submit" name="s" value="Rechercher" class="btn btn-danger">chercher</button>
    </h4>
            </center>                               
        </form>
        <table   id="example1" class="table table-striped">
  <thead>
    <tr>
      <th >Code Produit</th>
      <th> Image </th>
      <th >Marque</th>
      <th >Couleur</th>
      <th >Type</th>
      <th> Prix </th>
      <th >Date</th>
    </tr>
  </thead>
  <tbody>
  <?php
  
  while($terme_trouve = $select_terme->fetch())
  {
      ?>  
      <tr>
  <td><?php echo $terme_trouve['codeProd']; ?></td>
  <td><a><img class="" src="<?php echo $terme_trouve['image'];?>" style="width: 100px; height:100px;"></a></td>
  <td><?php echo $terme_trouve['marque']; ?></td>
  <td><?php echo $terme_trouve['couleur']; ?></td>
  <td><?php echo $terme_trouve['typee']; ?></td>
  <td><?php echo $terme_trouve['prix']; ?></td>
  <td><?php echo $terme_trouve['dateC']; ?></td>


</tr>
                        
                                
                             
                             
                           
                    


                  <?php
  
  }
  $select_terme->closeCursor();
   ?>
 </tbody>
</table>
