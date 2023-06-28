<link rel="stylesheet" href="../style/style.css">

<?php

require_once 'connection.php';

// QUERRY QUE CHAMA as medias do drags DA LIGA CBLOL
if(isset($_POST['submit'])){
    $league = $_POST['league'];

    echo "League : " . $league;

    $sqlRed = "SELECT AVG(barons) AS average_barons_red FROM games WHERE league = '$league'
    AND position = 'team' AND side = 'red'";
    $sqlBlue = "SELECT AVG(barons) AS average_barons_blue FROM games WHERE league = '$league'
    AND position = 'team' AND side = 'blue'";
    $resultadoRed = mysqli_query($conn, $sqlRed);
    $resultadoBlue = mysqli_query($conn, $sqlBlue);
    if (mysqli_num_rows($resultadoRed) > 0) {
    $rowRed = mysqli_fetch_assoc($resultadoRed);
    $averageBaronsRed = $rowRed['average_barons_red'];
    $rowBlue = mysqli_fetch_assoc($resultadoBlue);
    $averageBaronsBlue = $rowBlue['average_barons_blue'];

    echo "Média de barons : " . round(($averageBaronsRed + $averageBaronsBlue),2);
} else {
    echo "Nenhum resultado encontrado.";
}

    
}
?>
