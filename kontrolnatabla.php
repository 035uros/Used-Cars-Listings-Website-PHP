<?php
include 'baza_podataka.php';
session_start();
$conn = OpenCon();
$conn->query("SET NAMES 'utf8'");
if($_SESSION['id_tipa_korisnika'] == 2){
  header('location: index.php');
}
if(isset($_POST["unoskorisnika"])){
  $user          = $_POST['username'];
  $ime           = $_POST['ime'];
  $prezime       = $_POST['prezime'];
  $email         = $_POST['email'];
  $sifra1         = $_POST['pass'];
  $telefon         = strval($_POST['mobilni']);
  if(isset($_POST['region'])){
      $region         = $_POST['region'];
  }
  if(isset($_POST['status'])){
    $status         = $_POST['status'];
}

  $sql = "INSERT INTO `korisnik` (`ime`, `prezime`, `id_tipa_korisnika`, `email`,`username`, `sifra`, `kontaktTelefon`, `region`) VALUES ('$ime', '$prezime', $status, '$email','$user', '$sifra1', '$telefon', '$region');";
  if($conn->query($sql)){
      echo '<script>alert("Унос успешан.")</script>';
  }
  else{
      echo '<script>alert("Грешка при уносу, проверите унете податке.")</script>';
  }
}
if(isset($_GET["brisi"])){
  $sql = "DELETE FROM korisnik WHERE id_korisnika=".$_GET["id"];
  if($conn->query($sql)){
    echo '<script>alert("Брисање успешно.")</script>';
}
else{
    echo '<script>alert("Грешка")</script>';
}
}

if(isset($_POST["azuriranjekorisnika"])){

  $id          = $_POST['azuriranjekorisnika'];
  $user          = $_POST['username'];
  $ime           = $_POST['ime'];
  $prezime       = $_POST['prezime'];
  $email         = $_POST['email'];
  $sifra1         = $_POST['pass'];
  $telefon         = strval($_POST['mobilni']);
  if(isset($_POST['region'])){
      $region         = $_POST['region'];
  }
  if(isset($_POST['status'])){
    $status         = $_POST['status'];
}

  $sql = "UPDATE `korisnik` SET `ime` = '$ime', `prezime` = '$prezime', `id_tipa_korisnika` = '$status', `email` = '$email', `username` = '$user', `sifra` = '$sifra1', `kontaktTelefon` = '$telefon', `region` = '$region' WHERE `korisnik`.`id_korisnika` ='$id';";
  if($conn->query($sql)){
      echo '<script>alert("Ажурирање успешно.")</script>';
  }
  else{
      echo '<script>alert("Грешка при уносу, проверите унете податке.")</script>';
  }
}

CloseCon($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/admin.css">
    <title>Корисници</title>
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

<h1>Преглед корисника</h1>
<table>
  <tr>
    <th>Име</th>
    <th>Презиме</th>
    <th>Корисничко име</th>
    <th>Шифра</th>
    <th>Контакт телефон</th>
    <th>E-mail</th>
    <th>Регион</th>
    <th>Статус корисника</th>
    <th>Akcije</th>
  </tr>
    <?php 
    $conn = OpenCon();
    $conn->query("SET NAMES 'utf8'");
    $sql = "SELECT * FROM korisnik";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($red = $result->fetch_assoc()) {
          echo '<form method="post" action="/kontrolnatabla.php"><tr>'.
          '<input type="hidden" id="id" name="id" value="'.$red["id_korisnika"].'">'.
          '<td><input type="text" id="ime" name="ime" value="'.$red["ime"].'"></td>'.
          '<td><input type="text" id="Prezime" name="prezime" value="'.$red["prezime"].'"></td>'.
          '<td><input type="text" id="username" name="username" value="'.$red["username"].'"></td>'.
          '<td><input type="password" id="password" name="pass" value="'.$red["sifra"].'"></td>'.
          '<td><input type="text" id="mobilni" name="mobilni" value="'.$red["kontaktTelefon"].'"></td>'.
          '<td><input type="text" id="email" name="email" value="'.$red["email"].'"></td>'.
          '<td><select name="region" id="region" >';
          $regioni = array("Београд", "Централна Србија", "Источна Србија", "Јужна Србија", "Источна Србија", "Косово и Метохија", "Војводина","Западна Србија");
          foreach($regioni as $reg){
              if($reg == $red["region"]){
                  echo '<option value="'.$reg.'" selected>'.$reg.'</option>';
              }
              else{
                  echo '<option value="'.$reg.'">'.$reg.'</option>';
              }
          }
          echo '</select></td>'.
          '<td><select name="status" id="status" >';
          if($red["id_tipa_korisnika"] == 2){
            echo '<option value="2" selected>Корисник</option>'.
            '<option value="1">Администратор</option>';
          }
          else{
            echo '<option value="2">Корисник</option>'.
            '<option value="1" selected>Администратор</option>';
          }
          
          echo
          '</select></td>'.
          '<td>'.
          '<button name="azuriranjekorisnika" value="'.$red["id_korisnika"].'" class="update-button">Уреди</button>'.
          '<button  onclick="location.href=\'kontrolnatabla.php?brisi=1&id='.$red["id_korisnika"].'\'" class="delete-button">Обриши</button>'.
          '</td></tr></form>';
        }
      }
    ?>
 
  <form method="post" action="/kontrolnatabla.php">
  <tr>
    <td><input type="text" id="ime" name="ime" placeholder="Име"></td>
    <td><input type="text" id="prezime" name="prezime" placeholder="Презиме"></td>
    <td><input type="text" id="username" name="username" placeholder="Корисничко име"></td>
    <td><input type="password" id="pass" name="pass" placeholder="Лозинка"></td>
    <td><input type="text" id="mobilni" name="mobilni" placeholder="контакт телефон"></td>
    <td><input type="text" id="email" name="email" placeholder="E-mail"></td>
    <td><select name="region" id="region" >
        <option value="" disabled selected hidden>Регион</option>
        <option value="Београд">Београд</option>
        <option value="Централна Србија">Централна Србија</option>
        <option value="Источна Србија">Источна Србија</option>
        <option value="Јужна Србија">Јужна Србија</option>
        <option value="Косово и Метохија">Косово и Метохија</option>
        <option value="Војводина">Војовидна</option>
        <option value="Западна Србија">Западна Србија</option>
    </select></td>
    <td><select name="status" id="status" >
    <option value="" disabled selected hidden>Тип корисника</option>
        <option value="1">Администратор</option>
        <option value="2">Корисник</option>
    </select></td>
    <td>

      <button class="add-button" name="unoskorisnika">Унеси корисника</button> 

    </td>
  </tr>
    </form>
</table>
<?php

?>
</body>
</html>