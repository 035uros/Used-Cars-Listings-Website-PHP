<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
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
<img src="images/banner/supra.jpg" class="banner" alt="Toyota Supra">
<form action="/pretraga.php?submit=1" class="forma" method="post">
    
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
                        echo'<option onclick="location.href=\'index.php?broj='.$red["id_marke"].'\'" value="'.$red["id_marke"].'" selected>'.$red["naziv"].'</option>';
                    }else{
                        echo'<option onclick="location.href=\'index.php?broj='.$red["id_marke"].'\'" value="'.$red["id_marke"].'">'.$red["naziv"].'</option>';
                    }
                }
            }
        ?>
    </select>
    <select name="model" id="model" >
        <option value="NULL" disabled selected hidden>Модел</option>
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
    <input type="text" id="cena" name="cena" placeholder="цена до">
    <select name="godisteod" id="godisteod" >
        <option value="1950" disabled selected hidden>Годиште од</option>
        <?php
        for($i=date("Y"); $i>1960; $i--) {
            echo'<option value="'.$i.'">'.$i.'</option>';
            } 
        ?>
    </select>
    <select name="godistedo" id="godistedo" >
        <option value="2024" disabled selected hidden>Годиште до</option>
        <?php
        for($i=date("Y"); $i>1960; $i--) {
            echo'<option value="'.$i.'">'.$i.'</option>';
            } 
        ?>
    </select>
    <select name="karoserija" id="karoserija" >
        <option value="NULL" disabled selected hidden>Каросерија</option>
        <?php
            if(isset($_GET['kar'])){
                $karoserija=$_GET['kar'];
            }
            $conn->query("SET NAMES 'utf8'");
            $sql = "SELECT * FROM karoserija";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    if($karoserija == $red["id_karoserije"]){
                        echo'<option value="'.$red["id_karoserije"].'" selected>'.$red["naziv"].'</option>';
                    }
                    else{
                        echo'<option value="'.$red["id_karoserije"].'" >'.$red["naziv"].'</option>';
                    }
                }
            }
        ?>
    </select>
    <select name="gorivo" id="gorivo" >
        <option value="NULL" disabled selected hidden>Гориво</option>
        <?php
            if(isset($_GET['gor'])){
                $gorivo=$_GET['gor'];
            }
            $conn->query("SET NAMES 'utf8'");
            $sql = "SELECT * FROM gorivo";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    if($gorivo == $red["id_goriva"]){
                        echo'<option value="'.$red["id_goriva"].'" selected>'.$red["naziv"].'</option>';
                    }
                    else{
                        echo'<option value="'.$red["id_goriva"].'">'.$red["naziv"].'</option>';
                    }
                }
            }
        ?>
    </select>

    <select name="region" id="region" >
        <option value="a" disabled selected hidden>Регион</option>
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
<div class="formamala">
    <select name="pretraga" id="pretraga" >
    <option value="0" disabled selected hidden>Моје претраге</option>
    <?php
        $conn->query("SET NAMES 'utf8'");
        $sql = "SELECT * FROM pretraga WHERE id_korisnika=".$_SESSION['korisnik'];
        $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    if($id_pretrage == $red["id_pretrage"]){
                        echo'<option value="'.$red["id_pretrage"].'" selected>'.$red["naziv"].'</option>';
                    }
                    else{
                        echo'<option value="'.$red["id_pretrage"].'">'.$red["naziv"].'</option>';
                    }
                }
            }
            CloseCon($conn);
    ?>
    </select>
    <button onclick="pretraga()">Очитај</button>
    <input type="text" id="unesiPretragu" name="unesiPretragu" placeholder="Унеси име претраге" >
    
    <?php echo '<input type="hidden"  id="idKorisnika" name="idKorisnika" value="'.$_SESSION['korisnik'].'">';?>
    
    <button onclick="cuvanje()">Сачувај претрагу</button>
    </div>
    <script>
        function cuvanje() {
            var ma = document.getElementById("marka").value;
            var mo = document.getElementById("model").value;
            var c = document.getElementById("cena").value;
            var go = document.getElementById("godisteod").value;
            var gd = document.getElementById("godistedo").value;
            var k = document.getElementById("karoserija").value;
            var g = document.getElementById("gorivo").value;
            var r = document.getElementById("region").value;
            var n = document.getElementById("unesiPretragu").value;
            var id = document.getElementById("idKorisnika").value;
            var str = "save.php?id="+id+'&marka='+ma+'&model='+mo+'&gorivo='+g+'&godisteod='+go+'&godistedo='+gd+'&karoserija='+k+'&cenado='+c+'&nazivpretrage='+n+'&region='+r;
            window.open(str); 
            }
        function pretraga() {
            var id = document.getElementById("pretraga").value;
            var str = "pretraga.php?idpret="+id;
            window.open(str);
            window.close(); 
            }
    </script>
</body>
</html>
