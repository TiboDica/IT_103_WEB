<?php
echo "ok";
include("functions.php");
session_start();
$connect = false;
if (isset($_SESSION['connect'])) {
	$connect = true;
}
elseif (isset($_POST['email']) && isset($_POST['password'])) {
  if (auth($_POST['email'], $_POST['password'])) {
				$_SESSION['connect'] = true;
				$connect = true;
	}
			else {
				$pb = "Password or email incorrect";
			}
}
	include("boilerplate.php");
  include("navbar.php");

if ($connect == false) {
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
}
else {
	include(profil.php);
}
?>
	</body>
</html>
