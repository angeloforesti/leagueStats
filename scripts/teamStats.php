<link rel="stylesheet" href="../style/style.css">

<?php

require_once 'connection.php';

if(isset($_POST['submit'])){
    $team1 = $_POST['team1'];
    $team2 = $_POST['team2'];

    echo "teams: " . $team1 . $team2;

    $sqlDragonsTeam1 = "SELECT AVG(team1.dragons) AS average_dragons_team1 FROM games AS team1
    JOIN games AS team2 ON team1.gameid = team2.gameid
    WHERE team1.teamname = '$team1'
      AND team2.teamname = '$team2'
      AND team1.position = 'team'
      AND team2.position = 'team'";
      
    $sqlDragonsTeam2 = "SELECT AVG(team2.dragons) AS average_dragons_team2 FROM games AS team2
    JOIN games AS team1 ON team2.gameid = team1.gameid
    WHERE team2.teamname = '$team2'
        AND team1.teamname = '$team1'
        AND team2.position = 'team'
        AND team1.position = 'team'";

$sqlBaronsTeam1 = "SELECT AVG(team1.barons) AS average_barons_team1 FROM games AS team1
JOIN games AS team2 ON team1.gameid = team2.gameid
WHERE team1.teamname = '$team1'
  AND team2.teamname = '$team2'
  AND team1.position = 'team'
  AND team2.position = 'team'";

$sqlBaronsTeam2 = "SELECT AVG(team1.barons) AS average_barons_team2 FROM games AS team2
JOIN games AS team1 ON team2.gameid = team1.gameid
WHERE team2.teamname = '$team2'
    AND team1.teamname = '$team1'
    AND team2.position = 'team'
    AND team1.position = 'team'";
      

    $sqlTowers = "SELECT AVG(towers) AS average_towers FROM games 
    WHERE teamname IN ('$team1', '$team2') AND position = 'team'";

    $sqlGamelength = "SELECT AVG(gamelength) AS average_gamelength FROM games 
    WHERE teamname IN ('$team1', '$team2') AND position = 'team' AND side ='red'";

    $resultadoDragonsTeam1 = mysqli_query($conn, $sqlDragonsTeam1);
    $resultadoDragonsTeam2 = mysqli_query($conn, $sqlDragonsTeam2);
    $resultadoBaronsTeam1 = mysqli_query($conn, $sqlBaronsTeam1);
    $resultadoBaronsTeam2 = mysqli_query($conn, $sqlBaronsTeam2);
    $resultadoTowers = mysqli_query($conn, $sqlTowers);
    $resultadoGamelength = mysqli_query($conn, $sqlGamelength);

    if (mysqli_num_rows($resultadoDragonsTeam1) > 0  && mysqli_num_rows($resultadoDragonsTeam1) > 0 
    && mysqli_num_rows($resultadoTowers) > 0 && mysqli_num_rows($resultadoGamelength) > 0) {
        $rowDragonsTeam1 = mysqli_fetch_assoc($resultadoDragonsTeam1);
        $rowDragonsTeam2 = mysqli_fetch_assoc($resultadoDragonsTeam2);
        $rowBaronsTeam1 = mysqli_fetch_assoc($resultadoBaronsTeam1);
        $rowBaronsTeam2 = mysqli_fetch_assoc($resultadoBaronsTeam2);
        $rowTowers = mysqli_fetch_assoc($resultadoTowers);
        $rowGamelength = mysqli_fetch_assoc($resultadoGamelength);

        $averageDragonsTeam1 = $rowDragonsTeam1['average_dragons_team1'];
        $averageDragonsTeam2 = $rowDragonsTeam2['average_dragons_team2'];
        $averageBaronsTeam1 = $rowBaronsTeam1['average_barons_team1'];
        $averageBaronsTeam2 = $rowBaronsTeam2['average_barons_team2'];
        $averageTowers = $rowTowers['average_towers'];
        $averageTime = $rowGamelength['average_gamelength'];
        $averageTimeRound = round($averageTime, 2);
        $averageMinutes = floor($averageTimeRound / 60);
        $averageSeconds = number_format(($averageTimeRound - ($averageMinutes * 60)), 2); 
        $averageSecondsRound = round($averageSeconds, 0);

        echo "Média de dragons: " . round(($averageDragonsTeam1 + $averageDragonsTeam2),2) .
         " | Média de barons: " . round($averageBaronsTeam1 + $averageBaronsTeam2,2) . " | Média de towers: " . round($averageTowers, 2) . " | Média de tempo: " . $averageMinutes . " minutos " . $averageSecondsRound . " segundos";
    } else {
        echo "Nenhum resultado encontrado.";
    }
}
?>
