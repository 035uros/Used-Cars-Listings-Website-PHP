<?php
include 'baza_podataka.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>АутоДетектив</title>
<link rel="stylesheet" href="style/style.css">
</head>
<body>

<div class="topnav">
    <?php if($_SESSION['potvrdjenpristup'] == true)
    {
       echo'<a href="login.php?o=1">Одјави се</a>';
    }else{
        echo'<a href="login.php">Пријави се</a>';
    }
    ?>    
    <a href="unosOglasa.php">Постави оглас</a>
    <a class="active" href="index.php">Почетна</a>
</div>

<img src="images/banner/supra.jpg" class="banner" alt="Toyota Supra">

<form action="/action_page.php" class="forma">
    
    <select name="marka" id="marka" required>
        <option onclick="location.href='index.php?broj='" value="" disabled selected hidden>Марка</option>
        <?php
            $conn = OpenCon();
            $conn->query("SET NAMES 'utf8'");
            $sql = "SELECT * FROM marka";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    if($_GET['broj'] == $red["id_marke"]){
                        echo'<option onclick="location.href=\'index.php?broj='.$red["id_marke"].'\'" value="'.$red["naziv"].'" selected>'.$red["naziv"].'</option>';
                    }else{
                        echo'<option onclick="location.href=\'index.php?broj='.$red["id_marke"].'\'" value="'.$red["naziv"].'">'.$red["naziv"].'</option>';
                    }
                }
            }
        ?>
    </select>


    <select name="model" id="model" >
        <option value="" disabled selected hidden>Модел</option>
        <?php
        if(isset($_GET['broj'])){
            $id_marke=$_GET['broj'];
            $conn = OpenCon();
            $conn->query("SET NAMES 'utf8'");
            $sql = "SELECT * FROM model WHERE id_marka =".$id_marke."";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    echo'<option value="'.$red["naziv"].'">'.$red["naziv"].'</option>';
                }
            }
        }
        ?>
    </select>

    <input type="text" id="cena" name="cena" placeholder="цена до">

    <select name="godisteod" id="godisteod" >
        <option value="" disabled selected hidden>Годише од</option>
        <?php
        for($i=date("Y"); $i>1960; $i--) {
            echo'<option value="'.$i.'">'.$i.'</option>';
            } 
        ?>
    </select>

    <select name="godistedo" id="godistedo" >
        <option value="" disabled selected hidden>Годише до</option>
        <?php
        for($i=date("Y"); $i>1960; $i--) {
            echo'<option value="'.$i.'">'.$i.'</option>';
            } 
        ?>
    </select>

    <select name="karoserija" id="karoserija" >
        <option value="" disabled selected hidden>Каросерија</option>
        <?php
            $conn->query("SET NAMES 'utf8'");
            $sql = "SELECT * FROM karoserija";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    echo'<option value="'.$red["naziv"].'">'.$red["naziv"].'</option>';
                }
            }
        ?>
    </select>

    <select name="gorivo" id="gorivo" >
        <option value="" disabled selected hidden>Гориво</option>
        <?php
            $conn->query("SET NAMES 'utf8'");
            $sql = "SELECT * FROM gorivo";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    echo'<option value="'.$red["naziv"].'">'.$red["naziv"].'</option>';
                }
            }
            CloseCon($conn);
        ?>
    </select>

    <select name="region" id="region" >
        <option value="" disabled selected hidden>Регион</option>
        <option value="Београд">Београд</option>
        <option value="Централна Србија">Централна Србија</option>
        <option value="Источна Србија">Источна Србија</option>
        <option value="Јужна Србија">Јужна Србија</option>
        <option value="Косово и Метохија">Косово и Метохија</option>
        <option value="Војовидна">Војовидна</option>
        <option value="Западна Србија">Западна Србија</option>
    </select>


    <input type="submit" value="Претражи">
</form>

<div class="footer">
    <p>аутодетектив 2023. © Сва права задржана.</p>
</div>

</body>
</html>

