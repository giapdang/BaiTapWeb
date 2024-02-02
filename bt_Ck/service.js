document.getElementById("button1").addEventListener("click", function() {
    // Reset the transform property to none before starting the animation
    this.style.transform = "none";

    // Trigger the animation
    this.style.animation = "rotate 1s linear";

    // Reset the animation property after the animation completes
    setTimeout(() => {
        this.style.animation = "";
    }, 1000);
});


function toggleMenu() {
    var menu = document.querySelector('.menu');
    menu.classList.toggle('active');
}

function toggleMenu() {
    var menu1 = document.querySelector('.menu');
    menu1.style.display = (menu1.style.display === 'none' || menu1.style.display === '') ? 'block' : 'none';
}

function redirectToPage(url) {
    window.location.href = url;
}