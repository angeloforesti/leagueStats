<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/bootstrap.css">

    <title>LeagueStats</title>

    
</head>

<body class="bg-dark">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">League Stats</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Quem Somos</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="ligasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Ligas</a>
                        <ul class="dropdown-menu" aria-labelledby="ligasDropdown">
                            <li><a class="dropdown-item" href="#">CBLOL</a></li>
                            <li><a class="dropdown-item" href="#">LPL</a></li>
                            <li><a class="dropdown-item" href="#">LCK</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Jogadores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="teams.php">Times</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container">

<form method="post" action="scripts/queryAverageDragons.php" class="dark-form">
    <label for="objective">average Dragons per game</label>
    <label for="league">League</label>
    <input type="text" id="league" name="league">
    <input type="submit" name="submit" id="submit" value="enviar">
</form>


<form method="post" action="scripts/queryAverageBarons.php" class="dark-form">
    <label for="objective">average Barons per game</label>
    <label for="league">League</label>
    <input type="text" id="league" name="league">
    <input type="submit" name="submit" id="submit" value="enviar">
</form>


<form method="post" action="scripts/queryAverageTowers.php" class="dark-form">
    <label for="objective">average towers per game</label>
    <label for="league">League</label>
    <input type="text" id="league" name="league">
    <input type="submit" name="submit" id="submit" value="enviar">
</form>


<form method="post" action="scripts/queryAverageKills.php" class="dark-form">
    <label for="objective">average kills per game</label>
    <label for="league">League</label>
    <input type="text" id="league" name="league">
    <input type="submit" name="submit" id="submit" value="enviar">
</form>


<form method="post" action="scripts/queryAverageTime.php" class="dark-form">
    <label for="objective">average time per game</label>
    <label for="league">League</label>
    <input type="text" id="league" name="league">
    <input type="submit" name="submit" id="submit" value="enviar">
</form>
<div>


</body>
</html>