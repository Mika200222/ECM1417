<?php

session_start();
$btn_menu='';
$flag = 0;
if(isset($_SESSION['username'])&& $_SESSION['username']!=""){
    $flag=1;
    $btn_menu='<li class="nav-item">
    <a class="nav-link active" aria-current="page" href="leaderboard.php" name="leaderboard">Leaderboard</a>
    </li>';
}else{
    $flag = 0;
    $btn_menu='<li class="nav-item">
    <a class="nav-link" href="registration.php" name="register">Register</a>
    </li>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" name="home">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               
            </ul>
            <div class="navbar-text">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               
                <li class="nav-item">
                <a class="nav-link" href="pairs.php" name="memory">Play Pairs</a>
                </li>
                <?=$btn_menu?>
                
            </ul>   
            </div>
            </div>
    </div>
    </nav>  
</header>
