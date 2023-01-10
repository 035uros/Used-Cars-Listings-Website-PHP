<!DOCTYPE html>
<html>
<head>
<title>Претрага</title>
<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="style/login.css">
</head>
<body>

<div class="topnav">    
    <a href="login.php">Пријави се</a>
    <a href="unosOglasa.php">Постави оглас</a>
    <a href="index.php">Почетна</a>
</div>

<form action="/action_page.php" class="forma">
    
    <select name="marka" id="marka" >
        <option value="" disabled selected hidden>Марка</option>
        <option value="volvo">Volvo</option>
        <option value="saab">Saab</option>
        <option value="mercedes">Mercedes</option>
        <option value="audi">Audi</option>
    </select>


    <select name="model" id="model" >
        <option value="" disabled selected hidden>Модел</option>
        <option value="baza">baza</option>
    </select>

    <input type="text" id="cena" name="cena" placeholder="цена до">

    <select name="godisteod" id="godisteod" >
        <option value="" disabled selected hidden>Годише од</option>
        <option value="baza">baza</option>
    </select>

    <select name="godistedo" id="godistedo" >
        <option value="" disabled selected hidden>Годише до</option>
        <option value="baza">baza</option>
    </select>

    <select name="karoserija" id="karoserija" >
        <option value="" disabled selected hidden>Каросерија</option>
        <option value="baza">baza</option>
    </select>

    <select name="gorivo" id="gorivo" >
        <option value="" disabled selected hidden>Гориво</option>
        <option value="baza">baza</option>
    </select>

    <select name="region" id="region" >
        <option value="" disabled selected hidden>Регион</option>
        <option value="baza">baza</option>
    </select>


    <input type="submit" value="Претражи">
    </form>

    <div class="item-wrap">
        <div class="search">
            <div class="item">
            <img src="images/oglasi/oglastajitaj/slide1.jpg" alt="thumbnail" width="400px" style="float: left;"> 
            <div class="subtext">
                <h2 >Naslov oglasa</h2>
                <div>Годиште: 0000</div>
                <div>Километража: 0000</div>
                <div>Запремина мотора: 0000</div>
                <div>Годиште: 0000</div>
            </div>
            <div style="float: right; padding-left: 20px;">
                <h3>Цена: 0000</h3>
                <button style="position: absolute; right: 50px; width: 300px; bottom: 50px;">Погледај детаљније</button>
                </div>
            </div>
        </div>
    </div>
    <div class="item-wrap">
        <div class="search">
            <div class="item">
            <img src="images/oglasi/oglastajitaj/slide1.jpg" alt="thumbnail" width="400px" style="float: left;"> 
            <div class="subtext">
                <h2 >Naslov oglasa</h2>
                <div>Годиште: 0000</div>
                <div>Километража: 0000</div>
                <div>Запремина мотора: 0000</div>
                <div>Годиште: 0000</div>
            </div>
            <div style="float: right; padding-left: 20px;">
                <h3>Цена: 0000</h3>
                <button style="position: absolute; right: 50px; width: 300px; bottom: 50px;">Погледај детаљније</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <p>аутодетектив 2023. © Сва права задржана.</p>
</div>

</body>
</html>

