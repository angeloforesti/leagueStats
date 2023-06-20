<?php 
//conexao com o banco
$serverName = "localhost";
$userName  = "root";
$passwordDb = "";
$dbName = "leaguestats";

$conn = mysqli_connect($serverName, $userName, $passwordDb, $dbName );

if(!$conn){
    die("falha na conexao" . misqli_connect_error());
}

?>