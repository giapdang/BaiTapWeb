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

// const text = "Để học backend hiệu quả, trước hết, cần có kiến thức cơ bản về ngôn ngữ lập trình như Python, Java hoặc Node.js. Hiểu về cơ sở dữ liệu như MySQL, PostgreSQL, hoặc MongoDB là quan trọng. Việc nắm vững khái niệm về API và HTTP cũng là yếu tố quan trọng. Học về các framework như Flask, Django (cho Python), Spring (cho Java) hoặc Express (cho Node.js) cũng giúp bạn xây dựng ứng dụng backend một cách hiệu quả. Ngoài ra, hiểu về các công cụ quản lý mã nguồn như Git và kỹ năng kiểm thử cũng là những điều quan trọng để phát triển thành một lập trình viên backend thành công.";
// const delay = 100; // Delay in milliseconds

// let index = 0;

// function displayText() {
//     if (index < text.length) {
//         const char = text.charAt(index);
//         document.getElementById("bp1").innerHTML += char;
//         index++;
//         setTimeout(displayText, delay);
//     } else {
//         index = 0; // Reset index to repeat the animation
//         document.getElementById("bp1").innerHTML = ""; // Clear the text
//         setTimeout(displayText, delay);
//     }
// }

// displayText();


