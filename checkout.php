<?php 
session_start();
include 'template/header.php';

if(isset($_SESSION["korpa"])){
	$korpa_prikaz = $_SESSION["korpa"];
}else{
	$korpa_prikaz = array();
}


if(isset($_SESSION["log"])){
	$ime = $_SESSION["log"]["ime"];
	$prezime = $_SESSION["log"]["prezime"];
}else{
	$ime = '';
	$prezime = '';
}




 ?>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			
			

			
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                    	<?php
							$ukupna_cena_korpe = 0;
						 for($i=0;$i<sizeof($korpa_prikaz);$i++){ 
						 	$ukupna_cena_korpe+=$korpa_prikaz[$i]["ukupna_cena"];
						 ?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="php/image_resize.php?image=<?php echo $korpa_prikaz[$i]["slika"] ?>&width=100&height=100" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $korpa_prikaz[$i]["naziv"] ?></a></h4>
								<p>Barcode: <?php echo $korpa_prikaz[$i]["barcode"] ?></p>
							</td>
							<td class="cart_price">
								<p><?php echo $korpa_prikaz[$i]["cena"] ?> din</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									
									<?php echo $korpa_prikaz[$i]["kolicina"] ?>
									
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo $korpa_prikaz[$i]["ukupna_cena"] ?> din</p>
							</td>
							
						</tr>
						
                        <?php  } ?>
						
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									
									<tr>
										<td>Total</td>
										<td><span><?php echo number_format($ukupna_cena_korpe,'2',',','.'); ?> din</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
            <div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>Shopper Information</p>
							<form action="upisi_porudzbinu.php" method="post">
								<input type="text" name="ime" placeholder="Ime" value="<?php echo $ime ?>">
								<input type="text" name="prezime" placeholder="Prezime">
                                <input type="text" name="email" placeholder="Email">
                                <input type="text" name="adresa" placeholder="Adresa">
                                <input type="text" name="telefon" placeholder="Telefon">
								<input type="submit" value="Continue"  class="btn btn-primary">
							</form>
							
							
						</div>
					</div>
					
							
				</div>
			</div>
			
		</div>
	</section> <!--/#cart_items-->
   <?php include 'template/footer.php'; ?>