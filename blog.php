<?php

include 'template/header.php';

$strana = $_GET["strana"];

$broj_eleme = 1;

$blog_ukupno = array();
$sql = "SELECT * FROM blog";
$tiket = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($tiket)){
	$blog_ukupno[] = $row;
}

$ukupno = sizeof($blog_ukupno);

$broj_strana = ceil ($ukupno/$broj_eleme);

$kreni_od = ($strana-1)*$broj_eleme;

$blog = array();
$sql = "SELECT * FROM blog LIMIT ".$kreni_od.",".$broj_eleme."";
$tiket = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($tiket)){
	$blog[] = $row;
}

?>


<section>
		<div class="container">
			<div class="row">

					<?php include 'template/left_menu.php'; ?>

				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
                        <?php for($i=0;$i<sizeof($blog);$i++){ ?>
                            <div class="single-blog-post">
                                <h3><?php echo $blog[$i]["blog_naziv"] ?></h3>
                                <div class="post-meta">
                                    <ul>

                                        <li><i class="fa fa-clock-o"></i> <?php echo date('H:i',strtotime($blog[$i]["blog_datum"])) ?> pm</li>
                                        <li><i class="fa fa-calendar"></i> <?php echo date('M d,Y',strtotime($blog[$i]["blog_datum"])) ?></li>
                                    </ul>

                                </div>
                                <a href="">
                                    <img src="images/blog/blog-one.jpg" alt="">
                                </a>
                                <p><?php echo substr($blog[$i]["blog_text"],0,250) ?> <?php if(strlen($blog[$i]["blog_text"])>250){ ?> ... <?php } ?></p>
                                <a  class="btn btn-primary" href="">Read More</a>
                            </div>
						<?php } ?>

						<div class="pagination-area">
							<ul class="pagination">
                            	<?php if($strana > 1){ ?>
                                    <li><a href="blog.php?strana=<?php echo $strana-1 ?>">&raquo;</a></li>
                                <?php } ?>
                                <?php for($i=1;$i<=$broj_strana;$i++){ ?>
                                    <li ><a <?php if($i==$strana){ ?> class="active" <?php } ?> href="blog.php?strana=<?php echo $i ?>"><?php echo $i ?></a></li>
                                <?php } ?>
                                <?php if($strana < $broj_strana){ ?>
                                    <li><a href="blog.php?strana=<?php echo $strana+1 ?>">&raquo;</a></li>
                                <?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



<?php

include 'template/footer.php';

?>
