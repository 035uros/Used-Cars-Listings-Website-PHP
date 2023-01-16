<?php
include 'baza_podataka.php';
session_start();

if($_SESSION['potvrdjenpristup'] == false){
    header( 'location: /login.php?nijeprijavljen=true' );
}

$conn = OpenCon();

?>
<!DOCTYPE html>
<html>
<head>
<title>Постави оглас</title>
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
            <a class="active"href="unosOglasa.php">Постави оглас</a>
            <a  href="index.php">Почетна</a>
        </div>


<div>
    <h1 class="naslov">Постављање огласа</h1>

    <form class="formaUnosOglasa" action = "upload.php" method="post" enctype="multipart/form-data"> 
    <label for="marka">Марка:</label>
        <select name="marka" id="marka" required>
            <option value="" disabled selected hidden>Марка</option>
            <?php
            $conn->query("SET NAMES 'utf8'");
            $sql = "SELECT * FROM marka";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    if($_GET['broj'] == $red["id_marke"]){
                        echo'<option onclick="location.href=\'unosOglasa.php?broj='.$red["id_marke"].'\'" value="'.$red["id_marke"].'" selected>'.$red["naziv"].'</option>';
                    }else{
                        echo'<option onclick="location.href=\'unosOglasa.php?broj='.$red["id_marke"].'\'" value="'.$red["id_marke"].'">'.$red["naziv"].'</option>';
                    }
                }
            }
            ?>
        </select>

        <label for="model">Модел:</label>
        <select name="model" id="model" required>
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
                        echo'<option value="'.$red["id_model"].'">'.$red["naziv"].'</option>';
                    }
                }
            }
            ?>
        </select>

        <label for="naslov">Наслов огласа</label>
        <input type="text" id="naslov" name="naslov" placeholder="Наслов" required>

        <p for="files">Увези слике:</p>

        <div class="image-upload">
                <label for="file-input">
                    <img style="margin-left:auto; margin-right:auto; width:50%" src="https://icons.iconarchive.com/icons/paomedia/small-n-flat/512/cloud-up-icon.png"/>
                </label>
                <input id="file-input" type="file" name="file[]" multiple required>
            </div>

        

        <h2>Основне информације</h2>
        <label for="godiste">Година производње:</label>
        <select name="godiste" id="godiste" required>
        <option value="" disabled selected hidden>Годиште</option>
        <?php
            for($i=date("Y"); $i>1960; $i--) {
                echo'<option value="'.$i.'">'.$i.'</option>';
            } 
        ?>
        </select>

        <label for="karoserija">Каросерија:</label>
        <select name="karoserija" id="karoserija" required>
            <option value="" disabled selected hidden>Каросерија</option>
            <?php
            $conn->query("SET NAMES 'utf8'");
            $sql = "SELECT * FROM karoserija";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    echo'<option value="'.$red["id_karoserije"].'">'.$red["naziv"].'</option>';
                }
            }
        ?>
        </select>

        <label for="tip">Тип возила:</label>
        <select name="tip" id="tip" required>
            <option value="" disabled selected hidden>Тип</option>
            <?php
            $conn->query("SET NAMES 'utf8'");
            $sql = "SELECT * FROM tip_vozila";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    echo'<option value="'.$red["id_tipa_vozila"].'">'.$red["naziv"].'</option>';
                }
            }
            ?>
        </select>

        <label for="gorivo">Гориво:</label>
        <select name="gorivo" id="gorivo" required>
            <option value="" disabled selected hidden>Гориво</option>
            <?php
            $conn->query("SET NAMES 'utf8'");
            $sql = "SELECT * FROM gorivo";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    echo'<option value="'.$red["id_goriva"].'">'.$red["naziv"].'</option>';
                }
            }
            ?>
        </select>

        
        <h2>Додатне информације</h2>
        <label for="vin">Број шасије:</label>
        <input type="text" id="vin" name="vin" placeholder="VIN" required>

        <label for="kubikaza">Кубикажа(cm3):</label>
        <input type="text" id="kubikaza" name="kubikaza" placeholder="Запремина мотора" required>

        <label for="snaga">Снага(KS):</label>
        <input type="text" id="snaga" name="snaga" placeholder="Снага мотора" required>

        <label for="km">Километража:</label>
        <input type="text" id="km" name="km" placeholder="180000" >

        <select name="registrovan" id="registrovan" required>
            <option value="" disabled selected hidden>Регистрован до</option>
            <option value="nijeReg">Није регистрован</option>
            <?php
                $start = new DateTime;
                $start->setDate($start->format('Y'), $start->format('n'), 1); // Normalize the day to 1
                $start->setTime(0, 0, 0); // Normalize time to midnight
                $start->sub(new DateInterval('P1M'));
                $interval = new DateInterval('P1M');
                $recurrences = 13;
                
                foreach (new DatePeriod($start, $interval, $recurrences, true) as $date) {
                    echo '<option value="'.$date->format('m, Y').'">'.$date->format('m, Y').'</option>'; 
                }
            ?>
        </select>

        <select name="pogon" id="pogon" required>
            <option value="" disabled selected hidden>Погон</option>
            <?php
            $conn->query("SET NAMES 'utf8'");
            $sql = "SELECT * FROM pogon";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    echo'<option value="'.$red["id_pogona"].'">'.$red["naziv"].'</option>';
                }
            }
            
            ?>
        </select>

        <select name="vrata" id="vrata" required>
            <option value="" disabled selected hidden>Број врата</option>
            <?php
            $conn->query("SET NAMES 'utf8'");
            $sql = "SELECT * FROM broj_vrata";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    echo'<option value="'.$red["id_broja_vrata"].'">'.$red["broj"].'</option>';
                }
            }
            
            ?>
        </select>

        <select name="menjac" id="menjac" required>
            <option value="" disabled selected hidden>Мењач</option>
            <?php
            $conn->query("SET NAMES 'utf8'");
            $sql = "SELECT * FROM menjac";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    echo'<option value="'.$red["id_menjaca"].'">'.$red["naziv"].'</option>';
                }
            }
            CloseCon($conn);
            ?>
        </select>

        <select name="brojSedista" id="brojSedista" >
        <option value="" disabled selected hidden>Број седишта</option>
        <option value="2">2</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="7">7</option>
    </select>


        <h2>Цена</h2>
        <label for="cena">Цена:</label>
        <input type="text" id="cena" name="cena" placeholder="Цена €" required>



        <input type="checkbox" id="fiks" value="true" name="fiks">
        <label for="fiks">Фиксна цена</label>
        
        <input type="checkbox" id="zamena" value="true" name="zamena">
        <label for="zamena">Замена</label>

        <br><br>
        <label for="opis">Опис:</label>
        <textarea id="opis" name="opis" rows="4" cols="50"></textarea>

        <input type="submit" name="unosvozila" value="Унеси">
    </form>
</div>


</body>
</html>
