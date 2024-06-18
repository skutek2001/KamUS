<!DOCTYPE html>
<html>
<head>
    <title>Kamień Urodzinowy</title>
    <link rel="stylesheet" type="text/css" href="kamus-css.css">
    <meta charset="UTF-8">
</head>
<body id="ku-body">
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



    <header id="ku-header">
        <nav>
            <!-- Menu -->
            <a id="menu-icon" onclick="toggleMenu()">&#9776;</a>
            <a>
                <img src="/PZNU/KamUS/pics/logo-black.png" id="ku-logo" 
                onclick="location.href='Kamuś-SG.php'">
            </a>
        </nav>
    </header>



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



    <div class="ku-container" id="ku-container">
        <h1>Enter your birthday:</h1>
        <form id="birthday-form">
            <label for="month">Miesiąc:</label>
            <select id="month" name="month">
                <option value="01">Styczeń</option>
                <option value="02">Luty</option>
                <option value="03">Marzec</option>
                <option value="04">Kwiecień</option>
                <option value="05">Maj</option>
                <option value="06">Czerwiec</option>
                <option value="07">Lipiec</option>
                <option value="08">Sierpień</option>
                <option value="09">Wrzesień</option>
                <option value="10">Październik</option>
                <option value="11">Listopad</option>
                <option value="12">Grudzień</option>
            </select>
            <br>
            <label for="day">Dzień:</label>
            <input type="number" id="day" name="day" min="1" max="31">
            <br>
            <label for="year">Rok:</label>
            <input type="number" id="year" name="year" min="1900" max="2023">
            <br>
            <button type="button" onclick="showBirthday()">Submit</button>
        </form>
    </div>



    <div id="ku-content" style="display:none;">
        zawartość zwracanej daty
    </div>
</body>
</html>
<!--  style="display: none;" -->