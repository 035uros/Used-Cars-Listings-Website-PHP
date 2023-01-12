<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include 'baza_podataka.php';
session_start();
$conn = OpenCon();
$conn->query("SET NAMES 'utf8'");

if(isset($_GET['odobri'])){
    $broj_oglasa=$_GET['broj'];
    $sql = "UPDATE `oglas` SET `status_oglasa` = '1' WHERE `oglas`.`broj_oglasa` =".$broj_oglasa; 
    $result = $conn->query($sql);
    echo '<script>alert("Оглас одобрен.")</script>';
}

if(isset($_GET['obrisi'])){
    $broj_oglasa=$_GET['broj'];
    $sql = "DELETE FROM `oglas` WHERE `oglas`.`broj_oglasa` =".$broj_oglasa; 
    $result = $conn->query($sql);
    echo '<script>alert("Оглас обрисан.")</script>';
}


$sqlGlavni = "SELECT * FROM (oglas join automobil on oglas.vin_automobila=automobil.VIN) join korisnik on korisnik.id_korisnika = oglas.id_korisnika WHERE status_oglasa=0 ";



?><!DOCTYPE html>

<html>
<head>
<title>Контролна табла</title>
<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="style/login.css">
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



    <?php
            $result = $conn->query($sqlGlavni);
            if ($result->num_rows > 0) {
                while($red = $result->fetch_assoc()) {
                    $naslov = $red["naslov"];
                    $godiste = $red["godina_proizvodnje"];
                    $kilometraza = $red["kilometraza"];
                    $kubikaza = $red["zapremina"];
                    $snaga = $red["snaga"];
                    $cena = $red["cena"];
                    $slike = explode(";",$red['slike']);
                    $broj_oglasa = $red["broj_oglasa"];


                    echo '<div class="item-wrap">'.
                    '<div class="search">'.
                    '<div class="item">'.
                    '<img src="'.$slike[0].'" alt="thumbnail" width="400px" style="float: left; object-fit: cover;">'.
                    '<div class="subtext">'.
                    '<h2 >'.$naslov.'</h2>'.
                    '<div>Годиште: '.$godiste.'</div>'.
                    '<div>Километража: '.$kilometraza.' km</div>'.
                    '<div>Запремина мотора: '.$kubikaza.' cm3</div>'.
                    '<div>Снага мотора: '.$snaga.' ks</div>'.
                    '</div>'.
                    '<div style="float: right; padding-left: 20px;">'.
                    '<h3>Цена: '.$cena.' €</h3>'.
                    '<button onclick="location.href=\'oglas.php?broj='.$broj_oglasa.'\'" style="position: absolute; right: 50px; width: 300px; bottom: 50px;">Погледај детаљније</button>'.
                    '<button onclick="location.href=\'odobravanjeOglasa.php?obrisi=1&broj='.$broj_oglasa.'\'" class="obrisi" style="position: absolute; right: 50px; width: 300px; bottom: 100px; ">Обриши</button>'.
                    '<button onclick="location.href=\'odobravanjeOglasa.php?odobri=1&broj='.$broj_oglasa.'\'" class="odobri" style="position: absolute; right: 50px; width: 300px; bottom: 150px;">Одобри</button>'.
                    '</div>'.
                    '</div>'.
                    '</div>'.
                    '</div>';
                    
                }
        
        
            }
            else{
                echo '<h1>Тренутно нема огласа за одобравање.</h1>';
            }
            CloseCon($conn);
    ?>
    
</div>

</body>
</html>

