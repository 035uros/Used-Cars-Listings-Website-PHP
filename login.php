<?php
include 'baza_podataka.php';
session_start();
if(isset($_GET["o"])){
  $_SESSION["potvrdjenpristup"] = false;
}
if(isset($_GET["nijeprijavljen"])){
  echo '<script>alert("Да бисте поставили оглас, морате бити пријављени.")</script>';
}
set_url("http://localhost:3000/login.php");
?>
<!DOCTYPE html>
<html>
    <head>

        <title>Пријава</title>

        <link rel="stylesheet" href="style/login.css">
        <link rel="stylesheet" href="style/style.css">

    </head>

    <body>

        <div class="topnav">
            <?php if($_SESSION['potvrdjenpristup'] == true){
                echo'<a class="active" href="login.php?o=1">Одјави се</a>';
              }else{
                echo'<a class="active" href="login.php">Пријави се</a>';
              }
            ?>    
            <a href="unosOglasa.php">Постави оглас</a>
            <a href="index.php">Почетна</a>
        </div>


        <div class="center">
        <div class="login-page">
            <div class="form">
            <h1>Пријава</h1>
              <form class="login-form">

                <input type="text" placeholder="Корисничко име"  name="user" />
                <input type="password" placeholder="Лозинка"  name="pass" />

                <input type="submit" name="logovanje" value="Пријави се">
                
                <p class="message"> Нисте регистровани? <a href="registration.php"> Направи налог </a></p>

               <?php
                    if(isset($_GET["logovanje"])){
                      
                      $conn = OpenCon();
                      $conn->query("SET NAMES 'utf8'");
                      $sql = "SELECT * FROM korisnik";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($red = $result->fetch_assoc()) {
                          if($_GET["pass"]==$red["sifra"] && $_GET["user"]==$red["username"]){
                            $_SESSION['potvrdjenpristup']=true;
                            $_SESSION['korisnik']=$red["id_korisnika"];
                            $_SESSION['id_tipa_korisnika']=$red["id_tipa_korisnika"];
                            if($_SESSION['rola'] == "Administrator"){
                              echo '<script>window.open("kontrolnatabla.php", "_self")</script>';
                            }
                            else{
                              echo '<script>window.open("index.php", "_self")</script>';
                            }
                          }
                        }
                        echo '<script>alert("Корисничко име или лозинка нису валидни.")</script>';
                      }
                    }
                    ?>
              </form>
            </div>
            </div>
            </div>
        <div class="footer">
            <p>аутодетектив 2023. © Сва права задржана.</p>
        </div>

    </body>
</html>