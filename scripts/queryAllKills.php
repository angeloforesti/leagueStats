<link rel="stylesheet" href="../style/style.css">

<?php

require_once 'connection.php';


// QUERRY QUE CHAMA TODOS OS drags DA LIGA CBLOL
if(isset($_POST['submit'])){
    $league = $_POST['league'];

    echo "League: " . $league;

    $sql = "SELECT kills FROM games WHERE league = '$league' AND position = 'team'"  ;


    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<ul>";
    
        while ($row = mysqli_fetch_assoc($resultado)) {
            $kills = $row['kills'];
            if (!empty($kills)) {
                echo  ", kills: " . $kills . "</li>";
            }
        }
    
        echo "</ul>";
    } else {
        echo "Nenhum resultado encontrado.";
    }
    
}
?>