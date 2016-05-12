<?php
require("functions.php");
session_start();

if (!isset($_SESSION['connect'])) {
	header('Location: sign_in.php');
	exit();
}
if (isset($_GET['deconnecte'])) {
	header('Location: index.php');
	exit();
}
if (!isset($_POST['match_ref'])) {
	header('Location: index.php');
	exit();	
}
if (isset($_POST['amount']) && ($_POST['amount'] > 0)) {
	if (isset($_POST['bet_type'])) {
		// let's go
		
	} else {
			// msg "make a choice"
	}
}

require("boilerplate.php");
require("navbar_connected.php");
$match = match($_POST['match_ref']);
?>
<div class="jumbotron">
	<div class="container">
		<div>
			<h1>Hello <?php echo pseudo($_SESSION['email']) ?>!</h1>
			<p> You have <?php echo remaining_credits($_SESSION['email']); ?> on your account</p>
		</div>
		<div>
			<div class="col-md-12">
				<div class="thumbnail">
					<img src="http://placehold.it/320x150" alt="">
					<div class="caption">
						<h4 class="pull-right"><?php echo $match['date'] ?></h4>					
						<h4>
							<a href="#"><?php echo $match['team1'].' vs '.$match['team2'] ?></a>
						</h4>
						<h4>
							<p><?php echo $match['sport'] ?></p>
						</h4>
					</div>
					<div class="row">
				        <div class="col-sm-6 col-sm-offset-3">
				          <ul class="list-inline">
				            <li class="list-group-item col-sm-4
					            <?php 
					            if (isset($_GET['bet']) && ($_GET['bet'] == 1))
										echo 'active';
								?>
				            ">
								<div class='text-center'>
									<span><?php echo $match['team1'] ?></span>
									<br>
									<span><?php echo $match['odds1'] ?></span>
								</div>
								<div class='progress'>
									<div class='progress-bar progress-bar-success progress-bar-striped' aria-valuemax='100' aria-valuemin='0'  
										<?php 
										echo "style='width: ".(number_format(percentBet($match['ref'], 1), 2)*100)."%' "; 
										echo "aria-valuenow=".(number_format(percentBet($match['ref'], 1), 2)*100);
										?>
									>
										<span><?php echo (number_format(percentBet($match['ref'], 1), 2)*100)."%" ?></span>
									</div>	
								</div>
				            </li>
				            <li class="list-group-item  col-sm-4
					            <?php 
					            if (isset($_POST['bet_type'])) 
									if ($_POST['bet_type'] == 2)
										echo 'active';
								?>
				            ">
								<div class='text-center'>
									<span>draw</span>
									<br>
									<span><?php echo $match['draw'] ?></span>
								</div>
								<div class='progress'>
									<div class='progress-bar progress-bar-success progress-bar-striped' aria-valuemax='100' aria-valuemin='0'  
										<?php 
										echo "style='width: ".(number_format(percentBet($match['ref'], 2), 2)*100)."%' "; 
										echo "aria-valuenow=".(number_format(percentBet($match['ref'], 2), 2)*100);
										?>
									>
										<span><?php echo (number_format(percentBet($match['ref'], 2), 2)*100)."%" ?></span>
									</div>	
								</div>
			
				            </li>
				            <li class="list-group-item col-sm-4
					            <?php 
					            if (isset($_POST['bet_type'])) 
									if ($_POST['bet_type'] == 1)
										echo 'active';
								?>
				            ">
								<div class='text-center'>
									<span><?php echo $match['team2'] ?></span>
									<br>
									<span><?php echo $match['odds2'] ?></span>
								</div>
								<div class='progress'>
									<div class='progress-bar progress-bar-success progress-bar-striped' aria-valuemax='100' aria-valuemin='0' 
										<?php 
										echo "style='width: ".(number_format(percentBet($match['ref'], 3), 2)*100)."%' "; 
										echo "aria-valuenow=".(number_format(percentBet($match['ref'], 3), 2)*100);
										?>
									>
										<span><?php echo (number_format(percentBet($match['ref'], 3), 2)*100)."%" ?></span>
									</div>	
								</div>
				            </li>
				          </ul>
				        </div>
				        <form class="form-horinzontal col-sm-4 col-sm-offset-4" action="bet.php" method='post'>
							<div class="form-group">
								<input type="hidden" class="form-control" name="match_ref" value=<?php echo $_POST['match_ref'] ?>>
							</div>
							<div class="form-group">
								<label name="How much?" class="control-label">How much do you want to bet?</label>
								<input type="number" class="form-control" name="amount" min="0" placeholder='$' value="<?php if (isset($_POST['amount'])) echo $_POST['amount'] ?>">
							</div>
							<div class="form-group">
								<select class="form-control" name="bet_type" required>
									<option value=""></option>
									<option value="1"><?php echo $match['team1'] ?></option>
									<option value="2"><?php echo "draw" ?></option>
									<option value="3"><?php echo $match['team2'] ?></option>
								</select>           
							</div>
							<div class="form-group col-sm-4 col-sm-offset-4">
								<button type="submit" class="form-control btn btn-default"> Bet </button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>





<?php require("footer.php"); ?>
