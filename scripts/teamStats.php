<link rel="stylesheet" href="../style/style.css">

<?php

require_once 'connection.php';

if(isset($_POST['submit'])){
    $team1 = $_POST['team1'];
    $team2 = $_POST['team2'];

    echo "teams: " . $team1 . $team2;

    $sqlDragons = "SELECT AVG(team1.dragons) AS average_dragons FROM games AS team1
    JOIN games AS team2 ON team1.gameid = team2.gameid
    WHERE team1.teamname = '$team1'
      AND team2.teamname = '$team2'
      AND team1.position = 'team'
      AND team2.position = 'team'";

    $sqlBarons = "SELECT AVG(team1.barons) AS average_barons FROM games AS team1
    JOIN games AS team2 ON team1.gameid = team2.gameid
    WHERE team1.teamname = '$team1'
      AND team2.teamname = '$team2'
      AND team1.position = 'team'
      AND team2.position = 'team'";

    $sqlTowers = "SELECT AVG(towers) AS average_towers FROM games 
    WHERE teamname IN ('$team1', '$team2') AND position = 'team'";

    $sqlGamelength = "SELECT AVG(gamelength) AS average_gamelength FROM games 
    WHERE teamname IN ('$team1', '$team2') AND position = 'team' AND side ='red'";

    $resultadoDragons = mysqli_query($conn, $sqlDragons);
    $resultadoBarons = mysqli_query($conn, $sqlBarons);
    $resultadoTowers = mysqli_query($conn, $sqlTowers);
    $resultadoGamelength = mysqli_query($conn, $sqlGamelength);

    if (mysqli_num_rows($resultadoDragons) > 0  && mysqli_num_rows($resultadoBarons) > 0 
    && mysqli_num_rows($resultadoTowers) > 0 && mysqli_num_rows($resultadoGamelength) > 0) {
        $rowDragons = mysqli_fetch_assoc($resultadoDragons);
        $rowBarons = mysqli_fetch_assoc($resultadoBarons);
        $rowTowers = mysqli_fetch_assoc($resultadoTowers);
        $rowGamelength = mysqli_fetch_assoc($resultadoGamelength);

        $averageDragons = $rowDragons['average_dragons'];
        $averageBarons = $rowBarons['average_barons'];
        $averageTowers = $rowTowers['average_towers'];
        $averageTime = $rowGamelength['average_gamelength'];
        $averageTimeRound = round($averageTime, 2);
        $averageMinutes = floor($averageTimeRound / 60);
        $averageSeconds = number_format(($averageTimeRound - ($averageMinutes * 60)), 2); 
        $averageSecondsRound = round($averageSeconds, 0);

        echo "Média de dragons: " . round($averageDragons,2) . " | Média de barons: " . round($averageBarons,2) . " | Média de towers: " . round($averageTowers, 2) . " | Média de tempo: " . $averageMinutes . " minutos " . $averageSecondsRound . " segundos";
    } else {
        echo "Nenhum resultado encontrado.";
    }
}
?>
