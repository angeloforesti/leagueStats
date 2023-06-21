<?php

require_once 'connection.php';

// QUERRY QUE CHAMA as medias do drags DA LIGA CBLOL
if(isset($_POST['submit'])){
    $league = $_POST['league'];

    echo "League: " . $league;

    $sql = "SELECT AVG(towers) AS average_towers, league
    FROM games 
    WHERE league = '$league' 
    AND towers >= 0 AND towers IS NOT NULL 
    AND position = 'team'
    GROUP BY league, position";


   $resultado = mysqli_query($conn, $sql);

   if (mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    $averageTowers = $row['average_towers'];

    echo "Média de torres: " . $averageTowers;
} else {
    echo "Nenhum resultado encontrado.";
}

}
?>
