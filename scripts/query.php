<?php

require_once 'connection.php';

// QUERRY QUE CHAMA as medias do drags DA LIGA CBLOL
if(isset($_POST['submit'])){
    $league = $_POST['league'];

    echo "League: " . $league;

    $sql = "SELECT league, dragons FROM games WHERE league = '$league' AND dragons >= 0 AND dragons IS NOT NULL";


    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<ul>";
    
        while ($row = mysqli_fetch_assoc($resultado)) {
            $dragons = $row['dragons'];
            if (!empty($dragons)) {
                echo "<li>League: " . $row['league'] . ", dragons: " . $dragons . "</li>";
            }
        }
    
        echo "</ul>";
    } else {
        echo "Nenhum resultado encontrado.";
    }
    
}
?>