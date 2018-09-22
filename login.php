<?php include 'template/header.php'; ?>


<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Uloguj se</h2>
						<form action="login_select.php" method="post">
							<input type="text" placeholder="Email" />
							<input type="password" placeholder="Password" />
							
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Registruj se</h2>
						<form action="registracija_insert.php" method="post">
							<input type="text" placeholder="Ime" name="ime"/>
							<input type="text" placeholder="Prezime" name="prezime"/>
                            <input type="text" placeholder="Email" name="email"/>
                            <input type="password" placeholder="Password" name="password"/>
							<input type="password" placeholder="Repait Password" name="repait_password"/>
                            <input type="text" placeholder="Telefon" name="telefon"/>
                            <input type="text" placeholder="Adresa" name="adresa"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
    
    
    <?php include 'template/footer.php'; ?>