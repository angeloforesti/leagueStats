<link rel="stylesheet" href="../style/style.css">

<?php

require_once 'connection.php';

// QUERRY QUE CHAMA as medias do drags DA LIGA CBLOL
if(isset($_POST['submit'])){
    $league = $_POST['league'];

    echo "League: " . $league;

    $sql = "SELECT AVG(kills) AS average_kills FROM games WHERE league = '$league' 
    AND position = 'team'";
$resultado = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    $averagekills = $row['average_kills'];

    echo "Média de kills: " . $averagekills;
} else {
    echo "Nenhum resultado encontrado.";
}

    
}
?>
