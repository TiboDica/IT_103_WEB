<?php
require("functions.php");
session_start();
if (isset($_GET['deconnecte'])) {
	session_destroy();
	header('Location: index.php');
	exit;
} 

require("boilerplate.php");
if (isset($_SESSION['connect'])){
	require("navbar_connected.php");
} else{
	require("navbar_unconnected.php");
}
?>
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <p class="lead">Sporting Bets</p>
                <div class="list-group">
                    <a href="index.php?cat=football" class="list-group-item">Football</a>
                    <a href="index.php?cat=tennis" class="list-group-item">Tennis</a>
                    <a href="index.php?cat=basketball" class="list-group-item">Basketball</a>
					<a href="index.php?cat=rugby" class="list-group-item">Rugby</a>
					<a href="index.php?cat=handball" class="list-group-item">Handball</a>
					<a href="index.php?cat=ice-hockey" class="list-group-item">Ice Hockey</a>
					<a href="index.php?cat=volley-ball" class="list-group-item">Volley-Ball</a>
					<a href="index.php?cat=baseball" class="list-group-item">Baseball</a>
					<a href="index.php?cat=fighting-sport" class="list-group-item">Fighting sport</a>
					<a href="index.php?cat=e-sport" class="list-group-item">E-sport</a>
                </div>
            </div>

            <div class="col-md-9">
					<?php
					if (isset($_GET['cat'])) {
						$bets = list_betsCat($_GET['cat']);
					} else {
						$bets = list_bets();
					}
					foreach ($bets as $bet) {
									$ref = $bet['ref'];
									$cat = $bet['cat'];
									$sport = $bet['sport'];
									$team1 = $bet['team1'];
									$team2 = $bet['team2'];
									$date = $bet['date'];
									$odds1 = $bet['odds1'];
									$odds2 = $bet['odds2'];
									$draw = $bet['draw'];
					 ?>							
						<div class="col-md-12">
							<div class="thumbnail">
								<img src="<? echo img($cat) ?>" alt="">
								<div class="caption">
									<h4 class="pull-right"><?php echo $date ?></h4>					
									<h4>
										<a href="#"><?php echo $team1.' vs '.$team2 ?></a>
									</h4>
									<h4>
										<p><?php echo $sport ?></p>
									</h4>
								</div>
								<div class="row">
									<div class="col-sm-2">
										<form class="form-horizontal" action="bet.php" method="post">
											<div class="form-group"> 
												<div>
													<input type="hidden" class="form-control" name="match_ref" value=<?php echo $ref ?>>
												</div>
												<div class="col-sm-6 col-sm-offset-3">
													<button type="submit" class="btn btn-default"> Bet </button>
												</div>
											</div>
										</form>
									</div>
							        <div class="col-sm-6 col-sm-offset-1">
							          <ul class="list-inline">
							            <li class="list-group-item col-sm-4">
											<div class='text-center'>
												<span><?php echo $team1 ?></span>
												<br>
												<span><?php echo $odds1 ?></span>
											</div>
											<div class='progress'>
												<div class='progress-bar progress-bar-success progress-bar-striped active' aria-valuemax='100' aria-valuemin='0'  
													<?php 
													echo "style='width: ".(percentBet($ref, 1)*100)."%' "; 
													echo "aria-valuenow=".(percentBet($ref, 1)*100);
													?>
												>
													<span><?php echo (percentBet($ref, 1)*100)."%" ?></span>
												</div>	
											</div>
							            </li>
							            <li class="list-group-item  col-sm-4">
											<div class='text-center'>
												<span>draw</span>
												<br>
												<span><?php echo $bet['draw'] ?></span>
											</div>
											<div class='progress'>
												<div class='progress-bar progress-bar-success progress-bar-striped active' aria-valuemax='100' aria-valuemin='0'  
													<?php 
													echo "style='width: ".(percentBet($ref, 2)*100)."%' "; 
													echo "aria-valuenow=".(percentBet($ref, 2)*100);
													?>
												>
													<span><?php echo (number_format(percentBet($ref, 2), 2)*100)."%" ?></span>
												</div>	
											</div>
					
							            </li>
							            <li class="list-group-item col-sm-4">
											<div class='text-center'>
												<span><?php echo $team2 ?></span>
												<br>
												<span><?php echo $odds2 ?></span>
											</div>
											<div class='progress'>
												<div class='progress-bar progress-bar-success progress-bar-striped active' aria-valuemax='100' aria-valuemin='0' 
													<?php 
													echo "style='width: ".(percentBet($ref, 3)*100)."%' "; 
													echo "aria-valuenow=".(percentBet($ref, 3)*100);
													?>
												>
													<span><?php echo (percentBet($ref, 3)*100)."%" ?></span>
												</div>	
											</div>
							            </li>
							          </ul>
							        </div>
								</div>
							</div>
						</div>
				<?php } ?>
            </div>
        </div>
	</div>
<?php require "footer.php" ?>
