document.getElementById("button1").addEventListener("click", function () {
    // Reset the transform property to none before starting the animation
    this.style.transform = "none";

    // Trigger the animation
    this.style.animation = "rotate 1s linear";

    // Reset the animation property after the animation completes
    setTimeout(() => {
        this.style.animation = "";
    }, 1000);
});

//up anh đại diện 

document.addEventListener('DOMContentLoaded', function () {
    var uploadButton = document.querySelector('.upload button');
    var anhddDiv = document.querySelector('.anhdd');

    uploadButton.addEventListener('click', function () {
        var fileInput = document.createElement('input');
        fileInput.type = 'file';

        fileInput.addEventListener('change', function () {
            var file = fileInput.files[0];
            var reader = new FileReader();

            reader.onload = function (e) {
                var img = document.createElement('img');
                img.src = e.target.result;
                anhddDiv.innerHTML = '';
                anhddDiv.appendChild(img);
            };

            reader.readAsDataURL(file);
        });

        fileInput.click();
    });
});

//dơload cv 
document.querySelector('.download button').addEventListener('click', function () {
    window.location.href = window.location.href;
});

function toggleMenu() {
    var menu = document.querySelector('.menu');
    menu.classList.toggle('active');
}

function toggleMenu() {
    var menu1 = document.querySelector('.menu');
    menu1.style.display = (menu1.style.display === 'none' || menu1.style.display === '') ? 'block' : 'none';
}