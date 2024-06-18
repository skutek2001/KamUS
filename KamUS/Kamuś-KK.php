<!DOCTYPE html>
<html>
    <head>
        <title>KamUŚ</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="kamus-css.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    </head>
    <body>
        <!-- pop-up -->
        <div class="popup" id="popup">
            <div class="popup-content">
                <span class="close" onclick="closePopup()">&times;</span>
                <?php
                $dzien = date('z') % 12 - 1;
                $mysqli = new mysqli("localhost", "root", "", "kamus");
                $result = $mysqli->query("SELECT * FROM kamienie");
    
                For($i = 0; $i<(mysqli_num_rows($result));$i++){
                $wiersz = $result->fetch_assoc();
                if($i == $dzien)
                printf('<div class="container-item">'.$wiersz['Nazwa_Kamienia'].'<br>'.$wiersz['Znak_Zodiaku'].'<br>'.$wiersz['Opis'].'<br><img src="'. $wiersz['Nazwa_Kamienia'].'.png" width="200" height="200"></div>');
                }      
                ?>
            </div>
        </div>  
        
        <script src="script.js"></script>

        <!-- menu -->
        <div class="menu-container">
            <div class="menu">
                <ul>
                    <li><a href="Kamuś-SG.php">Strona główna</a></li>
                    <li><a onclick="openPopup()">Kamień dnia</a></li>
                    <li><a href="Kamuś-KU.php">Twój kamień urodzinowy</a></li>
                    <li><a href="Kamuś-KK.php">Kompedium kamieni</a></li>
                </ul>
              </div>
        </div>

        <!-- nagłówek -->
        <header id="kk-header">
            <nav>
                <a id="menu-icon" onclick="toggleMenu()">&#9776;</a>
                <a>
                    <img src="/PZNU/KamUS/pics/logo-black.png" id="kk-logo" 
                    onclick="location.href='Kamuś-SG.php'">
                </a>
                <a>
                    <div class="search-container">
                        <form method='POST'>
                        <input type="text" id="input" name="wyszukiwanie" required="">
                        <label for="input" class="label">Szukaj kamieni</label>
                        <input type="submit" hidden /></form>
                        <div class="underline"></div>
                    </div>
                </a>
                <a href="http://localhost/PZNU/KamUS/Kamuś-KK.php">
                    <div id="filtered"><img src="/PZNU/KamUS/pics/filtr_icon.png"></div>
                </a>
            </nav>
        </header>

        <!-- kontener -->
        <div class="content-container">
                <?php
                $mysqli = new mysqli("localhost", "root", "", "kamus");

                if(isset($_POST['wyszukiwanie'])){
                $result = $mysqli->query("SELECT * FROM kamienie WHERE Nazwa_Kamienia LIKE '%".$_POST['wyszukiwanie']."%'");
                }
                else{
                $result = $mysqli->query("SELECT * FROM kamienie");
                }
                #printf(mysqli_num_rows($result));
                For($i = 0; $i<(mysqli_num_rows($result));$i++){
                $wiersz = $result->fetch_assoc();
                printf('<div class="container-item">');
                printf(
                        '<div class="info" id="info'.$i.'"><h2>'.$wiersz['Nazwa_Kamienia'].'</h2>'.
                        '<img src="'.$wiersz['Nazwa_Kamienia'].'.png" onclick="closeEnlargedInfo('.$i.')" width="200" height="200">'.
                        '<p>'.$wiersz['Opis'].'</p><a href="#">Kup kamień</a><br>'.
                        '</div>'.
                        
                        '<br>'.$wiersz['Nazwa_Kamienia'].'<br><img src="'.$wiersz['Nazwa_Kamienia'].'.png" onclick="openEnlargeInfo('.$i.')">'
                );
                printf('</div>');
                }            
                ?>
        </div>
    </body>
</html>