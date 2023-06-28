<link rel="stylesheet" href="../style/style.css">

<?php

require_once 'connection.php';

// QUERRY QUE CHAMA as medias do drags DA LIGA CBLOL
if(isset($_POST['submit'])){
    $league = $_POST['league'];

    echo "League: " . $league;

    $sqlRed = "SELECT AVG(towers) AS average_towers_red FROM games  WHERE league = '$league' 
    AND position = 'team' and side = 'red'";
    $sqlBlue = "SELECT AVG(towers) AS average_towers_Blue FROM games  WHERE league = '$league' 
    AND position = 'team' and side = 'blue'";

   $resultadoRed = mysqli_query($conn, $sqlRed);
   $resultadoBlue = mysqli_query($conn, $sqlBlue);
   if (mysqli_num_rows($resultadoRed) > 0 && mysqli_num_rows($resultadoBlue) > 0) {
    $rowRed = mysqli_fetch_assoc($resultadoRed);
    $rowBlue = mysqli_fetch_assoc($resultadoBlue);
    $averageTowersRed = $rowRed['average_towers_red'];
    $averageTowersBlue = $rowBlue['average_towers_Blue'];

    echo "Média de torres: " . round(($averageTowersRed + $averageTowersBlue),2);
} else {
    echo "Nenhum resultado encontrado.";
}

}
?>
