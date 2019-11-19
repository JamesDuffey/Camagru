var video = document.querySelector("#vid");
var overlay = document.querySelectorAll(".supers");

//getContext to work with canvas
var canv = document.getElementById("uploadCanvas");
var contx = canv.getContext('2d');
var image;

//set video from new_upload to stream from webcam
navigator.mediaDevices.getUserMedia({video:true}).then(function(stream) {
        video.srcObject = stream;
        video.play();
    }).catch(function(error) {
        console.log("Well, that did not work.");
    });

//draw to canvas on click of shoot button
document.getElementById('shoot').addEventListener('click', function() {
        contx.drawImage(video, 0, 0, 720, 480);
        document.getElementById('submit_taken').setAttribute("class", "button is-centered");
    });

//upload taken pic on click of submit button
document.getElementById("submit_taken").addEventListener('click', function() {
    var dataURL = canv.toDataURL('image/png');
    document.getElementById('taken').value = dataURL;
});


//choose edit overlays
overlay.forEach(function(element) {
    element.addEventListener('click', function(){
        image = element;
        if (image.src === "http://localhost:8080/Camagru/images/frame.png") {
            contx.drawImage(image, 0, 0, 720, 480);
        }
        if (image.src === "http://localhost:8080/Camagru/images/pika.png") {
            contx.drawImage(image, 500, 100, 300, 330);
        }
        if (image.src === "http://localhost:8080/Camagru/images/yoshi.png") {
            contx.drawImage(image, 0, 45, 300, 250);
        }
        if (image.src === "http://localhost:8080/Camagru/images/panda.png") {
            contx.drawImage(image, 0, 280, 255, 200);
        }
        if (image.src === "http://localhost:8080/Camagru/images/poo.png") {
            contx.drawImage(image, 140, 45, 380, 380);
    }
    });
});