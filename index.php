<?php
require 'function.php';
if(isset($_SESSION["id"])){
  $id = $_SESSION["id"];
  $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE id = $id"));
}
else{
  header("Location: form.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="assets/script.js"></script>
    <link rel="stylesheet" href="assets/form.css">
    <title>Block Dash</title>
</head>
<body>
    <div class="container">
        <img id="gambarGame" src="assets/BLOCK DASH KECIL.png">
        <div id="card-game">
            <div id="deskripsigame">
                <div class="judulgame">
                    <h1>Block Dash Adventure</h1>
                </div>
                <div class="isicard">
                    <p>Player : <?php echo $user["username"]?> # <?php echo $user['id']?></p>
                    
                    <p>Choose Color : <input type="color" id="warna"></p>
                    <p>Block Dash Adventure adalah sebuah permainan klasik dimana player bermain sebagai block kemudian menghindari obstacle / rintangan agar block tidak mati</p> 
                </div>
                <div class="start-out">
                    <a href="logout.php"><button id="btn-out">Log Out</button></a>
                    <button id="btn-start" onclick="mulaigame()">Start</button>
                </div>   
            </div>
        </div>

        <div id="cardcanvas">
            <p id="playername">Player : <?php echo $user["username"]?></p>
                <div id="isigame" onload="mulaigame()">
                    <div class="publisher2">
                        <p>&copy; Develop by Mahesa</p>
                    </div>
                    
                </div>
            <div id="kumpulbtn2">
                <button id="restart" onclick="restart()">Try Again</button>
                <button id="quit" onclick="quit()">Quit</button>
            </div>
        </div>
    </div>
</body>
</html>