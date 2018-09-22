<?php include 'template/header.php';


$istaknuti_proizvodi = array();
$sql = "SELECT * FROM proizvodi LEFT JOIN slike ON proizvodi.proizvodi_id = slike.slike_id_proizvoda WHERE proizvodi.proizvodi_istaknuti = 1 LIMIT 0,6";
$tiket = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($tiket)){
	$istaknuti_proizvodi[] = $row;
}


$najpopularniji_proizvodi = array();
$sql = "SELECT * FROM proizvodi LEFT JOIN slike ON proizvodi.proizvodi_id = slike.slike_id_proizvoda WHERE proizvodi.proizvodi_najpopularniji = 1 LIMIT 0,6";
$tiket = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($tiket)){
	$najpopularniji_proizvodi[] = $row;
}


$slider = array();
$sql = "SELECT * FROM slider ORDER BY slider_id DESC";
$tiket = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($tiket)){
	$slider[] = $row;
}



 ?>


<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
                        	<?php for($i=0;$i<sizeof($slider);$i++){ ?>
							<li data-target="#slider-carousel" data-slide-to="<?php echo $i ?>" <?php if($i==0){ ?>class="active"<?php } ?>></li>
                            <?php } ?>

						</ol>

						<div class="carousel-inner">
                        	<?php for($i=0;$i<sizeof($slider);$i++){ ?>
                                <div class="item <?php if($i==0){ ?>active <?php } ?>">
                                    <div class="col-sm-6">
                                        <h1><span><?php echo substr($slider[$i]["slider_naslov"],0,1) ?></span><?php echo substr($slider[$i]["slider_naslov"],1) ?></h1>
                                        <h2><?php echo $slider[$i]["slider_podnaslov"] ?></h2>
                                        <p><?php echo $slider[$i]["slider_text"] ?></p>
                                        <?php if($slider[$i]["slider_link"]!=''){ ?>
                                        	<a href="<?php echo $slider[$i]["slider_link"] ?>" target="_blank">
                                        		<button type="button" class="btn btn-default get">Pogledaj</button>
                                            </a>
                                        <?php } ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="pictures/slider/<?php echo $slider[$i]["slider_slika"] ?>" class="girl img-responsive" alt="" />
                                    </div>
                                </div>
                            <?php } ?>





						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section><!--/slider-->

	<section>
		<div class="container">
			<div class="row">
				<?php include 'template/left_menu.php'; ?>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">proizvodi</h2>

                        <?php for($i=0;$i<sizeof($najpopularniji_proizvodi);$i++){ ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo $najpopularniji_proizvodi[$i]["slike_slika"] ?>" alt="" />
                                            <h2>$<?php echo number_format($najpopularniji_proizvodi[$i]["proizvodi_cena"],2,'.',','); // number format sluzi za izgled ispisa cene ?></h2>
                                            <p><?php echo $najpopularniji_proizvodi[$i]["proizvodi_naziv"] ?></p>
                                            <a href="dodaj_u_korpu.php?id=<?php echo $najpopularniji_proizvodi[$i]["proizvodi_id"] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Kupi</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>$<?php echo number_format($najpopularniji_proizvodi[$i]["proizvodi_cena"],2,'.',','); // number format sluzi za izgled ispisa cene ?></h2>
                                                <p><?php echo $najpopularniji_proizvodi[$i]["proizvodi_naziv"] ?></p>
                                                <a href="dodaj_u_korpu.php?id=<?php echo $najpopularniji_proizvodi[$i]["proizvodi_id"] ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Kupi</a>
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







					</div><!--features_items-->



					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">istaknuti proizvodi</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">

                                    <?php for($i=0;$i<sizeof($istaknuti_proizvodi)/2;$i++){  // for petlja ide od 0 do polovine naseg niza u kojem imamo 6 istaknutih proizvoda iz razloga sto je po dizajnu uradjeno da se iz dva blok koda prikazuje po 3 slike gde se blok kodovi menjaju kroz javascript ?>
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <?php /*?><img src="<?php echo $istaknuti_proizvodi[$i]["slike_slika"] ?>"  width="200" height="200" alt="" /><?php */?>
                                                        <img src="php/image_resize.php?image=<?php echo $istaknuti_proizvodi[$i]["slike_slika"] ?>&width=250&height=250" alt="" />
                                                        <h2><?php echo number_format($istaknuti_proizvodi[$i]["proizvodi_cena"],2,'.',','); // number format sluzi za izgled ispisa cene ?> din</h2>
                                                        <p><?php echo $istaknuti_proizvodi[$i]["proizvodi_naziv"] ?></p>
                                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>




								</div>
								<div class="item">

									 <?php for($i=sizeof($istaknuti_proizvodi)/2;$i<sizeof($istaknuti_proizvodi);$i++){  // for petlja ide od 0 do polovine naseg niza u kojem imamo 6 istaknutih proizvoda iz razloga sto je po dizajnu uradjeno da se iz dva blok koda prikazuje po 3 slike gde se blok kodovi menjaju kroz javascript ?>
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                       <?php /*?> <img src="<?php echo $istaknuti_proizvodi[$i]["slike_slika"] ?>" width="200" height="200" alt="" /><?php */?>
                                                        <img src="php/image_resize.php?image=<?php echo $istaknuti_proizvodi[$i]["slike_slika"] ?>&width=250&height=250" alt="" />
                                                        <h2><?php echo number_format($istaknuti_proizvodi[$i]["proizvodi_cena"],2,'.',','); // number format sluzi za izgled ispisa cene ?> din</h2>
                                                        <p><?php echo $istaknuti_proizvodi[$i]["proizvodi_naziv"] ?></p>
                                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>


								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>
						</div>
					</div><!--/recommended_items-->

				</div>
			</div>
		</div>
	</section>



<?php include 'template/footer.php'; ?>
