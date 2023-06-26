<link rel="stylesheet" href="../style/style.css">

<?php

require_once 'connection.php';

if(isset($_POST['submit'])){
    $team1 = $_POST['team1'];
    $team2 = $_POST['team2'];

    echo "teams: " . $team1 . $team2;

    $sqlDragons = "SELECT AVG(dragons) AS average_dragons FROM games WHERE teamname IN ('$team1', '$team2') AND position = 'team'";
    $sqlBarons = "SELECT AVG(barons) AS average_barons FROM games WHERE teamname IN ('$team1', '$team2') AND position = 'team'";
    $sqlTowers = "SELECT AVG(towers) AS average_towers FROM games WHERE teamname IN ('$team1', '$team2') AND position = 'team'";
    $sqlGamelength = "SELECT AVG(gamelength) AS average_gamelength FROM games WHERE teamname IN ('$team1', '$team2') AND position = 'team' AND side ='red'";

    $resultadoDragons = mysqli_query($conn, $sqlDragons);
    $resultadoBarons = mysqli_query($conn, $sqlBarons);
    $resultadoTowers = mysqli_query($conn, $sqlTowers);
    $resultadoGamelength = mysqli_query($conn, $sqlGamelength);

    if (mysqli_num_rows($resultadoDragons) > 0 && mysqli_num_rows($resultadoBarons) > 0 && mysqli_num_rows($resultadoTowers) > 0 && mysqli_num_rows($resultadoGamelength) > 0) {
        $rowDragons = mysqli_fetch_assoc($resultadoDragons);
        $rowBarons = mysqli_fetch_assoc($resultadoBarons);
        $rowTowers = mysqli_fetch_assoc($resultadoTowers);
        $rowGamelength = mysqli_fetch_assoc($resultadoGamelength);

        $averageDragons = $rowDragons['average_dragons'];
        $averageBarons = $rowBarons['average_barons'];
        $averageTowers = $rowTowers['average_towers'];
        $averageTime = $rowGamelength['average_gamelength'];
        $averageMinutes = floor($averageTime / 60);
        $averageSeconds = intval($averageTime % 60);

        echo "Média de dragons: " . $averageDragons . " | Média de barons: " . $averageBarons . " | Média de towers: " . $averageTowers . " | Média de tempo: " . $averageMinutes . " minutos " . $averageSeconds . " segundos";
    } else {
        echo "Nenhum resultado encontrado.";
    }
}
?>
