<!DOCTYPE html>
<html>
    <head>

        <title>Пријава</title>

        <link rel="stylesheet" href="style/login.css">
        <link rel="stylesheet" href="style/style.css">

    </head>

    <body>

        <div class="topnav">
            <a class="active" href="login.php">Пријави се</a>
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

                <input type="submit" value="Пријави се">
                
                <p class="message"> Нисте регистровани? <a href="registration.php"> Направи налог </a></p>

               <!-- <?php
                    if(isset($_GET["logovanje"])){
                      
                      /*$conn = OpenCon();*/
                      $conn->query("SET NAMES 'utf8'");
                      $sql = "SELECT * FROM osoba WHERE verifikovan = 1";
                      $result = $conn->query($sql);
                      if ($result->num_rows > 0) {
                        while($red = $result->fetch_assoc()) {
                          if($_GET["pass"]==$red["sifra"] && $_GET["user"]==$red["username"]){
                            $_SESSION['potvrdjenpristup']=true;
                            $_SESSION['korisnik']=$red["idOsobe"];
                            $_SESSION['rola']=$red["rola"];
                            if($_SESSION['rola'] == "Administrator"){
                              echo '<script>window.open("kontrolnatabla.php", "_self")</script>';
                            }
                            else{
                              echo '<script>window.open("index.php", "_self")</script>';
                            }
                          }
                        }
                        echo '<script>alert("Korisničko ime i šifra se ne poklapaju.")</script>';
                      }
                    }
                    ?>-->
              </form>
            </div>
            </div>
            </div>
        <div class="footer">
            <p>аутодетектив 2023. © Сва права задржана.</p>
        </div>

    </body>
</html>