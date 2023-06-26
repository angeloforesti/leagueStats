<link rel="stylesheet" href="../style/style.css">

<?php

require_once 'connection.php';

// QUERRY QUE CHAMA as medias do drags DA LIGA CBLOL
if(isset($_POST['submit'])){
    $team1 = $_POST['team1'];
    $team2 = $_POST['team2'];


    echo "teams: " . $team1 . $team2;

 $sql = "SELECT AVG(dragons) AS average_dragons FROM games WHERE teamname IN ('$team1', '$team2') AND position = 'team'";



$resultado = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    $averageDragons = $row['average_dragons'];

    echo "Média de dragons: " . $averageDragons;
} else {
    echo "Nenhum resultado encontrado.";
}

    
}
?>
