<?php
include("functions.php");
$db_con = db_con();
$stmt = mysqli_prepare($db_con, "SELECT `sport`, `team1`, `team2`, `date`, `odds1`, `odds2`, `draw` FROM `match`");
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$assoc = mysqli_fetch_all($res, MYSQLI_ASSOC);
mysqli_free_result($res);
mysqli_close($db_con);
foreach ($assoc as $bet) {
  $sport = $bet['sport'];
  $team1 = $bet['team1'];
  $team2 = $bet['team2'];
  $date = $bet['date'];
  $odds1 = $bet['odds1'];
  $odds2 = $bet['odds2'];
  $draw = $bet['draw'];
  echo $sport;
}
?>
