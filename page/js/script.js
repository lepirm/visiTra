let navbar = document.querySelector('.navbar')

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    loginForm.classList.remove('active');
    searchForm.classList.remove('active');
}

let loginForm = document.querySelector('.login-form')

document.querySelector('#login-btn').onclick = () =>{
    loginForm.classList.toggle('active');
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
}

let searchForm = document.querySelector('.search-form')

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
    navbar.classList.remove('active');
    loginForm.classList.remove('active');
}

window.onscroll = () =>{
    navbar.classList.remove('active');
    loginForm.classList.remove('active');
    searchForm.classList.remove('active');
}

let themeBtn = document.querySelector('#theme-btn');

themeBtn.onclick = () =>{
    themeBtn.classList.toggle('fa-sun');

    if(themeBtn.classList.contains('fa-sun')){
        document.body.classList.add('active');
    }else{
        document.body.classList.remove('active');
    }

};

var swiper = new Swiper(".review-slider",{
    loop:true,
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
        delay: 10000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
    },
    


});
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 40.7128, lng: -74.0060}, // Koordinate za centar mape
      zoom: 12 // Početni zum nivo
    });
  }
  //ocjene 
  let selectedStars = 0;
let tempSelectedStars = 0; // Dodali smo varijablu za privremeno pohranjivanje zvjezdica


function openRatingModal() {
    document.getElementById("ratingModal").style.display = "block";
    tempSelectedStars = selectedStars; // Pohrani trenutno označene zvjezdice u privremenu varijablu
    updateStars(); // Ažuriraj prikaz zvjezdica
}

function closeRatingModal() {
    document.getElementById("ratingModal").style.display = "none";
    document.getElementById("stars").innerHTML = ""; // Resetiraj zvjezdice
    document.getElementById("comment").value = ""; // Resetiraj komentar
    selectedStars = tempSelectedStars; // Ako se modal zatvori bez potvrde, vrati označene zvjezdice iz privremene varijable
    updateStars(); // Ažuriraj prikaz zvjezdica
    tempSelectedStars = 0; // Resetiraj privremene zvjezdice
}

function rate(starIndex) {
    selectedStars = starIndex;
    updateStars();
}

function updateStars() {
    const starsContainer = document.getElementById("stars");
    starsContainer.innerHTML = "";

    for (let i = 1; i <= 5; i++) {
        const star = document.createElement("img");
        star.src = i <= selectedStars ? "images/star-filled-yellow.png" : "images/star-outline.png";
        star.classList.add("star");
        star.dataset.index = i;
        star.onclick = function() { rate(i); };
        starsContainer.appendChild(star);
    }

    document.getElementById("submitBtn").disabled = selectedStars === 0;
}

function submitRating() {
    const comment = document.getElementById("comment").value;
    // Ovdje možete poslati ocjenu i komentar na server
    console.log("Ocjena:", selectedStars);
    console.log("Komentar:", comment);
    closeRatingModal(); // Zatvori modal nakon što se ocjena pošalje
}

document.addEventListener("DOMContentLoaded", function() {
    updateStars(); // Inicijalno postavi zvjezdice
});
let map;

async function initMap() {
  const { Map } = await google.maps.importLibrary("maps");

  map = new Map(document.getElementById("map"), {
    center: { lat: 44.225952, lng: 17.650975 },
    zoom: 15,
  });
}

initMap();
function openModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";

    // Initialize FullCalendar
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: ''
        },
        selectable: true,
        selectHelper: true,
        select: function(start, end, jsEvent, view) {
            $('.fc-day').removeClass('selected-day');
            $(jsEvent.target).addClass('selected-day');
        },
        events: [
            {
                title: 'IT REBOOT',
                start: '2023-11-15',
                end:'2023-11-18',
                imageUrl: 'images/rebot.jpg' // Add the URL to your image
            },
            
            {
                title: 'Andrićevi dani',
                start: '2023-09-09',
               end:'2023-11-09',
                imageUrl: 'images/ivo2.jpg' 
            },
            {
                 title: 'Dani dijaspore',
                 start:'2023-08-01',
                 end:'2023-08-06',
                imageUrl:'images/opcina.jpg'
            },
            {
                title:'Noćna utrka',
                start:'2023-09-02',
                imageUrl:'images/utrka.jpg',
            },
            {
                title:'Čimburijada u Travniku',
                start:'2023-03-21',
                imageUrl:'images/jaja.jpg',
            }
            
        ],
        eventRender: function(event, element) {
            var eventContainer = document.createElement('div');
            eventContainer.className = 'event-container';

            if (event.imageUrl) {
                var eventImage = document.createElement('img');
                eventImage.className = 'event-image';
                eventImage.src = event.imageUrl;
                eventContainer.appendChild(eventImage);
            }

            element.html(eventContainer);

            if (event.title) {
                var eventTitle = document.createElement('div');
                eventTitle.className = 'event-title';
                eventTitle.innerText = event.title;
                eventContainer.appendChild(eventTitle);
            }
        }
    });
}

function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";

    // Destroy the FullCalendar instance when the modal is closed
    $('#calendar').fullCalendar('destroy');
}



document.addEventListener('DOMContentLoaded', function() {
    const submitButton = document.getElementById('submit-btn');

    submitButton.addEventListener('click', function() {
        const mapIframe = document.querySelector('.iframe-container iframe');
        const mapSelector = document.getElementById('map-selector');
        const selectedValue = mapSelector.value;
        let iframeSrc = '';

        if (selectedValue === 'restaurants') {
            iframeSrc = 'https://www.google.com/maps/d/embed?mid=146r6E4kjx_V8iD9F9jEM8bDDKfNMYd8&ehbc=2E312F&z=14';
        } else if (selectedValue === 'Kulturne_bastine') {
            iframeSrc = 'https://www.google.com/maps/d/embed?mid=1SGKor-suE_8Y96pFMipp-SzdJ0ATrGg&ehbc=2E312F&z=15';
        } else if (selectedValue === 'Kafe_deserti') {
            iframeSrc = 'https://www.google.com/maps/d/embed?mid=1lJCm1VY_VvRrjtoJshsbL4tA5K_T2co&ehbc=2E312F&z=14';
        } else if (selectedValue === 'vjerske_ustanove') {
            iframeSrc = 'https://www.google.com/maps/d/embed?mid=1xRa7-bF1EOGo-89LVkUWY8KviLD--1M&ehbc=2E312F&z=14';
        }

        mapIframe.src = iframeSrc;
    });
});
if(!navigator.geolocation)
{
  throw new Error("ne radi");
}

function prikaziDiv() {
    var prevodDiv = document.getElementById("prevod");
    var translateDiv = document.getElementById("google_translate_element");

    prevodDiv.classList.toggle("clicked");
    translateDiv.style.display = prevodDiv.classList.contains("clicked") ? "block" : "none";

    // Postavljanje pozicije #google_translate_element ispod #prevod za 50px
    var prevodPosition = prevodDiv.getBoundingClientRect();
    translateDiv.style.left = prevodPosition.left + 'px';
    translateDiv.style.top = prevodPosition.bottom + 20 + 'px';
}
var iconsPosition = iconsDiv.getBoundingClientRect();
        prevodDiv.style.left = iconsPosition.left - 50 + 'px';
        prevodDiv.style.top = iconsPosition.top + 'px';