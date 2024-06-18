//MENU
var menuIsOpen = false;

function toggleMenu() {
    var menu = document.querySelector('.menu');
    var menuIcon = document.getElementById('menu-icon');
    if (!menuIsOpen) {
        menu.style.left = '0px'; // Wysuń menu
        menuIcon.style.display = 'none'; // Schowaj ikone menu
        menuIsOpen = true; // Ustaw stan menu na otwarty
        document.addEventListener('click', closeMenuOutsideClick); // Dodaj nasłuchiwanie na zdarzenia kliknięcia na stronie
    } else {
        menu.style.left = '-250px'; // Schowaj menu
        menuIcon.style.display = 'block'; // Pokaż ikone menu
        menuIsOpen = false; // Ustaw stan menu na zamknięty
        document.removeEventListener('click', closeMenuOutsideClick); // Usuń nasłuchiwanie zdarzenia kliknięcia na stronie
    }
}

function closeMenuOutsideClick(event) {
    var menu = document.querySelector('.menu');
    var menuIcon = document.getElementById('menu-icon');
    var clickedElement = event.target;

    if (!menu.contains(clickedElement) && event.target !== menuIcon) {
        menu.style.left = '-250px'; // Schowaj menu
        menuIcon.style.display = 'block'; // Pokaż ikonę menu
        menuIsOpen = false; // Ustaw stan menu na zamknięty
        document.removeEventListener('click', closeMenuOutsideClick); // Usuń nasłuchiwanie zdarzenia kliknięcia na stronie
    }
}



//POP-UP
var popup = document.getElementById('popup');

function openPopup() {
    popup.classList.add("open-popup");
}

function closePopup() {
    popup.classList.remove("open-popup");
}



// LOGO
window.addEventListener('scroll', function() {
    var scrollPosition = window.scrollY;
    var body = document.getElementById('ss-body');
    var logo = document.getElementById('ss-logo');
    
    // Obliczamy stopień zmniejszenia przeźroczystości w zależności od przewinięcia strony
    var opacity = 1 - (scrollPosition / window.innerHeight * 3);
    
    // Ustawiamy nową wartość opacity dla logo
    logo.style.opacity = opacity < 0 ? 0 : opacity;

    // Dodajemy klasę 'scrolled' do body, jeśli użytkownik przewinął stronę w dół, usuwamy w przeciwnym razie
    if (scrollPosition > 0) {
        body.classList.add('scrolled');
    } else {
        body.classList.remove('scrolled');
    }
});

window.addEventListener('load', function() {
    var logo = document.getElementById('ss-logo-kontener');
    logo.style.opacity = 1;
});



// DARK MODE
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("dark-mode-toggle").addEventListener("change", function() {
        //Strona główna
        var logo = document.getElementById("ss-logo");
        var ss_kontent = document.getElementById("ss-kontent");
        var ss_body = document.getElementById("ss-body");
        var menu_icon = document.getElementById("menu-icon");
        var menu_icon = document.getElementById("menu-icon");



        //Kamień urodzinowy
        var ku_container = document.getElementById("ku-container");
        var ku_content = document.getElementById("ku-content");

        if (this.checked) {
            //Strona główna
            logo.src = "/PZNU/KamUS/pics/logo-white.png";
            ss_kontent.style.transition = "color 1s";
            ss_kontent.style.color = "whitesmoke";
            ss_body.style.transition = "background-color 1s";
            ss_body.style.backgroundColor = "#1F1F1F";
            menu_icon.style.transition = "color 1s";
            menu_icon.style.color = "whitesmoke";

            //Kamień urodzinowy
            ku_container.style.backgroundColor = "#2F2F2F";
            ku_content.style.color = "whitesmoke";
        } 
        else {
            //Strona główna
            logo.src = "/PZNU/KamUS/pics/logo-black.png";
            ss_kontent.style.transition = "color 1s";
            ss_kontent.style.color = "#1F1F1F";
            ss_body.style.transition = "background-color 1s";
            ss_body.style.backgroundColor = "whitesmoke";
            menu_icon.style.transition = "color 1s";
            menu_icon.style.color = "#1F1F1F";

            //Kamień urodzinowy
            ku_container.style.backgroundColor = "#fff";
            ku_content.style.color = "#1F1F1F";
        }
    });
});



//ENLARGE ROCK INFO
function openEnlargeInfo(id) {
    var enlargedContainer = $("#info" + id);
    enlargedContainer.fadeIn(400);
}

function closeEnlargedInfo(id) {
    var enlargedContainer = $("#info" + id);
    enlargedContainer.fadeOut(400);
}



//Kamień Urodzinowy
function showBirthday() {
    // Pobierz wartości wprowadzone przez użytkownika
    var month = document.getElementById("month").value;
    var day = document.getElementById("day").value;
    var year = document.getElementById("year").value;

    // Utwórz datę
    var birthday = new Date(year, month - 1, day);

    // Tablice z nazwami dni i miesięcy w języku polskim
    var polishDays = ["Niedziela", "Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota"];
    var polishMonths = ["Stycznia", "Lutego", "Marca", "Kwietnia", "Maja", "Czerwca", "Lipca", "Sierpnia", "Września", "Października", "Listopada", "Grudnia"];

    // Wyświetl datę w elemencie ku-content
    var contentDiv = document.getElementById("ku-content");
    contentDiv.innerHTML = "Twoja data urodzenia to: " + polishDays[birthday.getDay()] + " " + day + " " + polishMonths[birthday.getMonth()] + " " + year;

    // Wyświetl zawartość diva
    contentDiv.style.display = "block";
}