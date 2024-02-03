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

function send() {
    var name = document.getElementById("username").value;
    var email1 = document.getElementById("email").value;
    var phone1 = document.getElementById("phone").value;
    var mess = document.getElementById("Mess").value;

    if (name === "" || email1 === "" || phone1 === "") {
        alert("Vui lòng nhập đầy đủ thông tin");
        document.getElementById("username").value = "";
        document.getElementById("email").value = "";
        document.getElementById("phone").value = "";
        document.getElementById("Mess").value = "";
    } else {
        alert("Cảm ơn bạn đã gửi thông tin cho chúng tôi");
        document.getElementById("username").value = "";
        document.getElementById("email").value = "";
        document.getElementById("phone").value = "";
        document.getElementById("Mess").value = "";
    }
}

function toggleMenu() {
    var menu = document.querySelector('.menu');
    menu.classList.toggle('active');
}

function toggleMenu() {
    var menu1 = document.querySelector('.menu');
    menu1.style.display = (menu1.style.display === 'none' || menu1.style.display === '') ? 'block' : 'none';
}