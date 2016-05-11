<?php
require("functions.php");
session_start();
if (isset($_GET['cat'])) {
	// blablablablablabla !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	// si on veut ne pqs faire du GET on peut stocker dans SESSION et header.... a voir
}
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
					<a href="index.php?cat=fighting" class="list-group-item">Fighting sport</a>
					<a href="index.php?cat=e-sport" class="list-group-item">E-sport</a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12 padding-bottom">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>
					<?php
					if (isset($_GET['cat'])) {
						$bets = list_betsCat($_GET['cat']);
					} else {
						$bets = list_bets();
					}
					foreach ($bets as $bet) {
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
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right"><?php echo "$date" ?></h4>
                                <h4>
									<a href="#"><?php echo "$team1 vs $team2" ?></a>
                                </h4>
                                <h4><p><?php echo "$sport" ?></p></h4>
									<h7>
										<p class="pull-right">
											<?php echo "draw : $draw" ?>
										</p>
									</h7>
									<h7>
		                                <p class="pull-left">
											<?php echo "odds : $team1 $odds1 ; $team2 $odds2" ?>
		                                </p>
									</h7>
                            </div>
                        </div>
                    </div>
				<?php } ?>
            </div>
        </div>
	</div>
<?php require "footer.php" ?>
