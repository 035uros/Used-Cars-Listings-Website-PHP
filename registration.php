<?php
include 'baza_podataka.php';
if(isset($_POST["unoskorisnika"])){
    $user          = $_POST['Username'];
    $ime           = $_POST['Ime'];
    $prezime       = $_POST['Prezime'];
    $email         = $_POST['email'];
    $sifra1         = $_POST['Sifra'];
    $sifra2         = $_POST['Sifra2'];
    $telefon         = strval($_POST['mobilni']);
    if(isset($_POST['region'])){
        $region         = $_POST['region'];
    }
$conn = OpenCon();
$conn->query("SET NAMES 'utf8'");
if($sifra1 == $sifra2){
    $sql = "INSERT INTO `korisnik` (`ime`, `prezime`, `id_tipa_korisnika`, `email`,`username`, `sifra`, `kontaktTelefon`, `region`) VALUES ('$ime', '$prezime', 2, '$email','$user', '$sifra1', '$telefon', '$region');";
    if($conn->query($sql)){
        echo '<script>alert("Унос успешан, проследићемо вас на страницу за пријављивање.")</script>';
        header( 'location: /login.php' );
    }
    else{
        echo '<script>alert("Грешка при уносу, проверите унете податке.")</script>';
    }
}else{
    echo '<script>alert("Шифре се не поклапају")</script>';
}

CloseCon($conn);
}
?>
<!DOCTYPE html>
<html>
    <head>

        <title>Регистрација</title>

        <link rel="stylesheet" href="style/login.css">
        <link rel="stylesheet" href="style/style.css">

    </head>

    <body>

    <div class="topnav">
            <?php if($_SESSION['potvrdjenpristup'] == true)
            {
               echo'<a href="login.php?o=1">Одјави се</a>';
               if($_SESSION['id_tipa_korisnika']==1){
                echo'<a href="odobravanjeOglasa.php">Одобри огласе</a>';
                echo'<a href="kontrolnatabla.php">Контролна табла</a>';
               }
            }else{
                echo'<a href="login.php">Пријави се</a>';
            }
            ?>    
            <a href="unosOglasa.php">Постави оглас</a>
            <a class="active" href="index.php">Почетна</a>
        </div>
                
        <div class="center">
        <div class="login-page">
            <div class="form">
            <h1>Регистрација</h1>
              <form class="login-form" method="post" action="/registration.php">

              <input type="text" id="Username" name="Username" placeholder="Корисничко име" required>
              <input type="text" id="Ime" name="Ime" placeholder="Име" required>
              <input type="text" id="Prezime" name="Prezime" placeholder="Презиме" required>
              <input type="email" id="email" name="email" placeholder="Ваша мејл адреса" required>
              <input type="password" id="Sifra" name="Sifra" placeholder="Лозинка" required>
              <input type="password" id="Sifra2" name="Sifra2" placeholder="Потврдите лозинку" required>
              <input type="text" id="mobilni" name="mobilni" placeholder="Контакт телефон" required>
              <label for="region">Регион:</label>
              <select id="region" name="region"  class="inputtabela" required>
                  <option value="Београд">Београд</option>
                  <option value="Централна Србија">Централна Србија</option>
                  <option value="Источна Србија">Источна Србија</option>
                  <option value="Јужна Србија">Јужна Србија</option>
                  <option value="Косово и Метохија">Косово и Метохија</option>
                  <option value="Војовидна">Војовидна</option>
                  <option value="Западна Србија">Западна Србија</option>
                </select>
                
                <button name="unoskorisnika">Региструј се</button>

                <p class="message"> Већ сте регистровани? <a href="login.php"> Пријави се. </a></p>


              </form>
            </div>
        </div> 
        </div>



    </body>
</html>