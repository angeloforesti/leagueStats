<link rel="stylesheet" href="../style/style.css">

<?php

require_once 'connection.php';

// QUERRY QUE CHAMA as medias do drags DA LIGA CBLOL
if(isset($_POST['submit'])){
    $league = $_POST['league'];

    echo "League: " . $league;

    $sqlRed = "SELECT AVG(kills) AS average_kills_red FROM games WHERE league = '$league' 
    AND position = 'team' AND side = 'red'";
    $sqlBlue = "SELECT AVG(kills) AS average_kills_blue FROM games WHERE league = '$league' 
    AND position = 'team' AND side = 'blue'";

$resultadoRed = mysqli_query($conn, $sqlRed);
$resultadoBlue = mysqli_query($conn, $sqlBlue);

if (mysqli_num_rows($resultadoRed) > 0 && mysqli_num_rows($resultadoBlue) > 0) {
    $rowRed = mysqli_fetch_assoc($resultadoRed);
    $averagekillsRed = $rowRed['average_kills_red'];
    $rowBlue = mysqli_fetch_assoc($resultadoBlue);
    $averagekillsBlue = $rowBlue['average_kills_blue'];

    echo "Média de kills: " . round(($averagekillsRed + $averagekillsBlue), 1);
} else {
    echo "Nenhum resultado encontrado.";
}

    
}
?>
