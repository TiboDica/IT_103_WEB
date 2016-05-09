<?php
include('functions.php');
session_start();
if (!isset($_SESSION['connect'])) {
	header('Location: sign_in.php');
	exit();
} else {
	if (isset($_GET['deconnecte'])) {
		session_destroy();
		header('Location: index.php?deconnecte');
		exit();
	}
	if (isset($_POST['add_credits'])) {
		add_credits($_SESSION['email'], $_POST['add_credits']);
	}
	include("boilerplate.php");
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
			<form class='form-horizontal' action="#" method='post'>
				<div class=form-group>					
					<div class="col-sm-2">
						<input type="number" class="form-control" name="add_credits" placeholder='how much?'>
					</div>
					<div class="col-sm-2">
						<button type="submit" formaction='#' class="btn btn-success">Add credits</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-12">
		<div class="thumbnail">
			<img src="http://placehold.it/320x150" alt="">
			<div class="caption">
				<h4 class="pull-right">$64.99</h4>
				<h4><a href="#">Second Product</a></h4>
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
?>
</body>
</html>
