<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Додавање корисника</title>
</head>
<body>


<div class="topnav">    
    <a href="login.php">Одјави се</a>
    <a href="kontrolnatablaoglas.php">Огласи</a>
    <a href="kontrolnatabla.php" class="active">Корисници</a>
</div>



<div class="center" style="padding-top:1.5rem" >
        <div class="login-page">
          <div class="form">
              <h1 style="padding-left:0">Додај Корисника</h1>
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
                <input type="submit" value="Додај">

               

              </form>
            </div>
        </div> 
        </div>

    
</body>
</html>