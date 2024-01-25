const textElement = document.getElementById("text");
const text = "Sáng tạo và không ngừng học hỏi, tôi là người đam mê khám phá những khía cạnh mới của cuộc sống. Luôn hoan nghênh thách thức với tinh thần lạc quan, tôi tin rằng mỗi ngày là một cơ hội để trải nghiệm và phát triển bản thân. Được xây dựng trên nền tảng kiến thức và sự sáng tạo, cuộc sống của tôi là cuộc hành trình không ngừng, nơi tôi không chỉ tự hoàn thiện mình mà còn chia sẻ niềm đam mê với mọi người xung quanh.";

const characters = text.split(""); // Tách từng ký tự

let index = 0;

function showNextCharacter() {
    if (index < characters.length) {
        textElement.textContent += characters[index];
        index++;
        setTimeout(showNextCharacter, 100); // Thời gian trễ giữa các ký tự (milliseconds)
    } else {
        // Nếu đã chạy hết, đặt lại index và bắt đầu lại từ đầu
        index = 0;
        textElement.textContent = "";
        setTimeout(showNextCharacter, 1000); // Thời gian trễ giữa các lần chạy lại (milliseconds)
    }
}

showNextCharacter();
