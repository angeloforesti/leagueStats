<?php

require_once 'connection.php';

// QUERRY QUE CHAMA as medias do drags DA LIGA CBLOL
if(isset($_POST['submit'])){
    $league = $_POST['league'];

    echo "League: " . $league;

    $sql = "SELECT AVG(gamelength) AS average_time, league, position
    FROM games 
    WHERE league = '$league' 
    AND gamelength >= 0 AND gamelength IS NOT NULL 
    AND position = 'team' AND side = 'blue'
    GROUP BY league, position";


   $resultado = mysqli_query($conn, $sql);

   if (mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    $averageTime = $row['average_time'];

    echo "Média de tempo: " . $averageTime;
} else {
    echo "Nenhum resultado encontrado.";
}

}
?>
