<!DOCTYPE html>
<html>
    <head>

        <title>Регистрација</title>

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
            <h1>Регистрација</h1>
              <form class="login-form" method="post" action="/reg.php">

              <input type="text" id="Username" name="Username" placeholder="Корисничко име">
              <input type="text" id="Ime" name="Ime" placeholder="Име">
              <input type="text" id="Prezime" name="Prezime" placeholder="Презиме">
              <input type="email" id="email" name="email" placeholder="Ваша мејл адреса">
              <input type="password" id="Sifra" name="Sifra" placeholder="Лозинка">
              <input type="password" id="Sifra2" name="Sifra2" placeholder="Потврдите лозинку">
              <select id="Region" name="Region"  class="inputtabela">
                  <option value="" disabled selected hidden>Регион</option>
                  <option value="baza">База</option>
                </select>
                
                <!--<button name="unoskorisnika">Podnesi zahvtev</button>-->
                <input type="submit" value="Региструј се">

                <p class="message"> Већ сте регистровани? <a href="login.php"> Пријави се. </a></p>

              </form>
            </div>
        </div> 
        </div>

        <div class="footer">
            <p>аутодетектив 2023. © Сва права задржана.</p>
        </div>

    </body>
</html>