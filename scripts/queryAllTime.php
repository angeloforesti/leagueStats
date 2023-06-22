<link rel="stylesheet" href="../style/style.css">

<?php

require_once 'connection.php';


// QUERRY QUE CHAMA TODOS OS drags DA LIGA CBLOL
if(isset($_POST['submit'])){
    $league = $_POST['league'];

    echo "League: " . $league;

    $sql = "SELECT  gamelength FROM games WHERE league = '$league' 
    AND position = 'team' AND side ='red'";


    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<ul>";
    
        while ($row = mysqli_fetch_assoc($resultado)) {
            $timeGame = $row['gamelength'];
            $timeGameCorrect = floor($timeGame / 60);
            $seconds = $timeGame % 60; 

            if (!empty($timeGame)) {
                echo "<li> gamelength: " . $timeGameCorrect . "minutes" . $seconds . "seconds". "</li>";
            }
        }
    
        echo "</ul>";
    } else {
        echo "Nenhum resultado encontrado.";
    }
    
}
?>