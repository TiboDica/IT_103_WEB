<?php
include("functions.php");
session_start();
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

include("boilerplate.php");

if ($connect == false) {
	include("navbar_unconnected.php");
?>
	<form class="form-horizontal" action="sign_in.php" method="post">
  	<div class="form-group">
    	<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    	<div class="col-sm-9">
	      	<input type="email" class="form-control" name="email"
	      	<?php
	      	if (isset($_POST['email'])) echo "value=".$_POST['email'];
	      	?>
	      	>
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
			echo "<div class='alert alert-danger col-sm-9 col-sm-offset-2'>".$pb."</div>";
		}
	?>
	<div class='col-sm-offset-2 col-sm-10'>
		<a href='register.php' class="link">Create a new account</a>
	</div>
<?php
} else {
	header('Location: index.php');
	exit();
}
?>
</body>
</html>
