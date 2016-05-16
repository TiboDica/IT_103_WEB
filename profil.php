<?php
require('functions.php');
session_start();
if (!isset($_SESSION['connect'])) {
	header('Location: sign_in.php');
	exit();
}
if (isset($_GET['deconnecte'])) {
	session_destroy();
	header('Location: index.php?deconnecte');
	exit();
}
if (isset($_POST['add_credits']) and ($_POST['add_credits'] > 0)) {
	add_credits(pseudo($_SESSION['email']), $_POST['add_credits']);
}
if (isset($_POST['rm_credits']) and ($_POST['rm_credits'] > 0)) {
	add_credits(pseudo($_SESSION['email']), -$_POST['rm_credits']);
}
if (isset($_POST['suppr_bet'])) {
	supprBet($_POST['suppr_bet'], pseudo($_SESSION['email']));
	oddsEvaluation($_POST['suppr_bet']);
}
	
require("boilerplate.php");
require("navbar_connected.php");
?>
<div class="jumbotron">
	<div class="container">
		<h1>Welcome <?php echo pseudo($_SESSION['email']) ?>!</h1>
		<p><?php echo $_SESSION['email'] ?></p>
		<form class="form-horizontal" action="register.php" method="post">
			<div class="form-group"> 
				<div>
					<input type="hidden" class="form-control" name="change">
				</div>
				<div class="col-sm-6">
					<button type="submit" class="btn btn-default">Change my personal informations</button>
				</div>
			</div>
		</form>
		<p> You have <?php echo remaining_credits(pseudo($_SESSION['email'])); ?> $ on your account</p>
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
$bets = betsUser(pseudo($_SESSION['email']));
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
								echo "style='width: ".(percentBet($bet['ref'], 1)*100)."%' "; 
								echo "aria-valuenow=".(percentBet($bet['ref'], 1)*100);
								?>
							>
								<span><?php echo (percentBet($bet['ref'], 1)*100)."%" ?></span>
							</div>	
						</div>
		            </li>
		            <li class="list-group-item  col-sm-4
						<?php if ($bet['bet_type'] == 2) echo 'active'; ?>
		            ">
						<div class='text-center'>
							<span>draw</span>
							<br>
							<span><?php echo $bet['draw'] ?></span>
						</div>
						<div class='progress'>
							<div class='progress-bar progress-bar-success progress-bar-striped' aria-valuemax='100' aria-valuemin='0'  
								<?php 
								echo "style='width: ".(percentBet($bet['ref'], 2)*100)."%' "; 
								echo "aria-valuenow=".(percentBet($bet['ref'], 2)*100);
								?>
							>
								<span><?php echo (percentBet($bet['ref'], 2)*100)."%" ?></span>
							</div>	
						</div>

		            </li>
		            <li class="list-group-item col-sm-4
						<?php if ($bet['bet_type'] == 3) echo 'active'; ?>
		            ">
						<div class='text-center'>
							<span><?php echo $bet['team2'] ?></span>
							<br>
							<span><?php echo $bet['odds2'] ?></span>
						</div>
						<div class='progress'>
							<div class='progress-bar progress-bar-success progress-bar-striped' aria-valuemax='100' aria-valuemin='0' 
								<?php 
								echo "style='width: ".(percentBet($bet['ref'], 3)*100)."%' "; 
								echo "aria-valuenow=".(percentBet($bet['ref'], 3)*100);
								?>
							>
								<span><?php echo (percentBet($bet['ref'], 3)*100)."%" ?></span>
							</div>	
						</div>
		            </li>
		          </ul>
		        </div>
		        <div class='col-sm-3'>
					<p>Your bet: <?php echo $bet['bet_amount']."$" ?></p>
					<form class="form-horizontal" action="bet.php" method="post">
						<div class="form-group"> 
							<div>
								<input type="hidden" class="form-control" name="match_ref" value=<?php echo $bet['ref'] ?>>
							</div>
							<div class="col-sm-6 col-sm-offset-3">
								<button type="submit" class="btn btn-default"> Modify my bet </button>
							</div>
						</div>
					</form>
		        </div>
			</div>
		</div>
	</div>
<?php
}
?>
</div>
<?php require "footer.php" ?>
