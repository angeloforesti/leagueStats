<link rel="stylesheet" href="../style/style.css">

<?php

require_once 'connection.php';

// QUERRY QUE CHAMA as medias do drags DA LIGA CBLOL
if(isset($_POST['submit'])){
    $league = $_POST['league'];

    echo "League: " . $league;

    $sql = "SELECT AVG(barons) AS average_barons FROM games WHERE league = '$league'
     AND position = 'team' ";
$resultado = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $row = mysqli_fetch_assoc($resultado);
    $averageBarons = $row['average_barons'];

    echo "Média de dragons: " . $averageBarons;
} else {
    echo "Nenhum resultado encontrado.";
}

    
}
?>
