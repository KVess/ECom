<?php 
require_once("core/controller/panierServ.php");

?>

<!DOCTYPE html>

<html lang="fr">
<head>
 
    <title>Panier</title>
    <link rel="stylesheet" href="asset/css/custom.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


<?php include 'asset/fonc/menu.php'; ?>
		
		<div class="container-fluid breadcrumbBox text-center">
			<h1>Panier</h1>
		</div>
		
		<div class="container">

		<?php
            if (!empty($prodPanier)) {
                foreach ($prodPanier as $produit) {
                    $sousTot = $_SESSION["panier"][$produit["id_produit"]] * $produit["prix"];
                    $total += $sousTot;
				?>

					<div class="row">
						<span class="quantity"> 
							<img src="<?php echo $produit["image"]; ?>" class="img-responsive" style="width:80%" alt="Image">
						</span>
						<span class="itemName" style="margin-right: 60px;"><?php echo $produit["designation"]; ?></span>
						<span class="itemName" style="margin-right: 100px;"><?php echo $produit["prix"]; ?>	</span>
						<span class="quantity" ><?php echo $_SESSION["panier"][$produit["id_produit"]]; ?></span>
						<span class="itemName" style="margin-right: 100px;" ><?php echo $_SESSION["panier"][$produit["id_produit"]] * $produit["prix"]; ?></span>

					    <!-- <span class="popbtn"><a class="arrow"></a></span>	 -->
						<span class="price"><a href="actionpanier.php?action=del&idProd=<?php echo $produit['id_produit']; ?>">supprimer</a></span>
					</div>
				<?php
			}
		}
		?>
					
					
		<div class="row totals">
			
			<span class="itemName">Total:</span>
			<span class="price"> <?php echo $total ?> Fcfa</span>
			<span class="order"> <a class="text-center" href="actionpanier.php?action=save">COMMNADEZ</a></span>
		</div>
	</div>
			

		</div>

		<!-- The popover content -->

		<div id="popover" style="display: none">
			<a href="#"><span class="glyphicon glyphicon-pencil"></span></a>
			<a href="#"><span class="glyphicon glyphicon-remove"></span></a>
		</div>
		
		<!-- JavaScript includes -->

		<!-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>  -->
		<!-- <script src="asset/js/bootstrap.min.js"></script> -->

		<?php include 'asset/fonc/footer.php'; ?>  

		<script src="asset/js/customjs.js"></script>

	</body>
</html>