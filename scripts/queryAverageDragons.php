<?php

require_once 'connection.php';

// QUERRY QUE CHAMA as medias do drags DA LIGA CBLOL
if(isset($_POST['submit'])){
    $league = $_POST['league'];

    echo "League: " . $league;

    $sql = "SELECT AVG(dragons) AS average_dragons FROM games WHERE league = '$league' AND dragons IS NOT NULL AND dragons > 0";
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
