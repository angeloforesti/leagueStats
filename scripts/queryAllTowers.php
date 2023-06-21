<?php

require_once 'connection.php';


// QUERRY QUE CHAMA TODOS OS drags DA LIGA CBLOL
if(isset($_POST['submit'])){
    $league = $_POST['league'];

    echo "League: " . $league;

    $sql = "SELECT towers FROM games WHERE league = '$league' AND towers >= 0 AND towers IS NOT NULL AND position = 'team'"  ;


    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<ul>";
    
        while ($row = mysqli_fetch_assoc($resultado)) {
            $towers = $row['towers'];
            if (!empty($towers)) {
                echo  ", towers: " . $towers . "</li>";
            }
        }
    
        echo "</ul>";
    } else {
        echo "Nenhum resultado encontrado.";
    }
    
}
?>