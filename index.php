<?php
require("functions.php");
session_start();
require("boilerplate.php");
if (isset($_GET['deconnecte'])) {
	session_destroy();
	header('Location: index.php');
	exit;
}
elseif (isset($_SESSION['connect'])){
	require("navbar_connected.php");
}
else{
	require("navbar_unconnected.php");
}
?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <p class="lead">Sporting Bets</p>
                <div class="list-group">
                    <a href="#" class="list-group-item">Football</a>
                    <a href="#" class="list-group-item">Tennis</a>
                    <a href="#" class="list-group-item">Basketball</a>
										<a href="#" class="list-group-item">Rugby</a>
										<a href="#" class="list-group-item">Handball</a>
										<a href="#" class="list-group-item">Ice Hockey</a>
										<a href="#" class="list-group-item">Volley-Ball</a>
										<a href="#" class="list-group-item">Baseball</a>
										<a href="#" class="list-group-item">Fighting sport</a>
										<a href="#" class="list-group-item">E-sport</a>
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
								$bets = list_bets();
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
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
