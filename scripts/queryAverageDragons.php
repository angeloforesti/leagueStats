<link rel="stylesheet" href="../style/style.css">

<?php

require_once 'connection.php';

// QUERRY QUE CHAMA as medias do drags DA LIGA CBLOL
if(isset($_POST['submit'])){
    $league = $_POST['league'];

    echo "League: " . $league;

    $sqlBlue = "SELECT AVG(dragons) AS average_dragons_blue FROM games WHERE league = '$league'
     AND position = 'team' AND side ='blue'";

    $sqlRed = "SELECT AVG(dragons) AS average_dragons_red FROM games WHERE league = '$league'
         AND position = 'team' AND side ='red'";

$resultadoBlue = mysqli_query($conn, $sqlBlue);
$resultadoRed = mysqli_query($conn, $sqlRed);

if (mysqli_num_rows($resultadoBlue) > 0 && mysqli_num_rows($resultadoRed) > 0) {
    $rowBlue = mysqli_fetch_assoc($resultadoBlue);
    $rowRed = mysqli_fetch_assoc($resultadoRed);
    $averageDragonsBlue = $rowBlue['average_dragons_blue'];
    $averageDragonsRed = $rowRed['average_dragons_red'];

    echo "Média de dragons: " . round(($averageDragonsBlue + $averageDragonsRed),2);
} else {
    echo "Nenhum resultado encontrado.";
}

    
}
?>
