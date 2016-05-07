<?php
include("functions.php");
session_start();
include("boilerplate.php");
$connect = false;
if (isset($_POST['email']) && isset($_POST['password'])) {
  if (auth($_POST['email'], $_POST['password'])) {
				$_SESSION['connect'] = true;
				$connect = true;
				$_SESSION['email'] = $_POST['email'];
	}
	else {
				$pb = "Password or email incorrect";
			}
}
if (isset($_GET['deconnecte'])) {
  session_destroy();
}
elseif (isset($_SESSION['connect'])) {
	$connect = true;
	header('Location: profil.php');
	exit();
}

if ($connect == false) {
	include("navbar_unconnected.php");
?>
	<form class="form-horizontal" action="sign_in.php" method="post">
  	<div class="form-group">
    	<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    	<div class="col-sm-9">
      	<input type="email" class="form-control" name="email">
    	</div>
  	</div>
  	<div class="form-group">
    	<label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    	<div class="col-sm-9">
      	<input type="password" class="form-control" name="password">
    	</div>
  	</div>
  	<div class="form-group">
    	<div class="col-sm-offset-2 col-sm-10">
      	<button type="submit" class="btn btn-default">Sign in</button>
    	</div>
  	</div>
	</form>
<?php
	if (isset($pb)){
		echo $pb;
	}
	?>
	<div class='col-sm-offset-2 col-sm-10'>
		<a href='register.php' class="link">Create a new account</a>
	</div>
<?php
}
/*else {
	include("navbar_connected.php");
	?>
	<div class="jumbotron">
		<div class="container">
			<h1>Welcome <?php echo pseudo($_SESSION['email']) ?>!</h1>
			<p><?php echo $_SESSION['email'] ?></p>
			<p>
			<?php
			echo 'You have ';
			echo remaining_credits($_SESSION['email']);
			echo '$ on your account';
			?>
			</p>
			<p>
				<a class="btn btn-success btn-sm" role="button" href='#'>Add credits</a>
			</p>
		</div>
	</div>
	<div class="col-md-12">
			<div class="thumbnail">
					<img src="http://placehold.it/320x150" alt="">
					<div class="caption">
							<h4 class="pull-right">$64.99</h4>
							<h4><a href="#">Second Product</a>
							</h4>
							<p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
					<div class="ratings">
							<p class="pull-right">12 reviews</p>
							<p>
									<span class="glyphicon glyphicon-star"></span>
									<span class="glyphicon glyphicon-star"></span>
									<span class="glyphicon glyphicon-star"></span>
									<span class="glyphicon glyphicon-star"></span>
									<span class="glyphicon glyphicon-star-empty"></span>
							</p>
					</div>
			</div>
	</div>
<?php
}
*/
?>
</body>
</html>
