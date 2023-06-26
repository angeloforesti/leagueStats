<link rel="stylesheet" href="../style/style.css">
<?php


require_once 'connection.php';


// QUERRY QUE CHAMA TODOS OS drags DA LIGA CBLOL
if(isset($_POST['submit'])){
    $league = $_POST['league'];

    echo "League: " . $league;

    $sql = "SELECT league, barons FROM games WHERE league = '$league' AND barons >= 0 AND dragons IS NOT NULL AND position = 'team'" ;


    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        echo "<ul>";
    
        while ($row = mysqli_fetch_assoc($resultado)) {
            $barons = $row['barons'];
            if (!empty($barons)) {
                echo "<li>League: " . $row['league'] . ", barons: " . $barons . "</li>";
            }
        }
    
        echo "</ul>";
    } else {
        echo "Nenhum resultado encontrado.";
    }
    
}
?>