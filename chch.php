<?php
include_once "../core/produitC.php";
include_once "../entites/produit.php";
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
<!DOCTYPE html>
<html lang="en">
<head>
<title>front</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>
		<div class="menu menu_mm trans_300">
		<div class="menu_container menu_mm">
			<div class="page_menu_content">
							
				<div class="page_menu_search menu_mm">
					<form action="#">
						<input type="search" required="required" class="page_menu_search_input menu_mm" placeholder="Search for products...">
					</form>
				</div>
				<ul class="page_menu_nav menu_mm">
					<li class="page_menu_item has-children menu_mm">
						<a href="index.html">Home<i class="fa fa-angle-down"></i></a>
						<ul class="page_menu_selection menu_mm">
							<li class="page_menu_item menu_mm"><a href="categories.html">Categories<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="product.html">Product<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="aprod.html">Cart<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="checkout.html">Checkout<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="contact.html">Contact<i class="fa fa-angle-down"></i></a></li>
						</ul>
					</li>
					<li class="page_menu_item has-children menu_mm">
						<a href="categories.html">Categories<i class="fa fa-angle-down"></i></a>
						<ul class="page_menu_selection menu_mm">
							<li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
						</ul>
					</li>
					<li class="page_menu_item menu_mm"><a href="index.html">Accessories<i class="fa fa-angle-down"></i></a></li>
					<li class="page_menu_item menu_mm"><a href="#">Offers<i class="fa fa-angle-down"></i></a></li>
					<li class="page_menu_item menu_mm"><a href="contact.html">Contact<i class="fa fa-angle-down"></i></a></li>
				</ul>
			</div>
		</div>

		<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>

		<div class="menu_social">
			<ul>
				<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
	
<div class="super_container">

	<!-- Header -->

		<header class="header">
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo"><a href="front.html">ProSystemes</a></div>
							<nav class="main_nav">
								<ul>
									<li class="">
										<a href="front.html">Home</a>
									</li>

									<li class="">
										<a href="afprod.php">Afficher Produits</a>
									</li>
									<li class="">
										<a href="chch.php">Chercher Produits</a>
									</li>
									
								</ul>
							</nav>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Search Panel -->
		<div class="search_panel trans_300">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="search_panel_content d-flex flex-row align-items-center justify-content-end">
							<form action="#">
								<input type="text" class="search_input" placeholder="Search" required="required">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Social -->
		<div class="header_social">
			<ul>
				<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</header>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	
		

  
<center>
           <div class="search-content">
       <form action = "chch.php" method = "GET">
        <h4>Rechercher 
    <input type="search" name="terme" >
    <button type="submit" name="s" value="Rechercher" class="btn btn-danger">Afficher</button>
    </h4>
            </center>                               
        </form>
        <table   id="example1" class="table table-striped" >
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
			

	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="product_grid">

						

						
						

						

					</div>
						
				</div>
			</div>
		</div>
	</div>

	

	

				

			</div>
		</div>
	</div>

	

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>