<?php include 'template/header.php';


$promenjiva = $_GET["pretraga"];


$proizvodi= array();
$sql = "SELECT * FROM proizvodi JOIN slike ON proizvodi.proizvodi_id = slike.slike_id_proizvoda WHERE (proizvodi.proizvodi_naziv LIKE '%".$promenjiva."%' OR proizvodi.proizvodi_opis LIKE '%".$promenjiva."%' OR proizvodi.proizvodi_cena LIKE '%".$promenjiva."%') ";


$tiket = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($tiket)){
	$proizvodi[] = $row;
}


?>

<?php if(sizeof($proizvodi)>0){  ?>

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
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>$<?php echo number_format($proizvodi[$i]["proizvodi_cena"],2,'.',','); // number format sluzi za izgled ispisa cene ?></h2>
                                                <p><?php echo $proizvodi[$i]["proizvodi_naziv"] ?></p>
                                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>











						<div style="clear:both"></div>
					<?php /*?>
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
						</ul><?php */?>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
<?php }else{ ?>

Nepostoji

<?php } ?>

<?php include 'template/footer.php'; ?>
