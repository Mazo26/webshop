<?php include 'template/header.php';

$id = $_GET["id"];

$strana = $_GET["strana"];

$broj_el_po_strani = 3; // broj elemenata po stranici


$ukupno_proizvoda = array(); // izvlacenje ukupno proizvoda
$sql = "SELECT * FROM proizvodi LEFT JOIN slike ON proizvodi.proizvodi_id = slike.slike_id_proizvoda WHERE proizvodi.proizvodi_kategorije_id = '".$id."'";
$tiket = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($tiket)){
	$ukupno_proizvoda[] = $row;
}

$ukupno = sizeof($ukupno_proizvoda);

$broj_strana = ceil($ukupno/$broj_el_po_strani); // broj strana



$kreni_od = ($strana-1)*$broj_el_po_strani;



$proizvodi = array();
$sql = "SELECT * FROM proizvodi LEFT JOIN slike ON proizvodi.proizvodi_id = slike.slike_id_proizvoda WHERE proizvodi.proizvodi_kategorije_id = '".$id."' LIMIT ".$kreni_od.",".$broj_el_po_strani."";
$tiket = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($tiket)){
	$proizvodi[] = $row;
}

?>



	<section>
		<div class="container">
			<div class="row">
				<?php include 'template/left_menu.php'; ?>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
                        <?php for($i=0;$i<sizeof($proizvodi);$i++){ ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo $proizvodi[$i]["slike_slika"] ?>" alt="" />
                                            <h2>$<?php echo number_format($proizvodi[$i]["proizvodi_cena"],2,'.',','); // number format sluzi za izgled ispisa cene ?></h2>
                                            <p><?php echo $proizvodi[$i]["proizvodi_naziv"] ?></p>
                                            <a href="dodaj_u_korpu.php" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>$<?php echo number_format($proizvodi[$i]["proizvodi_cena"],2,'.',','); // number format sluzi za izgled ispisa cene ?></h2>
                                                <a href="detaljan_pregled.php?id=<?php echo $proizvodi[$i]["proizvodi_id"]; ?>"><p><?php echo $proizvodi[$i]["proizvodi_naziv"] ?></p></a>
                                                <a href="dodaj_u_korpu.php" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                    </div> 
                                    
                                </div>
                            </div>
                        <?php } ?>











						<div style="clear:both"></div>

						<ul class="pagination">
                        	<?php if($strana > 1){ ?>
								<li><a href="proizvodi.php?id=<?php echo $id ?>&strana=<?php echo $strana-1 ?>">&raquo;</a></li>
                            <?php } ?>
                        	<?php for($i=1;$i<=$broj_strana;$i++){ ?>
								<li <?php if($i==$strana){ ?> class="active" <?php } ?>><a href="proizvodi.php?id=<?php echo $id ?>&strana=<?php echo $i ?>"><?php echo $i ?></a></li>
                            <?php } ?>
							<?php if($strana < $broj_strana){ ?>
								<li><a href="proizvodi.php?id=<?php echo $id ?>&strana=<?php echo $strana+1 ?>">&raquo;</a></li>
                            <?php } ?>
						</ul>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>


<?php include 'template/footer.php'; ?>
