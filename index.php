<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeagueStats</title>

    
</head>
<body>
<form method="post" action="scripts/queryAllDragons.php">
    <label for="objective">All Dragons per game</label>
    <label for="league">League</label>
    <input type="text" id="league" name="league">
    <input type="submit" name="submit" id="submit" value="enviar">
</form>

<form method="post" action="scripts/queryAverageDragons.php">
    <label for="objective">average Dragons per game</label>
    <label for="league">League</label>
    <input type="text" id="league" name="league">
    <input type="submit" name="submit" id="submit" value="enviar">
</form>

<form method="post" action="scripts/queryAllTowers.php">
    <label for="objective">towers per game</label>
    <label for="league">League</label>
    <input type="text" id="league" name="league">
    <input type="submit" name="submit" id="submit" value="enviar">
</form>

<form method="post" action="scripts/queryAverageTowers.php">
    <label for="objective">average towers per game</label>
    <label for="league">League</label>
    <input type="text" id="league" name="league">
    <input type="submit" name="submit" id="submit" value="enviar">
</form>



</body>
</html>