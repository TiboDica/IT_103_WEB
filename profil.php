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
	if (isset($_POST['add_credits']) and ($_POST['add_credits'] > 0)) {
		add_credits($_SESSION['email'], $_POST['add_credits']);
	}
	if (isset($_POST['rm_credits']) and ($_POST['rm_credits'] > 0)) {
		add_credits($_SESSION['email'], -$_POST['rm_credits']);
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
						<input type="number" class="form-control" name="add_credits" min="0" placeholder='Add credits'>
					</div>
					<div class="col-sm-2">
						<button type="submit" formaction='#' class="btn btn-success">Add credits</button>
					</div>
				</div>
			</form>
			<form class='form-horizontal' action="#" method='post'>
				<div class=form-group>					
					<div class="col-sm-2">
						<input type="number" class="form-control" name="rm_credits" min="0" placeholder='Remove credits'>
					</div>
					<div class="col-sm-2">
						<button type="submit" formaction='#' class="btn btn-success">Remove credits</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php
	$bets = bets($_SESSION['email']);
	foreach ($bets as $bet) {
	?>	
		<div class="col-md-12">
			<div class="thumbnail">
				<img src="http://placehold.it/320x150" alt="">
				<div class="caption">
					<h4 class="pull-right"><?php echo $bet['date'] ?></h4>					
					<h4>
						<a href="#"><?php echo $bet['team1'].' vs '.$bet['team2'] ?></a>
					</h4>
					<h4><p><?php echo $bet['sport'] ?></p></h4>
				</div>
				<div class="row">
			        <div class="col-sm-6">
			          <ul class="list-inline">
			            <li class="list-group-item col-sm-4
			            <?php
			            if ($bet['bet_type'] == 1) echo 'active';
			            ?>
			            ">
							<div class='text-center'>
					            <?php 
								echo "<span>".$bet['team1']."</span>";
								echo '<br>';
								echo '<span>'.$bet['odds1'].'</span>';
								?>
							</div>
			            </li>
			            <li class="list-group-item  col-sm-4
						<?php
			            if ($bet['bet_type'] == 2) echo 'active';
			            ?>
			            ">
							<div class='text-center'>
					            <?php 
								echo '<span>nul</span>';
								echo '<br>';
								echo '<span>'.$bet['draw'].'</span>';
								?>
							</div>
			            </li>
			            <li class="list-group-item col-sm-4
						<?php
			            if ($bet['bet_type'] == 3) echo 'active';
			            ?>
			            ">
							<div class='text-center'>
					            <?php 
								echo '<span>'.$bet['team2'].'</span>';
								echo '<br>';
								echo '<span>'.$bet['odds1'].'</span>';
								?>
							</div>
			            </li>
			          </ul>
			        </div>
				</div>
			</div>
		</div>
	<?php
	}
}
?>
</body>
</html>
