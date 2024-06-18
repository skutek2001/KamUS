<!DOCTYPE html>
<html>
    <head>
        <title>KamUŚ</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="kamus-css.css">
    </head>
    <body id="ss-body">
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
        
        <div id="ss-logo-kontener">
            <img src="/PZNU/KamUS/pics/logo-black.png" id="ss-logo">
        </div>
        
        <header id="ss-header">
            <nav>
                <!-- Menu -->
                <a id="menu-icon" onclick="toggleMenu()">&#9776;</a>
                
                <!-- Dark mode -->
                <div class="toggle-switch" id="dark-mode">
                    <label class="switch-label">
                        <input type="checkbox" class="checkbox" id="dark-mode-toggle">
                        <span class="slider"></span>
                    </label>
                </div> 
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
        <div id="ss-kontent">
            <div>
                <h3>
                    Strona projektowa <b>KamUŚ</b> powstała w celu, aby umożliwić osobą zainteresowanym odkrywać infromacje o kamieniach,
                    gdzie je kupić, oraz aby dowiedzieć się więcej o ich zastosowaniach w przemyśle i jubilerstwie. 
                    <br><br>Strona ta, to tylko mock-up tego jak powinna wyglądać strona tego rodzaju. Powinna być dostosowana do potrzeb wielu użytowkników oraz powinna być prosta, czytelna i intuicyjna.
                </h3>
            </div>
            <div id="authors">
                <h2>
                    Stronę wykonali: Mikołaj Biczak<br>Krystian Skutek<br>Grupa IO3
                </h2>
            </div>
        </div>
    </body>
</html>