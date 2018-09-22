
<?php

$left_kategorije = array();
$sql = "SELECT * FROM kategorije ORDER BY kategorije_naziv ASC";

$tiket = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($tiket)){
	$left_kategorije[] = $row;
}





?>

<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->

                            <?php for($i=0;$i<sizeof($left_kategorije);$i++){ ?>


                           	 <?php
								// prilikom prolaska kroz niz kategorije koje smo izvukli iz baze imamo njene podatke id i naziv izvlacimo koje podkategorije pripadaju toj kategoriji jer u tabeli podkategorije imamo id_kategorije kojom vezemo dve tabele. Jedna kategorija moze da ima vise podkategorija jer je slabijem nivoa. Samim tim moramo da napravimo niz podkategorija za odredjeni id kategorije
								$left_podkategorije = array();
								$sql = "SELECT * FROM podkategorije WHERE podkategorije_id_kategorije = '".$left_kategorije[$i]["kategorije_id"]."' ORDER BY podkategorije_naziv ASC";

								$tiket = mysqli_query($conn, $sql);
								while($row = mysqli_fetch_assoc($tiket)){
									$left_podkategorije[] = $row;
								}

								?>
                            <div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#sportswear_<?php echo $i ?>">
											<?php if(sizeof($left_podkategorije)>0){ // da se prikaze znak plus ako postoje podkategoriej za ovu kategoriju ?>
                                            	<span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            <?php } ?>
											<?php echo $left_kategorije[$i]["kategorije_naziv"]; ?>
										</a>
									</h4>
								</div>


                                <?php if(sizeof($left_podkategorije)>0){ // da se prikazu sve podkategorije (njihovi nazivi) ako postoje podkategoriej za ovu kategoriju?>
                                    <div id="sportswear_<?php echo $i ?>" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul>
                                                <?php for($j=0;$j<sizeof($left_podkategorije);$j++){ ?>
                                                <li><a href="#"><?php echo $left_podkategorije[$j]["podkategorije_naziv"] ?> </a></li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>
                                <?php } ?>
							</div>
                            <?php } ?>


						</div><!--/category-products-->





						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->

                        <div id="fb-root"></div>
						<script>(function(d, s, id) {
                          var js, fjs = d.getElementsByTagName(s)[0];
                          if (d.getElementById(id)) return;
                          js = d.createElement(s); js.id = id;
                          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=808668735839698";
                          fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                        <div class="shipping text-center"><!--shipping-->
                        	<div class="fb-page" data-href="https://www.facebook.com/craftiaweb/" data-tabs="timeline" data-width="270" data-height="270" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/craftiaweb/"><a href="https://www.facebook.com/craftiaweb/">Craftia</a></blockquote></div></div>
						</div>
					</div>
				</div>
