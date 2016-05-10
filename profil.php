<?php
require('functions.php');
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
	
	require("boilerplate.php");
	require("navbar_connected.php");
	?>
	<div class="jumbotron">
		<div class="container">
			<h1>Welcome <?php echo pseudo($_SESSION['email']) ?>!</h1>
			<p><?php echo $_SESSION['email'] ?></p>
			<p> You have <?php echo remaining_credits($_SESSION['email']); ?> on your account</p>
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
	<div class='container'>
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
					<h4>
						<p><?php echo $bet['sport'] ?></p>
					</h4>
				</div>
				<div class="row">
			        <div class="col-sm-6 col-sm-offset-3">
			          <ul class="list-inline">
			            <li class="list-group-item col-sm-4
				            <?php if ($bet['bet_type'] == 1) echo 'active'; ?>
			            ">
							<div class='text-center'>
								<span><?php echo $bet['team1'] ?></span>
								<br>
								<span><?php echo $bet['odds1'] ?></span>
							</div>
							<div class='progress'>
								<div class='progress-bar progress-bar-success progress-bar-striped' aria-valuemax='100' aria-valuemin='0'  
									<?php 
									echo "style='width: ".(number_format(percentBet($bet['ref'], 1), 2)*100)."%' "; 
									echo "aria-valuenow=".(number_format(percentBet($bet['ref'], 1), 2)*100);
									?>
								>
									<span><?php echo (number_format(percentBet($bet['ref'], 1), 2)*100)."%" ?></span>
								</div>	
							</div>
			            </li>
			            <li class="list-group-item  col-sm-4
							<?php
				            if ($bet['bet_type'] == 2) echo 'active';
				            ?>
			            ">
							<div class='text-center'>
								<span>draw</span>
								<br>
								<span><?php echo $bet['draw'] ?></span>
							</div>
							<div class='progress'>
								<div class='progress-bar progress-bar-success progress-bar-striped' aria-valuemax='100' aria-valuemin='0'  
									<?php 
									echo "style='width: ".(number_format(percentBet($bet['ref'], 2), 2)*100)."%' "; 
									echo "aria-valuenow=".(number_format(percentBet($bet['ref'], 2), 2)*100);
									?>
								>
									<span><?php echo (number_format(percentBet($bet['ref'], 2), 2)*100)."%" ?></span>
								</div>	
							</div>

			            </li>
			            <li class="list-group-item col-sm-4
							<?php
				            if ($bet['bet_type'] == 3) echo 'active';
				            ?>
			            ">
							<div class='text-center'>
								<span><?php echo $bet['team2'] ?></span>
								<br>
								<span><?php echo $bet['odds2'] ?></span>
							</div>
							<div class='progress'>
								<div class='progress-bar progress-bar-success progress-bar-striped' aria-valuemax='100' aria-valuemin='0' 
									<?php 
									echo "style='width: ".(number_format(percentBet($bet['ref'], 3), 2)*100)."%' "; 
									echo "aria-valuenow=".(number_format(percentBet($bet['ref'], 3), 2)*100);
									?>
								>
									<span><?php echo (number_format(percentBet($bet['ref'], 3), 2)*100)."%" ?></span>
								</div>	
							</div>
			            </li>
			          </ul>
			        </div>
			        <div class='col-sm-3'>
						<span>Your bet: <?php echo $bet['bet_amount']."$" ?></span>
			        </div>
				</div>
			</div>
		</div>
	<?php
	}
}
?>
	</div>
<?php require "footer.php" ?>
