<?php 
session_start();
include 'template/header.php';


if(isset($_SESSION["korpa"])){
	$korpa_prikaz = $_SESSION["korpa"];
}else{
	$korpa_prikaz = array();
}


 ?>

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
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
								<a href="detaljan_pregled.php?id=<?php echo $korpa_prikaz[$i]["id"] ?>"><img src="php/image_resize.php?image=<?php echo $korpa_prikaz[$i]["slika"] ?>&width=100&height=100" alt=""></a>
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
									<a class="cart_quantity_up" href="povecaj_korpu.php?id=<?php echo $korpa_prikaz[$i]["id"] ?>"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $korpa_prikaz[$i]["kolicina"] ?>" autocomplete="off" size="2">
                                    <?php if($korpa_prikaz[$i]["kolicina"]>1){ ?>
									<a class="cart_quantity_down" href="smanji_korpu.php?id=<?php echo $korpa_prikaz[$i]["id"] ?>"> - </a>
                                    <?php } ?>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo $korpa_prikaz[$i]["ukupna_cena"] ?> din</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="obrisi_iz_korpe.php?id=<?php echo $korpa_prikaz[$i]["id"] ?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                        <?php } ?>

						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							
							<li>Total <span><?php echo number_format($ukupna_cena_korpe,'2',',','.'); ?> din</span></li>
						</ul>
							
							<a class="btn btn-default check_out" href="kraj">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->



<?php include 'template/footer.php'; ?>