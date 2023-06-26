<link rel="stylesheet" href="../style/style.css">

<?php

require_once 'connection.php';

// QUERRY QUE CHAMA as medias do drags DA LIGA CBLOL
if(isset($_POST['submit'])){
    $league = $_POST['league'];

    echo "League: " . $league;

    $sql = "SELECT AVG(gamelength) AS average_gamelength FROM games WHERE league = '$league' 
    AND position = 'team' AND side ='red'";

$resultado = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    $averageTime = $row['average_gamelength'];
    $averageMinutes = $averageTime / 60;
    //$averageSeconds = $averageTime % 60; 

    echo "Média de tempo: Minutos: " .$averageMinutes . "segundos : "  ;
} else {
    echo "Nenhum resultado encontrado.";
}

    
}
?>
